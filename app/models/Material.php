<?php

class Material extends \Eloquent {

    protected $table = 'material';

    public function belongsToManyCategory()
    {
        return $this->belongsToMany('Category', 'material_category', 
                                    'material_id', 'category_id');
    }
}
