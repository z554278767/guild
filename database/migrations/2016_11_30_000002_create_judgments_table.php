<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgmentsTable extends Migration
{
    /**
     * Run the migrations.
     * @table judgments
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judgments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('j_id')->comment('褒（奖）贬（斥）ID');
            $table->string('m_id', 45)->nullable()->comment('会员（用户）ID');
            $table->integer('c_id')->nullable()->comment('公司ID');
            $table->string('c_name', 45)->nullable()->comment('公司名称');
            $table->tinyInteger('j_type')->nullable()->default('0')->comment('褒贬类型（单选：0褒奖 1惩戒 ）');
            $table->text('j_info')->nullable()->comment('褒贬信息（依据）');
            $table->text('j_res')->nullable()->comment('褒贬结果');
            $table->tinyInteger('j_status')->nullable()->default('1')->comment('是否行业联动（0联动 1不联动）');

            $table->unique(["j_id"], 'unique_judgments');
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
       Schema::dropIfExists('judgments');
     }
}
