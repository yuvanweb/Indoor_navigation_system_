<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Shop;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function view($id)
    {
        $maps = Map::where('id',$id)->get();
        return view('map.index', compact('maps'));
    } public function maplist()
    {
        $categories = Map::all();
        return view('map.maplist', compact('categories'));
    }

    public function create()
    {
        return view('map.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('maps', 'public');

        Map::create([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect('/maps')->with('success', 'Map uploaded successfully.');
    }    
 public function edit(Request $request,$id)
    {

        $maps = Map::where('id',$id)->get();
        return view('map.edit', compact('maps'));
        /* $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('maps', 'public');

        Map::create([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect('/maps')->with('success', 'Map uploaded successfully.'); */
    }
    public function upgate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('maps', 'public');

        $validated_arr = array(
            'name' => $request->name,
            'image_path' => $imagePath,
        );
        Map::where('id',$request->id)->update($validated_arr);

        return redirect('/maps')->with('success', 'Map uploaded successfully.');
    }
    
    public function show($id)
{
    $map = Map::findOrFail($id);
  //  $shops = $map->shops;
    $shops =   Shop::where('map_id',$id)->get();

    //dd($shops);
    return view('map.show_2', compact('map', 'shops'));
}
}
