<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    //id, title, description, user_id, has_location, location,
    
    protected $guarded = [];

    //protected $with = ['associatedItems'];

    public function items(){
        return $this->hasMany('App\ListItem', 'list_id')->active();
    }
    
    public function associatedItems(){
        return $this->belongsToMany('App\ListItem', 'item_list', 'list_id', 'item_id');
    }

    public function activeItems(){
        return $this->hasMany('App\ListItem')->active();
    }

    public function itemCount(){
        $count = $this->items->count();
        return $count;
    }

    public function owner(){
        return $this->belongsTo('App\User');
    }

    public function addItem($item){
        $this->items()->create($item);
    }


}
