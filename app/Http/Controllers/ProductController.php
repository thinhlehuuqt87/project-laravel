<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view('fontend.product.list')->with(compact('products'));//, $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dump('123');
        return view('fontend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.'
        ];
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:255',
            'price'      => 'required|numeric',
            'content'    => 'required',
            'image_path' => 'required'
        ], $messages);
        if ($validator->fails()) {
            // echo 'fail'; exit;
            return redirect('product/create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // echo 'passs required'; exit;
            // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
            $active = $request->has('active')? 1 : 0;
            $data = array(
                'name'       => $request->input('name'),
                'price'      => $request->input('price'),
                'content'    => $request->input('content'),
                'image_path' => $request->input('image_path'),
                'active'     => $active
            );
            // var_dump($data); exit;
            $product_id = DB::table('products')->insertGetId($data);
            return redirect('product')
                    ->with('message', 'Sản phẩm được tạo thành công với ID: ' . $product_id);
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
        $product = DB::table('products')->find($id);
        return view('fontend.product.edit')->with(compact('product'));

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
        $active = $request->has('active') ? 1:0;
        $update = DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'content'    => $request->input('content'),
                'image_path' => $request->input('image_path'),
                'active'     => $active,
                'update_at' => \Carbon\Carbon::now()
            ]);
        return redirect()->back()->withErrors('message', 'Cap nhat thanh cong')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
