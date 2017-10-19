<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
        	'slug' => "admin",
        	'name' => "Administrator",
        	'permissions' => [
        		"admin" => true
        	]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();

        $adminrole = Sentinel::findRoleByName("Administrator");

        $user_admin = ["first_name"=>"M", "last_name"=>"Admin", "email"=>'madmin@mail.com', 'password'=>'mimin1234'];
        $adminuser = Sentinel::registerAndActivate($user_admin);

        $adminuser->roles()->attach($adminrole);

        $role_writer = [
        	'slug' => "writer",
        	'name' => "Writer",
        	'permissions' => [
        		'articles.index' => true,
        		'articles.create' => true,
        		'articles.store' => true,
        		'articles.show' => true,
        		'articles.edit' => true,
        		'articles.update' => true,
        		'add' => true,
        		'change' => true,
        		'delete' => true
        	]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();
        $writerrole = Sentinel::findRoleByName('Writer');

        $user_writer = ["first_name"=>"Oda", "last_name"=>"Eiichiro", "email"=>"oda@echiro.com", "password"=>"user1234"];
        $writeruser = Sentinel::registerAndActivate($user_writer);
        $writeruser->roles()->attach($writerrole);
    }
}
