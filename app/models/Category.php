<?php

class Category extends \Eloquent {

    protected $table = 'category';
    protected $fillable = array('category');


    public function material()
    {
        return $this->hasMany('Material', 'category_id', 'id');
    }
}
