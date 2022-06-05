<?php

namespace App\Http\Controllers;

use App\Models\ActiveSubstance;
use App\Models\Manufacturer;
use App\Models\MedicinalProduct;
use Illuminate\Http\Request;

class MedicinalProductController extends Controller
{

    public function __construct(MedicinalProduct $model)
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
        $products = $this->model->with(['substance', 'manufacturer'])->OrderBy('id', 'desc')->paginate(5);
        $manufacturers = Manufacturer::all();
        $substances = ActiveSubstance::all();

        return view('product.index', compact('products', 'manufacturers', 'substances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'substance_id' => 'required',
            'manufacturer_id' => 'required',
            'cost' => 'required',
        ]);

        $request['created_at'] = date("Y-m-d H:i:s");
        $request['updated_at'] = date("Y-m-d H:i:s");
        // dd($request);
        $this->model->create($request);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->model->with(['substance', 'manufacturer'])->find($id);
        return view('product.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->model->find($id);
        $product->delete();
        return redirect()->route('product.index');

    }
}
