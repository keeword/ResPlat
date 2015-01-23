<?php

class Application extends \Eloquent {

    protected $table = 'application';

    protected $fillable = array('user_id', 'checker_id', 'reason', 'response',
        'status', 'borrow_time', 'return_time'
    );
}
