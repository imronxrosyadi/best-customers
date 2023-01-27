<?php

namespace App\Http\Controllers;

use App\Models\CustomerEvaluation;
use App\Models\CustomerPointEvaluation;
use App\Models\Customer;
use App\Models\Criteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerEvaluationStoreRequest;
use Illuminate\Http\Request;

// use Barryvdh\Debugbar\Facades\Debugbar;

class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customersEvaluation = CustomerEvaluation::all();
        $criterias = Criteria::all();



        $customerPointEvaluationsX = [];
        $performanceRatingsX = [];

        foreach ($customersEvaluation as $customerEvaluation) {
            $x = [];
            foreach ($customerEvaluation->customerPointEvaluation as $customerPointEvaluation) {
                array_push($x, $customerPointEvaluation->subCriteria->value);
            }
            array_push($customerPointEvaluationsX, $x);
        }

        for ($i = 0; $i < count($criterias); $i++) {
            $values = array_column($customerPointEvaluationsX, $i);
            $sum = array_sum(array_map(function($x) {
                return $x ** 2;
            }, $values));
            array_push($performanceRatingsX, sqrt($sum));
        }

        $normalizationsMatrixR = [];
        foreach ($performanceRatingsX as $i => $performanceRatingX) {
            $values = array_column($customerPointEvaluationsX, $i);
            $result = [];
            foreach ($values as $value) {
                array_push($result, $value / $performanceRatingX);
            }
            array_push($normalizationsMatrixR, $result);
        }

        $normalizationsMatrixY = [];
        foreach ($criterias as $i => $criteria) {
            $arrMatrixR = [];
            foreach ($normalizationsMatrixR[$i] as $normalizationMatrixR) {
                array_push($arrMatrixR, $normalizationMatrixR * $criteria->weight);
            }
            array_push($normalizationsMatrixY, $arrMatrixR);
        }

        $positiveIdealSolutions = [];
        $negativeIdealSolutions = [];

        foreach ($normalizationsMatrixY as $normalizationMatrixY) {
            array_push($negativeIdealSolutions, min($normalizationMatrixY));
            array_push($positiveIdealSolutions, max($normalizationMatrixY));
        }

        $positiveIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $positiveIdealSolutions[$j]) ** 2;
            }
            array_push($positiveIdealDistances, sqrt($result));
        }

        $negativeIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $negativeIdealSolutions[$j]) ** 2;
            }
            array_push($negativeIdealDistances, sqrt($result));
        }

        $relativeClosenessIdealSolution = [];

        for ($i = 0; $i < count($negativeIdealDistances); $i++) {
            $ratio = $negativeIdealDistances[$i] / ($negativeIdealDistances[$i] + $positiveIdealDistances[$i]);
            $relativeClosenessIdealSolution[] = $ratio;
        }

        $topsisCustomers = [];
        foreach ($customersEvaluation as $i => $customer) {
            $topsisCustomers[] = [
                "name" => $customer->customer->fullName,
                "value" => $relativeClosenessIdealSolution[$i]
            ];

        }

        $ranking = unserialize(serialize($topsisCustomers));

        usort($ranking, function($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        return view('admin.calculates.index', [
            "customersEvaluation" => $customersEvaluation,
            "criterias" => $criterias,
            "normalizationsMatrixR" => $normalizationsMatrixR,
            "normalizationsMatrixY" => $normalizationsMatrixY,
            "positiveIdealSolutions" => $positiveIdealSolutions,
            "negativeIdealSolutions" => $negativeIdealSolutions,
            "positiveIdealDistances" => $positiveIdealDistances,
            "negativeIdealDistances" => $negativeIdealDistances,
            "relativeClosenessIdealSolution" => $relativeClosenessIdealSolution,
            "topsisCustomers" => $topsisCustomers,
            "ranking" => $ranking
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = Criteria::all();
        $customers = Customer::all();
        return view('admin.evalutions.create', [
            "customers" => $customers,
            "criterias" => $criterias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerEvaluationStoreRequest $request)
    {
        $customerEvaluation = new CustomerEvaluation();

        $customerEvaluation->customer_id = $request->customer_id;
        $customerEvaluation->save();

        foreach ($request->subcriteria as $subcriteria) {
            $customerPointEvaluation = new CustomerPointEvaluation();
            $customerPointEvaluation->customers_evaluation_id = $customerEvaluation->id;
            $customerPointEvaluation->sub_criteria_id = $subcriteria;
            $customerPointEvaluation->save();
        }

        return redirect()
            ->route('evaluations.index')
            ->with([
                'success' => 'Customer Evaluation has been created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idNumber)
    {
        $customer = Customer::where('idNumber', $idNumber)->first();
        return view('admin.customers.edit', [ "customer" => $customer ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $idNumber)
    {
        $customer = Customer::where('idNumber', $idNumber)->first();
        $customer->update([
            'fullName'     => $request->fullName,
            'dateOfBirth'   => $request->dateOfBirth,
            'gender' => $request->gender,
            'address' => $request->address,
            'religion' => $request->religion,
            'maritalStatus' => $request->maritalStatus,
            'job' => $request->job,
            'citizenship' => $request->citizenship
         ]);
        return redirect()
            ->route('customers.index')
            ->with('success','Customer updated successfully.');
    }

    public function delete($idNumber)
    {
        $customer = Customer::where('idNumber', $idNumber)->first();
        return view('admin.customers.delete', [ "customer" => $customer ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNumber)
    {
        $customer = Customer::where('idNumber', $idNumber)->firstorfail()->delete();

        if($customer) {
            return redirect()
                ->route('customers.index')
                ->with('success','Customer deleted successfully.');
        }
        return redirect()
            ->route('customers.index')
            ->with('success','Customer deleted failure.');
    }

    public function report()  {
        $customersEvaluation = CustomerEvaluation::all();
        $criterias = Criteria::all();

        $customerPointEvaluationsX = [];
        $performanceRatingsX = [];

        foreach ($customersEvaluation as $customerEvaluation) {
            $x = [];
            foreach ($customerEvaluation->customerPointEvaluation as $customerPointEvaluation) {
                array_push($x, $customerPointEvaluation->subCriteria->value);
            }
            array_push($customerPointEvaluationsX, $x);
        }

        for ($i = 0; $i < count($criterias); $i++) {
            $values = array_column($customerPointEvaluationsX, $i);
            $sum = array_sum(array_map(function($x) {
                return $x ** 2;
            }, $values));
            array_push($performanceRatingsX, sqrt($sum));
        }

        $normalizationsMatrixR = [];
        foreach ($performanceRatingsX as $i => $performanceRatingX) {
            $values = array_column($customerPointEvaluationsX, $i);
            $result = [];
            foreach ($values as $value) {
                array_push($result, $value / $performanceRatingX);
            }
            array_push($normalizationsMatrixR, $result);
        }

        $normalizationsMatrixY = [];
        foreach ($criterias as $i => $criteria) {
            $arrMatrixR = [];
            foreach ($normalizationsMatrixR[$i] as $normalizationMatrixR) {
                array_push($arrMatrixR, $normalizationMatrixR * $criteria->weight);
            }
            array_push($normalizationsMatrixY, $arrMatrixR);
        }

        $positiveIdealSolutions = [];
        $negativeIdealSolutions = [];

        foreach ($normalizationsMatrixY as $normalizationMatrixY) {
            array_push($negativeIdealSolutions, min($normalizationMatrixY));
            array_push($positiveIdealSolutions, max($normalizationMatrixY));
        }

        $positiveIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $positiveIdealSolutions[$j]) ** 2;
            }
            array_push($positiveIdealDistances, sqrt($result));
        }

        $negativeIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $negativeIdealSolutions[$j]) ** 2;
            }
            array_push($negativeIdealDistances, sqrt($result));
        }

        $relativeClosenessIdealSolution = [];

        for ($i = 0; $i < count($negativeIdealDistances); $i++) {
            $ratio = $negativeIdealDistances[$i] / ($negativeIdealDistances[$i] + $positiveIdealDistances[$i]);
            $relativeClosenessIdealSolution[] = $ratio;
        }

        $topsisCustomers = [];
        foreach ($customersEvaluation as $i => $customer) {
            $topsisCustomers[] = [
                "name" => $customer->customer->fullName,
                "value" => $relativeClosenessIdealSolution[$i]
            ];

        }

        $ranking = unserialize(serialize($topsisCustomers));

        usort($ranking, function($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        return view('admin.calculates.report', [
            "customersEvaluation" => $customersEvaluation,
            "criterias" => $criterias,
            "normalizationsMatrixR" => $normalizationsMatrixR,
            "normalizationsMatrixY" => $normalizationsMatrixY,
            "positiveIdealSolutions" => $positiveIdealSolutions,
            "negativeIdealSolutions" => $negativeIdealSolutions,
            "positiveIdealDistances" => $positiveIdealDistances,
            "negativeIdealDistances" => $negativeIdealDistances,
            "relativeClosenessIdealSolution" => $relativeClosenessIdealSolution,
            "topsisCustomers" => $topsisCustomers,
            "ranking" => $ranking
        ]);
    }

    public function decree()  {
        $customersEvaluation = CustomerEvaluation::all();
        $criterias = Criteria::all();

        $customerPointEvaluationsX = [];
        $performanceRatingsX = [];

        foreach ($customersEvaluation as $customerEvaluation) {
            $x = [];
            foreach ($customerEvaluation->customerPointEvaluation as $customerPointEvaluation) {
                array_push($x, $customerPointEvaluation->subCriteria->value);
            }
            array_push($customerPointEvaluationsX, $x);
        }

        for ($i = 0; $i < count($criterias); $i++) {
            $values = array_column($customerPointEvaluationsX, $i);
            $sum = array_sum(array_map(function($x) {
                return $x ** 2;
            }, $values));
            array_push($performanceRatingsX, sqrt($sum));
        }

        $normalizationsMatrixR = [];
        foreach ($performanceRatingsX as $i => $performanceRatingX) {
            $values = array_column($customerPointEvaluationsX, $i);
            $result = [];
            foreach ($values as $value) {
                array_push($result, $value / $performanceRatingX);
            }
            array_push($normalizationsMatrixR, $result);
        }

        $normalizationsMatrixY = [];
        foreach ($criterias as $i => $criteria) {
            $arrMatrixR = [];
            foreach ($normalizationsMatrixR[$i] as $normalizationMatrixR) {
                array_push($arrMatrixR, $normalizationMatrixR * $criteria->weight);
            }
            array_push($normalizationsMatrixY, $arrMatrixR);
        }

        $positiveIdealSolutions = [];
        $negativeIdealSolutions = [];

        foreach ($normalizationsMatrixY as $normalizationMatrixY) {
            array_push($negativeIdealSolutions, min($normalizationMatrixY));
            array_push($positiveIdealSolutions, max($normalizationMatrixY));
        }

        $positiveIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $positiveIdealSolutions[$j]) ** 2;
            }
            array_push($positiveIdealDistances, sqrt($result));
        }

        $negativeIdealDistances = [];
        for ($i = 0; $i < count($customersEvaluation); $i++) {
            $result = 0;
            for ($j = 0; $j < count($normalizationsMatrixY); $j++) {
                $result += ($normalizationsMatrixY[$j][$i] - $negativeIdealSolutions[$j]) ** 2;
            }
            array_push($negativeIdealDistances, sqrt($result));
        }

        $relativeClosenessIdealSolution = [];

        for ($i = 0; $i < count($negativeIdealDistances); $i++) {
            $ratio = $negativeIdealDistances[$i] / ($negativeIdealDistances[$i] + $positiveIdealDistances[$i]);
            $relativeClosenessIdealSolution[] = $ratio;
        }

        $topsisCustomers = [];
        foreach ($customersEvaluation as $i => $customer) {
            $topsisCustomers[] = [
                "name" => $customer->customer->fullName,
                "value" => $relativeClosenessIdealSolution[$i]
            ];

        }

        $ranking = unserialize(serialize($topsisCustomers));

        usort($ranking, function($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        return view('admin.calculates.decree', [
            "customersEvaluation" => $customersEvaluation,
            "criterias" => $criterias,
            "normalizationsMatrixR" => $normalizationsMatrixR,
            "normalizationsMatrixY" => $normalizationsMatrixY,
            "positiveIdealSolutions" => $positiveIdealSolutions,
            "negativeIdealSolutions" => $negativeIdealSolutions,
            "positiveIdealDistances" => $positiveIdealDistances,
            "negativeIdealDistances" => $negativeIdealDistances,
            "relativeClosenessIdealSolution" => $relativeClosenessIdealSolution,
            "topsisCustomers" => $topsisCustomers,
            "ranking" => $ranking
        ]);
    }
}
