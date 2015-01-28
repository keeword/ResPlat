<?php

class ApplicationMaterial extends \Eloquent {

    protected $table = 'application_material';

    public $timestamps = false;

	protected $fillable = array('application_id', 'material_id', 'number', 'comment');

    public function material()
    {
        return $this->belongsTo('Material', 'material_id', 'id');
    }
}
