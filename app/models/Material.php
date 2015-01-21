<?php

class Material extends \Eloquent {

    protected $table = 'material';
    protected $fillable = array('name', 'description', 'total_number', 'lent_number');

    /*
     * 物资一览
     *
     * @return array
     */
    public function getList()
    {
        return $this->all();
    }

    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }

    public function belongsToCategory()
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }
}
