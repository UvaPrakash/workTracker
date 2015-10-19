<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('status',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->timestamps();
                });
                
                Schema::create('status_group',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->timestamps();
                });
                
                Schema::create('status_mapping',function(Blueprint $table){
                    $table->increments('id');
                    $table->unsignedInteger('status_id');
                    $table->unsignedInteger('status_group_id');
                });
                
                Schema::table('status_mapping',function(Blueprint $table){
                    $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
                    $table->foreign('status_group_id')->references('id')->on('status_group')->onDelete('cascade');
                });
                
                
                Schema::create('role',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->unsignedInteger('status_code');
                    $table->timestamps();
                });
                
                Schema::table('role',function(Blueprint $table){
                   $table->foreign('status_code')->references('id')->on('status')->onDelete('cascade');
                });
                
                Schema::create('role_group',  function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name')->unique();
                    $table->text('description');
                    $table->unsignedInteger('status_code');
                    $table->timestamps();
                });
                
                Schema::table('role_group',function(Blueprint $table){
                   $table->foreign('status_code')->references('id')->on('status')->onDelete('cascade');
                });
                
                Schema::create('role_mapping',  function(Blueprint $table){
                    $table->increments('id');
                    $table->unsignedInteger('role_id');
                    $table->unsignedInteger('role_group_id');
                    $table->timestamps();
                });
                
                Schema::table('role_mapping',function(Blueprint $table){
                   $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
                   $table->foreign('role_group_id')->references('id')->on('role_group')->onDelete('cascade');
                });
                
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('user_first_name');
                        $table->string('user_last_name');
                        $table->integer('user_age')->unsigned();
                        $table->integer('user_gender');
                        $table->string('user_email')->unique();
                        $table->string('user_mobile')->unique();
                        $table->unsignedInteger('user_role');
                        $table->unsignedInteger('user_status');
			$table->timestamps();
		});
                
                Schema::table('user',function(Blueprint $table){
                   $table->foreign('user_role')->references('id')->on('role')->onDelete('cascade');
                   $table->foreign('user_status')->references('id')->on('status')->onDelete('cascade');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
                Schema::drop('user');
                Schema::drop('status_mapping');
                Schema::drop('status_group');
                Schema::drop('role_mapping');
                Schema::drop('role_group');
                Schema::drop('role');
                Schema::drop('status');
	}

}
