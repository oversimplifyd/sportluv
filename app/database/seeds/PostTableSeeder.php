<?php

class PostTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
       DB::table('posts')->delete();
        
        Post::create(array(
            'user_id' => 1,
            'tag' => 'Bet',
            'Title' => 'Na Bet o',
            'description' => 'This is my first Bet',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 1,
            'tag' => 'Anoda Bet',
            'Title' => 'Na Bet o',
            'description' => 'This is yet another Bet',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 1,
            'tag' => 'Bet 2',
            'Title' => 'Na Bet o',
            'description' => 'This is my second Bet',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 2,
            'tag' => 'Critics',
            'Title' => 'Na Bet o',
            'description' => 'Criticize them',
            'post_image' => 'default_image.jpg'
            ));
                
        Post::create(array(
            'user_id' => 2,
            'tag' => 'Critics 2',
            'Title' => 'Na Bet o',
            'description' => 'Criticize them all',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 2,
            'tag' => 'Critics 3',
            'Title' => 'Na Bet o',
            'description' => 'Criticize them alltogether',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 3,
            'tag' => 'Transfer',
            'Title' => 'Na Bet o',
            'description' => 'Ronaldo was transfered',
            'post_image' => 'default_image.jpg'
            ));
                
        Post::create(array(
            'user_id' => 3,
            'tag' => 'Transfer',
            'Title' => 'Na Bet o',
            'description' => 'Ronaldo was transferred again',
            'post_image' => 'default_image.jpg'
            ));
        
        Post::create(array(
            'user_id' => 3,
            'tag' => 'Transfer',
            'Title' => 'Na Bet o',
            'description' => 'Ronaldo was again transferred again and again',
            'post_image' => 'default_image.jpg'
            ));
	}
}
