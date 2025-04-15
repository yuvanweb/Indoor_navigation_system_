<?php

namespace App\Http\Controllers;

use App\Models\businessCategory;
use App\Models\LocationGrid;
use App\Models\Map;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{


    public function index(){

        $categories = businessCategory::latest()->paginate(10);
        $locationgrid = LocationGrid::latest()->paginate(10);
       // $shop = Shop::all();

        $shop = DB::table('shops')
        ->rightJoin('maps', 'shops.map_id', '=', 'maps.id')
        ->rightJoin('business_categories', 'shops.business_cat_id', '=', 'business_categories.id')
        ->rightJoin('location_grids', 'shops.location_grid_id', '=', 'location_grids.id')
        ->select('shops.name as s_name','shops.id As id', 'maps.name AS m_name', 'maps.id AS m_id','business_categories.name AS cat_name','location_grids.name AS grid_name')
        ->get();

        return view('shop.index', compact('categories','locationgrid','shop'));

    }

 public function create()
    {

        
        $map = Map::all();
        $categories = businessCategory::all();
        $locationgrid = LocationGrid::all();

        return view('shop.create', compact('map','categories','locationgrid'));
    } 
    public function store(Request $request)
    {

        
    $token = $request->session()->token();

 

    $token = csrf_token();


        $request->validate([
            'map_id' => 'required|integer',
            'cat_id' => 'required|integer',
            'grid_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'x_coordinate' => 'required|numeric',
            'y_coordinate' => 'required|numeric'
        ]);

        $shop = Shop::create([
            'map_id' => $request->map_id,
            'business_cat_id' => $request->cat_id,
            'location_grid_id' => $request->grid_id,
            'name' => $request->name,
            'x_coordinate' => $request->x_coordinate,
            'y_coordinate' => $request->y_coordinate
        ]);

        return redirect('/shops')->with('success', 'Shop Added successfully.');
    }
 public function update(Request $request)
    {

        
    $token = $request->session()->token();

 

    $token = csrf_token();


        $request->validate([
            'map_id' => 'required|integer',
            'cat_id' => 'required|integer',
            'grid_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'x_coordinate' => 'required|numeric',
            'y_coordinate' => 'required|numeric'
        ]);

        $shop =[
            'map_id' => $request->map_id,
            'business_cat_id' => $request->cat_id,
            'location_grid_id' => $request->grid_id,
            'name' => $request->name,
            'x_coordinate' => $request->x_coordinate,
            'y_coordinate' => $request->y_coordinate
        ];


        Shop::where('id',$request->id)->update($shop);
       
        return redirect('/shops')->with('success', 'Shop Update Successfully.');
    }

    public function edit($id)
    {

        
        $map = Map::all();
        $categories = businessCategory::all();
        $locationgrid = LocationGrid::all();
        $shop = Shop::where('id',$id)->get();

        return view('shop.edit', compact('map','categories','locationgrid','shop'));
    }
}
