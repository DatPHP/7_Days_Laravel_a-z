<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;

class ProductController extends Controller
{/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\View\View
 */
    public function index()
    {

        $products = DB::table('products')->paginate(3);
        return view('fontend.product.list')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     *
     */
    public function create()
    {
        return view('fontend.product.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:255',
            'price'      => 'required',
            'content'    => 'required',
            'image_path' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('product/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
            $active = $request->has('active')? 1 : 0;
            $product_id = DB::table('products')->insertGetId([
                'name'       => $request->input('name'),
            'price'      => $request->input('price'),
            'content'    => $request->input('content'),
            'image_path' => $request->input('image_path'),
            'active'     => $active
            ]);
            $message = 'Sản phẩm được tạo thành công với ID: ' . $product_id;
        return redirect('product/create')
            ->with('message',$message );
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $products = DB::table('products')->find($id);
        return view('fontend.product.detail')->with('products', $products);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('fontend.product.edit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $active = $request->has('active')? 1 : 0;
        $updated = DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'name'       => $request->input('name'),
                'price'      => $request->input('price'),
                'content'    => $request->input('content'),
                'image_path' => $request->input('image_path'),
                'active'     => $active,
                'updated_at' => \Carbon\Carbon::now()
            ]);
        return Redirect::back()
            ->with('message', 'Cập nhật sản phẩm thành công')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $product = DB::table('products')->find($id);
        $product->delete();
        $mesage = "XOa san pham thanh cong!!! ";

         return redirect('product')->with('message',$mesage);
    }
}
