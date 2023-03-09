<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Rest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rest $rest)
    {
        $rests = Rest::all()->sortBy('title');
        return view('back.addMenu', ['rests' => $rests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
          
        $menu->title = $request->title;
        $menu->rest_id = $request->rest_id;
       

        // if ($request->file('photo')) {
        //     $photo = $request->file('photo');

        //     $ext = $photo->getClientOriginalExtension();
        //     $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
        //     $file = $name. '-' . rand(100000, 999999). '.' . $ext;
        //     $photo->move(public_path().'/hotels', $file);
        //     $hotel->picture ='/hotels' . '/' . $file;
        // }

        $menu->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
