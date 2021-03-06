<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('StatusGroupTableSeeder');
                $this->call('StatusTableSeeder');
                $this->call('StatusMappingTableSeeder');
                $this->call('RoleGroupTableSeeder');
                $this->call('RoleTableSeeder');
                $this->call('RoleMappingTableSeeder');
                $this->call('UserTableSeeder');
	}

}


class StatusGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status_group')->delete();
                
                DB::table('status_group')->insert(array(
                    array('id'=>'1000','name'=>'User Related','description'=>'Status related to user such as active,in-active etc..'),
                    array('id'=>'1001','name'=>'Project Related','description'=>'Status related to project such as started,completed etc..'),
                    array('id'=>'1002','name'=>'Role Related','description'=>'Status related to roles such as active,in-active etc..')
                ));
	}

}


class StatusTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status')->delete();
                
                DB::table('status')->insert(array(
                    array('id'=>'1000','name'=>'User Active','description'=>'User can login'),
                    array('id'=>'1001','name'=>'User InActive','description'=>'User cannot login'),
                    array('id'=>'1002','name'=>'Role Active','description'=>'Role exists'),
                    array('id'=>'1003','name'=>'Role InActive','description'=>'Role Not Exists'),
                    
                ));
	}

}

class StatusMappingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status_mapping')->delete();
                
                DB::table('status_mapping')->insert(array(
                    array('status_id'=>'1000','status_group_id'=>'1000'),
                    array('status_id'=>'1001','status_group_id'=>'1000'),
                    array('status_id'=>'1002','status_group_id'=>'1002'),
                    array('status_id'=>'1003','status_group_id'=>'1002')
                ));
	}

}



class RoleGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role_group')->delete();
                
                DB::table('role_group')->insert(array(
                    array('id'=>'1000','name'=>'User Related','description'=>'roles related to user such as admin,guest etc..','status_code'=>'1002'),
                    array('id'=>'1001','name'=>'Project Related','description'=>'Status related to project such as project manager,developer etc..','status_code'=>'1002')
                ));
	}

}


class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role')->delete();
                
                DB::table('role')->insert(array(
                    array('id'=>'1000','name'=>'Super Admin','description'=>'Manager of entire application','status_code'=>'1002'),
                    array('id'=>'1001','name'=>'Admin','description'=>'Sub Manager','status_code'=>'1002'),
                    array('id'=>'1002','name'=>'Guest','description'=>'Test user','status_code'=>'1002')
                ));
	}

}

class RoleMappingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role_mapping')->delete();
                
                DB::table('role_mapping')->insert(array(
                    array('role_id'=>'1000','role_group_id'=>'1000'),
                    array('role_id'=>'1001','role_group_id'=>'1000'),
                    array('role_id'=>'1002','role_group_id'=>'1000')
                ));
	}

}


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user')->delete();
                
                DB::table('user')->insert(array(
                    array('id'=>'1000','user_first_name'=>'Ragav','user_last_name'=>'Hari','user_age'=>'25','user_gender'=>'1','user_email'=>'ragavhari91@gmail.com','user_password'=>'Ragav','user_mobile'=>'8056598186','user_role'=>'1000','user_status'=>'1000'),
                    array('id'=>'1001','user_first_name'=>'Uva','user_last_name'=>'Prakash','user_age'=>'24','user_gender'=>'1','user_email'=>'uva@gmail.com','user_password'=>'uva','user_mobile'=>'7897897897','user_role'=>'1000','user_status'=>'1000'),
                    array('id'=>'1002','user_first_name'=>'Vigneshmuthu','user_last_name'=>'smvm','user_age'=>'25','user_gender'=>'1','user_email'=>'vigneshmuthu.s.m@gmail.com','user_password'=>'vignesh','user_mobile'=>'8978978978','user_role'=>'1000','user_status'=>'1000')
                ));
	}

}