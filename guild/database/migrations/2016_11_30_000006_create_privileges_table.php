<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     * @table members
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('m_id');
            $table->string('m_name', 45)->nullable()->comment('用户名');
            $table->char('m_password', 60)->nullable()->comment('密码(默认hash加密)');
            $table->char('sex', 10)->nullable()->comment('性别');
            $table->string('m_email', 255)->nullable()->comment('邮箱');
            $table->string('m_phone', 11)->nullable();
            $table->integer('qq')->nullable()->comment('QQ号');
            $table->string('m_level', 45)->nullable()->comment('会员等级');
            $table->string('m_company', 45)->nullable()->comment('用户所属公司名称');
            $table->integer('company_id')->nullable()->comment('用户所属公司ID');
            $table->string('m_head_ico', 255)->nullable()->comment('用户头像');
            $table->tinyInteger('m_status')->nullable()->default('0')->comment('用户帐号状态（0未锁定 1锁定 ）');
            $table->timestamp('last_login')->nullable()->comment('上次登录时间');

            $table->unique(["m_id", "m_name", "m_email"], 'unique_members');
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
       Schema::dropIfExists('members');
     }
}
