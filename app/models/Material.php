<?php

class Material extends \Eloquent {

    protected $table = 'material';
    protected $fillable = array('name', 'description', 'total_number', 'lent_number');

    /**
     * 与分类是多对一关系
     */
    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }

    /**
     * 与中间表是一对多关系
     */
    public function application_material()
    {
        return $this->hasMany('ApplicationMaterial', 'material_id', 'id');
    }

    /**
     * 与申请是多对多关系
     */
    public function application()
    {
        return $this->belongsToMany('Application',
                                    'application_material',
                                    'material_id',
                                    'application_id');
    }

}
