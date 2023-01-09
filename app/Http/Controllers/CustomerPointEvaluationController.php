<?php

namespace App\Http\Controllers;

use App\Models\CustomerEvaluation;
use App\Models\CustomerPointEvaluation;
use App\Models\Customer;
use App\Models\Criteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\CustomerEvaluationStoreRequest;
use Illuminate\Http\Request;

class CustomerPointEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerEvaluationStoreRequest $request)
    {
        //
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
        // Debugbar::info('Customers!', $customers);
        return view('admin.evaluations.edit', [
            "customers" => $customers,
            "criterias" => $criterias,
            "customerEvaluation" => $customerEvaluation
        ]);
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
        $evaluation = CustomerEvaluation::where('id', $idNumber)->first();
        return view('admin.evalutions.delete', [ "evaluation" => $evaluation ]);
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

        if($customerEvaluation) {
            return redirect()
                ->route('evaluations.index')
                ->with('success','Customer evaluation deleted successfully.');
        } else {
            return redirect()
            ->route('evaluations.index')
            ->with('success','Customer evaluation deleted failure.');
        }
    }
}
