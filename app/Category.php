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
}
