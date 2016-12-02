<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersRolesTable extends Migration
{
    /**
     * Run the migrations.
     * @table members_roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('mr_id')->comment('自增ID');
            $table->integer('m_id')->nullable()->comment('会员ID');
            $table->integer('r_id')->nullable()->comment('角色表');

            $table->unique(["mr_id"], 'unique_members_roles');
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
       Schema::dropIfExists('members_roles');
     }
}
