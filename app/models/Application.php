<?php

class Application extends \Eloquent {

    protected $table = 'application';

    protected $fillable = array('user_id', 'checker_id', 'reason', 'response',
        'status', 'borrow_time', 'return_time'
    );

    /**
     * 与用户是多对一关系
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    /**
     * 与中间表是一对多关系
     */
    public function application_material()
    {
        return $this->hasMany('ApplicationMaterial', 'application_id', 'id');
    }

    /**
     * 与物资是多对多关系
     */
    public function material()
    {
        return $this->belongsToMany('Material', 'application_material', 
            'application_id', 'material_id');
    }
}
