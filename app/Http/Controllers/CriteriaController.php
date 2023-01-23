<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\CustomerPointEvaluation;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CriteriaStoreRequest;
use App\Http\Requests\CriteriaUpdateRequest;
class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criterias.index', [ "criterias" => $criterias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.criterias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriteriaStoreRequest $request)
    
    {

        $result = Criteria::create($request->all());
        
        if ($result) {
            CustomerEvaluation::truncate();
            return redirect()
                ->route('criterias.index')
                ->with([
                    'success' => 'Criteria has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
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
    public function edit($code)
    {
        $criteria = Criteria::where('code', $code)->first();
        return view('admin.criterias.edit', [ "criteria" => $criteria ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriteriaUpdateRequest $request, $code)
    {
        $criteria = Criteria::where('code', $code)->first();
        $criteria->update([
            'code'     => $request->code,
            'name'   => $request->name,
            'weight' => $request->weight,
            'type' => $request->type,
         ]);
        return redirect()
            ->route('criterias.index')
            ->with('success','Criteria updated successfully.');
    }

    public function delete($code)
    {
        $criteria = Criteria::where('code', $code)->first();
        return view('admin.criterias.delete', [ "criteria" => $criteria ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $criteria = Criteria::where('code', $code)->firstorfail()->delete();

        if($criteria) {
            return redirect()
                ->route('criterias.index')
                ->with('success','Criteria deleted successfully.');
        }
        return redirect()
            ->route('criterias.index')
            ->with('success','Criteria deleted failure.');
    }
}
