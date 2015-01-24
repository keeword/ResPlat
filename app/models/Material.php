<?php

class Material extends \Eloquent {

    protected $table = 'material';
    protected $fillable = array('name', 'description', 'total_number', 'lent_number');

    /**
     * 物资分类
     */
    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }

    /**
     * 借出数量
     */
    public function application_material()
    {
        return $this->hasMany('ApplicationMaterial', 'material_id', 'id');
    }

}
