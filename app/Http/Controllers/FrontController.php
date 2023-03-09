<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;

class FrontController extends Controller
{
    public function home(Request $request)
  {
    $dishes = Dish::all();
    $menus = Menu::all();
    $rests = Rest::all()->sortBy('title');
    // $perPageShow = in_array($request->per_page, Dish::PER_PAGE) ? $request->per_page : 'all';

    // if (!$request->s) {
    //   $dishes = match ($request->sort ?? '') {
    //     'asc_price' => Dish::orderBy('price'),
    //     'dsc_price' => Dish::orderBy('price', 'desc'),
    //     default => Dish::where('id', '>', 0)
    //   };

    //   if ($perPageShow == 'all') {
    //     $dishes = $dishes->get();
    //   } else {
    //     $dishes = $dishes->paginate($perPageShow)->withQueryString();
    //   }
    // } else {
    //   $s = explode(' ', $request->s);

    //   if (count($s) == 1) {
    //     $dishes = Dish::where('title', 'like', '%' . $request->s . '%')->get();
    //   } else {
    //     $dishes = Dish::where('title', 'like', '%' . $s[0] . '%' . $s[1] . '%')->orWhere('title', 'like', '%' . $s[1] . '%' . $s[0] . '%')->get();
    //   }
    // }


    return view('front.main', [
      'dishes' => $dishes,
      'rests' => $rests,
    //   'sortSelect' => Dish::SORT,
    //   'sortShow' => isset(Dish::SORT[$request->sort]) ? $request->sort : '',
    //   'perPageSelect' => Dish::PER_PAGE,
    //   'perPageShow' => $perPageShow,
    //   's' => $request->s ?? ''
    ]);
  }

}
