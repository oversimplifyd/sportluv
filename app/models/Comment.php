<?php

class Comment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('description', 'post_id');
    
    public function post()
    {
        return $this->belongsTo('Post', 'post_id');
    }

}
