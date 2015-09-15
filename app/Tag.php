<?php

namespace Pipeline;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name'
	];

    /**
     * Get the articles associated with the given tag
     * */

    public function articles()
    {
    	return $this->belongsToMany('Pipeline\Article');
    }
}
