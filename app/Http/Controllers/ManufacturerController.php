<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{


    public function __construct(Manufacturer $model)
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
        $manufacturers = $this->model->OrderBy('id', 'desc')->paginate(5);
        // dd($substances);
        return view('manufacturer.index', compact('manufacturers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer.create');
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
            'link' => 'required',
        ]);
        $manufacturer = $this->model->create($request);
        return redirect()->route('manufacturer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacturer = $this->model->find($id);
        // dd($substances);
        return view('manufacturer.show', compact('manufacturer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = $this->model->find($id);
        return view('manufacturer.create', compact('manufacturer'));

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
        $manufacturer = $this->model->find($id);
        $manufacturer->update($request);
        return redirect()->route('manufacturer.show', $manufacturer->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = $this->model->find($id);

        if ($manufacturer->medical_product->first()) {
            return to_route('manufacturer.index');
        }
        $manufacturer->delete();

        return redirect()->route('manufacturer.index');
    }
}
