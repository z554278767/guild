<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     * @table roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('r_id')->comment('角色ID');
            $table->string('r_name', 45)->nullable()->comment('角色名');
            $table->tinyInteger('r_status')->nullable()->default('0')->comment('角色状态（0可用 1不可用）');

            $table->unique(["r_id"], 'unique_roles');
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
       Schema::dropIfExists('roles');
     }
}
