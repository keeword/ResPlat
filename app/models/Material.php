<?php

class Material extends \Eloquent {

    protected $table = 'material';
    protected $fillable = array('name', 'description', 'total_number', 'lent_number');

    public function belongsToManyCategory()
    {
        return $this->belongsToMany('Category', 'material_category', 
                                    'material_id', 'category_id');
    }
}
