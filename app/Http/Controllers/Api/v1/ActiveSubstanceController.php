<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Requests\ActiveSubstanceRequest;
use App\Http\Resources\Substances\ActiveSubstanceCollection;
use App\Http\Resources\Substances\ActiveSubstanceResource;
use App\Models\ActiveSubstance;
use Illuminate\Http\Request;

class ActiveSubstanceController extends ApiController
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
        $substances = $this->model->paginate(20);
        return new ActiveSubstanceCollection($substances);
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
        $substance = $this->model->create($request);
        return new ActiveSubstanceResource($substance);
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
        return new ActiveSubstanceResource($substance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActiveSubstanceRequest $request, $id)
    {
        $request = $request->validated();
        $substance = $this->model->find($id);
        $substance->update($request);
        return new ActiveSubstanceResource($substance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $substance = $this->model->find($id);
        $substance->delete();
        return ['message' => 'ok'];
    }
}
