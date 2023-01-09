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
use App\Http\Requests\CustomerEvaluationUpdateRequest;
use Illuminate\Http\Request;

// use Barryvdh\Debugbar\Facades\Debugbar;

class CustomerEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customersEvaluation = CustomerEvaluation::all();
        // Debugbar::info('Customers!', $customersEvaluation[0]->customerPointEvaluation[0]->subCriteria->criteria);
        // Debugbar::info('Customers!', $customersEvaluation[0]->customerPointEvaluation);
        return view('admin.evalutions.index', ["customersEvaluation" => $customersEvaluation]);
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
        // Debugbar::info('Customers!', $customers);
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



        // $result = Customer::create($request->all());
        $customerEvaluation = new CustomerEvaluation();

        $customerEvaluation->customer_id = $request->customer_id;
        $customerEvaluation->save();

        foreach ($request->subcriteria as $subcriteria) {
            $customerPointEvaluation = new CustomerPointEvaluation();
            $customerPointEvaluation->customer_evaluation_id = $customerEvaluation->id;
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
    public function edit($id)
    {
        $criterias = Criteria::all();
        $customers = Customer::all();
        $customerEvaluation = CustomerEvaluation::where('id', $id)->first();
        // $customerPointEvaluations =
        //     CustomerPointEvaluation::with('subCriteria.criteria')
        //     ->where('customer_evaluation_id', $customerEvaluation->id)
        //     ->get();
        // @dd($customerPointEvaluations);
        // Debugbar::info('Customers!', $customers);
        // $existingCustomer = Customer::where('id', $customerEvaluation->customer_id)->first();
        return view('admin.evalutions.edit', [
            "customers" => $customers,
            "criterias" => $criterias,
            "customerSelected" => $customerEvaluation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerEvaluationUpdateRequest $request, $id)
    {
        // @dd($request, $id);
        // $customerEvaluation = CustomerEvaluation::where('customer_id', $request->customer_id)->first();

        // $customerEvaluation->customer_id = $request->customer_id;
        // $customerEvaluation->update();


        // // test
        // $customerPointEvaluations = CustomerPointEvaluation::where('customer_evaluation_id', $id)->get();
        // for ($i = 0; $i < count($request->subcriteria); $i++) {
        //     foreach ($customerPointEvaluations as $customerPointEvaluation) {
        //         $customerPointEvaluation->customer_evaluation_id = $customerEvaluation->id;
        //         $customerPointEvaluation->sub_criteria_id = $request->subcriteria[$i];
        //         $customerPointEvaluation->update();
        //         break;
        //     }
        // }

        $customerSelected = CustomerEvaluation::where('id', $id)->first();

        CustomerPointEvaluation::where('customer_evaluation_id', $id)->delete();
        foreach ($request->subcriteria as $subcriteria) {
            $customerPointEvaluation = new CustomerPointEvaluation();
            $customerPointEvaluation->customer_evaluation_id = $id;
            $customerPointEvaluation->sub_criteria_id = $subcriteria;
            $customerPointEvaluation->save();
        }
        
        return redirect()
            ->route('evaluations.index')
            ->with([
                'success' => 'Customer Evaluation has been updated successfully'
            ]);

        
        // ori
        // foreach ($request->subcriteria as $subcriteria) {
        //     $customerPointEvaluation = new CustomerPointEvaluation();
        //     $customerPointEvaluation->customer_evaluation_id = $customerEvaluation->id;
        //     $customerPointEvaluation->sub_criteria_id = $subcriteria;
        //     $customerPointEvaluation->save();
        // }

        // return redirect()
        //     ->route('evaluations.index')
        //     ->with([
        //         'success' => 'Customer Evaluation has been updated successfully'
        //     ]);
    }

    public function delete($idNumber)
    {
        $evaluation = CustomerEvaluation::where('id', $idNumber)->first();
        return view('admin.evalutions.delete', ["evaluation" => $evaluation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNumber)
    {
        $customerEvaluation = CustomerEvaluation::where('id', $idNumber)->firstorfail()->delete();

        if ($customerEvaluation) {
            return redirect()
                ->route('evaluations.index')
                ->with('success', 'Customer evaluation deleted successfully.');
        } else {
            return redirect()
                ->route('evaluations.index')
                ->with('success', 'Customer evaluation deleted failure.');
        }
    }
}
