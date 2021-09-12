<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $path = $request->file('image')->storeAs('public/brand',$request->file('image')
        ->getClientOriginalName());
        Brand::query()->create([
            'title' => $request->get('title'),
            'image' => $path
        ]);
        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $query = Brand::query()->where('title',$request->get('title'))->where('id','!=',$brand->id)->exists();
        if(!$query){
            if($request->hasFile($brand->image)){
                $path = $brand->image;
            }else{
                $path = $request->file('image')->storeAs('public/brand',
                $request->file('image')->getClientOriginalName());
            }
            $brand->update([
                'title' => $request->get('title'),
                'image' => $path
            ]);
            return redirect(route('admin.brand.index'));
        }
        return redirect(route('admin.brand.edit',$brand))->withErrors([
            'title' => 'این برند موجود است.لطفا عنوان برند را تغییر دهید'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }
}
