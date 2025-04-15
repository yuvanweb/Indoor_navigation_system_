<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Path;
use App\Models\Shop;
use Illuminate\Http\Request;

class PathController extends Controller
{

    public function index(){

        $map = Map::all();
        return view('paths.index', compact('map'));
    }
    public function show($id)
    {
        $map = Map::findOrFail($id);
      //  $shops = $map->shops;
        $shops =   Shop::where('map_id',$id)->get();
    
        //dd($shops);
        return view('paths.markpath', compact('map', 'shops'));
    }
    public function showPathPage($mapId)
    {
        $map = Map::findOrFail($mapId);
        $shops = Shop::where('map_id', $mapId)->get();

        return view('paths.show_2', compact('map', 'shops'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'map_id' => 'required|integer',
            'start_shop_id' => 'required|integer',
            'end_shop_id' => 'required|integer',
            'path_data' => 'required'
        ]);

        Path::create([
            'map_id' => $request->map_id,
            'start_shop_id' => $request->start_shop_id,
            'end_shop_id' => $request->end_shop_id,
            'path_data' => $request->path_data,
        ]);

        return response()->json(['success' => true]);
    }

    public function showPath(Request $request)
{
    $request->validate([
        'map_id' => 'required|integer',
        'start_shop_id' => 'required|integer',
        'end_shop_id' => 'required|integer',
    ]);

    $path = \App\Models\Path::where('map_id', $request->map_id)
            ->where('start_shop_id', $request->start_shop_id)
            ->where('end_shop_id', $request->end_shop_id)
            ->first();

    if ($path) {
        return response()->json(['success' => true, 'path' => json_decode($path->path_data)]);
    } else {
        return response()->json(['success' => false, 'message' => 'Path not found.']);
    }
}
public function getPath(Request $request)
{
    $request->validate([
        'map_id' => 'required|integer',
        'start_shop_id' => 'required|integer',
        'end_shop_id' => 'required|integer',
    ]);

    $path = Path::where('map_id', $request->map_id)
        ->where('start_shop_id', $request->start_shop_id)
        ->where('end_shop_id', $request->end_shop_id)
        ->first();

    if ($path) {
        return response()->json(['success' => true, 'path' => json_decode($path->path_data)]);
    } else {
        return response()->json(['success' => false, 'message' => 'Path not found.']);
    }
}

public function gettPath(Request $request, $mapId)
{
    $startShopId = $request->query('start');
    $endShopId = $request->query('end');

    $path = Path::where('map_id', $mapId)
                ->where('start_shop_id', $startShopId)
                ->where('end_shop_id', $endShopId)
                ->first();

    if ($path) {
        return response()->json(['path_data' => json_decode($path->path_data)]);
    }

    return response()->json(['path_data' => []]);
}
}
