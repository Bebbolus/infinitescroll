<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    /**
     * Get the category that owns the element.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function isFirstOfCategory()
    {
        return Element::where('category_id', $this->category()->first()->id)->first() == $this;
    }
}
