<?php

class BaseController extends Controller {

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
