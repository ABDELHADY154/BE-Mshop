<?php

namespace App\Http\Controllers;

use App\Category;
use App\Front;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    // use Auth;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (isset($_GET['category'])) {
        //     $filter = $_GET['category'];
        // } else {
        //     $filter = '';
        // }

        $q = $request->query('search');
        $c = $request->query('category');
        $p = $request->query('price');


        return view('clients.index', [
            'categories' => Category::all(),
            'Allproducts' => Product::all(),
            'products' => Product::where('name', 'like', "%{$q}%")->paginate($request->query('limit', 5)),
            'productsFilterd' => Product::where('price', '=', $p)->orWhere('category_id', '=', $c)->paginate($request->query('limit', 5)),
            // 'filter' => Product::where(['price', '=', $p] & ['category_id', '=', $c])->paginate($request->query('limit', 5)),


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('clients.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function edit(Front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Front  $front
     * @return \Illuminate\Http\Response
     */
    public function destroy(Front $front)
    {
        //
    }
    public function logout(Request $request)
    {
        // Auth::logout();
        // return redirect(route('front-index'));
        return redirect('/')->with(Auth::logout());
    }
}
