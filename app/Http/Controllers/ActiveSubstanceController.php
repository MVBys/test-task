<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActiveSubstanceRequest;
use App\Models\ActiveSubstance;
use Illuminate\Http\Request;

class ActiveSubstanceController extends Controller
{

    public function __construct(ActiveSubstance $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $substances = $this->model->getSubstancesWithPaginate(5);
        return view('substance.index', compact('substances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('substance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiveSubstanceRequest $request)
    {
        $request = $request->validated();
        $this->model->create($request);
        return redirect()->route('substance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $substance = $this->model->find($id);
        return view('substance.show', compact('substance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $substance = $this->model->find($id);
        return view('substance.create', compact('substance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActiveSubstance $request, $id)
    {
        $data = $request->validated();
        $substance = $this->model->updateSubstance($id, $data);
        return redirect()->route('substance.show', $substance->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = $this->model->deleteSubstance($id);
        return to_route('substance.index', ['message' => $message]);
    }
}
