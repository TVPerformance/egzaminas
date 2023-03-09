<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Rest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        $menus = Menu::all()->sortBy('title');

        
       
        return view('back.indexDish', ['dishes' => $dishes], ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rests = Rest::all()->sortBy('title');
        $menus = Menu::all()->sortBy('title');

        return view('back.createDishSecondary', ['rests' => $rests, 'menus' => $menus]);
    }

    public function createSecondary()
    {
        $rests = Rest::all()->sortBy('title');
        $menus = Menu::all()->sortBy('title');

        return view('back.createDishSecondadry', ['rests' => $rests, 'menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $dish = new Dish;
          
        $dish->title = $request->dish_title;
        $dish->price = $request->price;
        $dish->menu_id = $request->menu_id;
        $dish->description = $request->dish_description;

        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $photo->move(public_path().'/dishes', $file);
            $dish->photo ='/dishes' . '/' . $file;

        }


        $dish->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
       
        return view('back.editDish', [
            'dish' => $dish
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
       

        $dish->title = $request->dish_title;
        $dish->price = $request->dish_price;
        $dish->description = $request->dish_description;
        $dish->save();

        return redirect()->route('dishes-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->back()->with('ok', 'Hotel been deleted');
    }
}
