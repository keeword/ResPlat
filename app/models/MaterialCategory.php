<?php

class MaterialCategory extends \Eloquent {

    protected $table = 'material_category';
    public $timestamps = false;
    protected $fillable = array('material_id', 'category_id');
}
