<?php

class CommentsController extends BaseController {

	public function postComment($id)
	{
		$post = Post::findOrFail($id);
        $comment = new Comment();
        $comment->description = Input::get('comment');
        $post->comments()->save($comment);
        
        return Redirect::route('view_post', array('id' => $id));
	}
}
