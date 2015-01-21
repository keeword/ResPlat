<?php

class Category extends \Eloquent {

    protected $table = 'category';
    protected $fillable = array('category');


    public function hasManyMaterial()
    {
        return $this->hasMany('Material', 'material_category', 
                              'material_id', 'category_id');
    }
}
