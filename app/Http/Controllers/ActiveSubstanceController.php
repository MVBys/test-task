<?php

namespace App\Http\Controllers;

use App\Models\ActiveSubstance;
use Illuminate\Http\Request;

class ActiveSubstanceController extends Controller
{
    private $model;

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
        $substances = $this->model->OrderBy('id', 'desc')->paginate(5);
        // dd($substances);
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
    public function store(Request $request)
    {
        $request = $request->validate([
            'title' => 'required',
        ]);
        $substance = $this->model->create($request);
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
        // dd($substances);
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
    public function update(Request $request, $id)
    {
        $request = $request->validate([
            'title' => 'required',
        ]);
        $substance = $this->model->find($id);
        $substance->update($request);
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
        $substance = $this->model->find($id);
        $substance->destroy;
        return redirect()->route('substance.index');
    }
}
