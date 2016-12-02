<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     * @table privileges
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('p_id')->comment('权限ID');
            $table->string('p_name', 45)->nullable()->comment('权限（节点）名称');
            $table->string('p_type', 45)->nullable()->comment('权限类型（菜单、按钮）');
            $table->string('p_url', 255)->nullable()->comment('权限URL地址（例如  "/控制器名/方法名.action" ）');
            $table->string('p_code', 255)->nullable()->comment('权限代码（例如：添加用户，则写  “ user:create ” ）');
            $table->integer('p_parentid')->nullable()->comment('权限父ID');
            $table->integer('p_level')->nullable()->comment('递归深度');
            $table->integer('p_sort')->nullable()->default('99')->comment('权限排序');
            $table->tinyInteger('p_status')->nullable()->default('0')->comment('权限状态（0可用 1不可用）');

            $table->unique(["p_id"], 'unique_privileges');
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
       Schema::dropIfExists('privileges');
     }
}
