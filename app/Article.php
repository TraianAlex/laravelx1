<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at'];
    /**
     * Additional fields to treat as Carbon instances
     * @var array
     */
    protected $dates = ['published_at'];
    /**
     * Scope queries to article that have been published
     * @param $query
     */
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }
    
    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>=', Carbon::now());
    }
    /** muttator
     * Set the published_at attribute
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
    	//$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    	$this->attributes['published_at'] = Carbon::parse($date);
    }
    /** accessor
     * Get the published_at attribute //for model binding
     * @param  $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        //return new Carbon($date);//and format in published_at form field
        return Carbon::parse($date)->format('Y-m-d');//format here instead of form
    }
    /*
    * An article is owned by a user
    * use $article->user
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*
    *Get the tags asociated with the given article
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    /**
     * Get a list of tag ids associated with the current article
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();//->all() resolved the problem in form
    }
}