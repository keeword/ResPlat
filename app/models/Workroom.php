<?php

class Workroom extends \Eloquent {

    protected $table = 'workroom';

	protected $fillable = [];

    /**
     * 与用户是多对一关系
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
}
