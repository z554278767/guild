<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     * @table roles_privileges
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_privileges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('rp_id')->comment('自增ID');
            $table->integer('r_id')->nullable()->comment('角色ID');
            $table->integer('p_id')->nullable()->comment('权限ID');

            $table->unique(["rp_id"], 'unique_roles_privileges');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('roles_privileges');
     }
}
