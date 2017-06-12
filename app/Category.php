<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the elements for the blog category.
     */
    public function elements()
    {
        return $this->hasMany('App\Element');
    }
    public function prev()
    {
        $actual = $this->order;
        if($actual > 0 ) return  $this->whereOrder($actual-1)->first();
        else return false;
    }
    public function next()
    {
        $max = $this->max('order');
        $actual = $this->order;
        if($actual < $max ) return  $this->whereOrder($actual+1)->first();
        else return false;
    }
}
