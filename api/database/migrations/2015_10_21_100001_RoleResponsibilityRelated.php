<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleResponsibilityRelated extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
