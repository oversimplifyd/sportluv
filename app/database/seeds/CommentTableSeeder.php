<?php

class CommentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
       DB::table('comments')->delete();
        
        Comment::create(array(
            'post_id' => 1,
            'description' => 'Comments my first Bet'
            ));
        
        Comment::create(array(
           'post_id' => 2,
            'description' => 'Comments yet another Bet'
            ));
        
        Comment::create(array(
           'post_id' => 3,
            'description' => 'Comments my second Bet'
            ));
        
        Comment::create(array(
           'post_id' => 4,
            'description' => 'Comment them'
            ));
                
        Comment::create(array(
           'post_id' => 4,
            'description' => 'Comment them all'
            ));
        
        Comment::create(array(
           'post_id' => 5,
            'description' => 'Comment them alltogether'
            ));
        
        Comment::create(array(
            'post_id' => 6,
            'description' => 'Comment was transfered'
            ));
                
        Comment::create(array(
           'post_id' => 7,
            'description' => 'Comment was transferred again'
            ));
        
        Comment::create(array(
           'post_id' => 1,
            'description' => 'Comment was again transferred again and again'
            ));
	}

}
