<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes excluded from the model's JSON form.v
     *
	 *
	 * @var array
	 */
	protected $fillable = array('description', 'title', 'tag', 'post_image', 'user_id');
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function getCommentCount()
    {
        $count = $this->comments()->count();
        if($count > 1)
        {
            return $count . " comments";
        }elseif($count ==1)
        {
            return "1 comment";
        }

        return "No comment";
    }

    public static $post_rules = array(
        'tag' => 'required',
        'title' => 'required|min:2',
        'description' => 'required|min:6',
        'image' => 'image');

    public function limitString()
    {
        if(Str::length($this->description) > 350)
        {
            return str_limit($this->description, $limit = 350, $end = "...");
        }

        return $this->description;
    }

    public static $tags = array('All','Bet', 'Critics', 'Fixtures', 'Transfer');
}