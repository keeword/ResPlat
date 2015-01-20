<?php

class Category extends \Eloquent {

    protected $table = 'category';

    public function hasManyMaterial()
    {
        return $this->hasMany('Material', 'material_category', 
                              'material_id', 'category_id');
    }
}
