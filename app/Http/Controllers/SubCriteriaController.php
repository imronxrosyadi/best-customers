<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCriteria;
use App\Models\Criteria;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubCriteriaStoreRequest;
use App\Http\Requests\SubCriteriaUpdateRequest;
use Barryvdh\Debugbar\Facades\Debugbar;


class SubCriteriaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.subcriterias.index', [ "criterias" =>  $criterias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcriterias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($criteriaId)
    {
        return view('admin.subcriterias.create', [ 'criteriaId' => $criteriaId ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCriteriaStoreRequest $request)
    
    {
        $result = SubCriteria::create($request->all());
        if ($result) {
            return redirect()
                ->route('sub-criterias.index')
                ->with([
                    'success' => 'SubCriteria has been created successfully'
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
    public function edit($id)
    {
        $subCriteria = SubCriteria::where('id', $id)->first();
        return view('admin.subcriterias.edit', [ "subCriteria" => $subCriteria ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCriteriaStoreRequest $request, $id)
    {
        $subCriteria = SubCriteria::where('id', $id)->first();
        $subCriteria->update([
            'name'   => $request->name,
            'value' => $request->value,
         ]);
        return redirect()
            ->route('sub-criterias.index')
            ->with('success','Sub Criteria updated successfully.');
    }

    public function delete($subCriteriaId)
    {
        $subCriteria = SubCriteria::where('id', $subCriteriaId)->first();
        return view('admin.subcriterias.delete', [ "subCriteria" => $subCriteria ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subCriteriaId)
    {
        $subCriteriaId = SubCriteria::where('id', $subCriteriaId)->firstorfail()->delete();

        if($subCriteriaId) {
            return redirect()
                ->route('sub-criterias.index')
                ->with('success','Sub Criteria deleted successfully.');
        }
        return redirect()
            ->route('sub-criterias.index')
            ->with('success','Sub Criteria deleted failure.');
    }


}
