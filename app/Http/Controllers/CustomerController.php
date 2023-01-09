<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        // Debugbar::info('Customers!', $customers);
        return view('admin.customers.index', [ "customers" => $customers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    
    {

        $result = Customer::create($request->all());
        
        // Debugbar::info('Info!', $result);
        if ($result) {
            return redirect()
                ->route('customers.index')
                ->with([
                    'success' => 'Customer has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
        // return redirect()
        //     ->route('customers.index')
        //     ->with('success','Customer created successfully.');
        
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
        // $customer->fullName = $request->fullName;
        // $customer->dateOfBirth = $request->dateOfBirth;
        // $customer->gender = $request->gender;
        // $customer->address = $request->address;
        // $customer->religion = $request->religion;
        // $customer->maritalStatus = $request->maritalStatus;
        // $customer->job = $request->job;
        // $customer->citizenship = $request->citizenship;
        // $customer->update();

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
}
