<?php

namespace App\Http\Controllers\Frontend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();
        $productUnits= ProductUnit::all();
        return view('frontend.product.index',[
            'products'=> $products,
            'productCategories'=> $productCategories,
            'productUnits'=> $productUnits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        do{
            $count = Product::count()+1;
            $generatecode = 'SC-#'.$count . str_random(5) . mt_rand(1000, 9999);
            $code = Product::where('code', $generatecode)->first();
        } while(!empty($code));

        $productCategories = ProductCategory::all();
        $productUnits= ProductUnit::all();

        return view('frontend.product.create',
        [
            'generatecode'=>$generatecode,
            'productCategories'=> $productCategories,
            'productUnits'=> $productUnits
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('product')->with('success', 'Data telah terkirim');
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
        $product = Product::find($id);

        $productCategories = ProductCategory::all();
        $productUnits= ProductUnit::all();
        
        return view('frontend.product.edit',
        [
            'product'=>$product,
            'productCategories'=> $productCategories,
            'productUnits'=> $productUnits
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('product')->with('success','Data telah terkirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('frontend.product.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
