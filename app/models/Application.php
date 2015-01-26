<?php

class Application extends \Eloquent {

    protected $table = 'application';

    protected $fillable = array('user_id', 'checker_id', 'reason', 'response',
        'status', 'borrow_time', 'return_time'
    );

    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function application_material()
    {
        return $this->hasMany('ApplicationMaterial', 'application_id', 'id');
    }
}
