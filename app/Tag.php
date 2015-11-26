<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * fillable fields for a tag
	 * @var array
	 */
	protected $fillable = ['name'];
	/**
	 * Get the article associated with the given tag.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function articles()
    {
    	return $this->belongsToMany('App\Article');//,'tags_pivot', 'article_identifier'
    }
}
