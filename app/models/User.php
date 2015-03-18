<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * 表单验证规则
     *
     * @var array
     */
    public static $rules = array(
        'username'              => 'required|alpha_num|max:64|unique:users',
        'nickname'              => 'required|max:64',
        'password'              => 'required|alpha_num|min:6|confirmed',
        'password_confirmation' => 'required|alpha_num|min:6',
        'group_id'              => 'required|numeric|exists:groups,id'
    );

    // Enabled Automatically Hydrate Ardent Entities
    // public $autoHydrateEntityFromInput    = true;
    // public $forceEntityHydrationFromInput = true;

    /**
     * 与 group 是 多对多关系
     */
    public function group()
    {
        return $this->belongsToMany('Group', 'users_groups', 'user_id', 'group_id');
    }

}
