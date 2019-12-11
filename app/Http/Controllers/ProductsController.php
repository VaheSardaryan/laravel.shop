<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\Create;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products;
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }


    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Create $request)
    {
        Product::query()->create([
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::query()->findOrFail($id);
        if($product->isProductOf(Auth::user())){
            return view('products.show', compact('product'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);

        if($product->isProductOf(Auth::user())) {
            return view('products.edit', compact('product'));
        }else {
            return redirect()->back();
        }
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
        $this->validate($request, [
            'name' => 'required|min:3|max:191',
            'description' => 'max:191',
            'price' => 'required|between:0,9999999.99'
        ]);

        $product = Product::query()->findOrFail($id);
        if($product->isProductOf(Auth::user())) {
            $product->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price')
            ]);
            return redirect()->route('products.index');
        }else {
            // todo need to show 403 response page
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::query()->findOrFail($id);

        if($product->isProductOf(Auth::user()) ){
            $product->delete();
            return redirect()->route('products.index');
        } else {
            // todo need to show 403 response page
            return redirect()->back();
        }

    }
}
