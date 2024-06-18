<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
class ItemController extends Controller
{
    //

    public function newItem(Request $request)
    {
        $item = new Item();
        $item->name = $request->title;
        $item->description = $request->description;
        $item->save();
        return response()->json($item, 201);
    }

    public function getAllItems()
    {
        $items = Item::all();
        return response()->json($items, 200);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        if($item == null){
            return response()->json(['message' => 'item not found'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'item deleted'], 200);
    }
    public function updateItem(Request $request, $id)
    {   
        $item = Item::find($id);
        if($item == null){
            return response()->json(['message' => 'item not found'], 404);
        }
        $item->name = $request->title;
        $item->description = $request->description;
        $item->save();
        return response()->json($item, 200);
    }
}
