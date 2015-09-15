<?php

namespace Pipeline;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Article extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    protected $dates = ['published_at', 'deleted_at'];


    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
    	return $this->belongsTo('Pipeline\User');
    }


    public function tags()
    {
        return $this->belongsToMany('Pipeline\Tag')->withTimestamps();
    }
}