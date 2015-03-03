<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
       DB::table('users')->delete();
        
        User::create(array(
            'name' => 'Praise God',
            'username' => 'Praise',
            'password' => Hash::make('password'),
            'country' => 'Nigeria', 
            'state' => 'Lagos',
            'permission' => 1,
            'image' => 'image'
            ));
        
        User::create(array(
            'name' => 'Busayo O.',
            'username' => 'Busayo',
            'password' => Hash::make('password'),
            'country' => 'Nigeria', 
            'state' => 'Ogun',
            'permission' => 0,
            'image' => 'image'
            ));
        
        User::create(array(
            'name' => 'Paul E.',
            'username' => 'Paul',
            'password' => Hash::make('password'),
            'country' => 'Nigeria', 
            'state' => 'Abuja',
            'permission' => 0,
            'image' => 'image'
            ));
	}

}
