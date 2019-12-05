<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\ListItem;
use Log;

class ListItemController extends Controller
{
    //
    public function complete(ListItem $item){
        $item->complete();
        return ["success" => "Item Completed"];
    }

    public function delete(ListItem $item){
        $item->delete();
        return true;
    }

    //** Create requires a  list_id */

    public function create(Request $request){
        $data = $request->all();
        Log::info($data);
        $item = ListItem::create($data['item']);
        //$item->refresh();
        if($data['lists']){
            foreach($data['lists'] as $list){
                $obj = UserList::find($list);
                $item->addToList($obj);
            }
        }
        // Log::info($item);
        $item->refresh(); 
        return $item;
    }
}
