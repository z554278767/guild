<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     * @table companys
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('c_id')->comment('公司ID');
            $table->string('c_name', 255)->nullable()->comment('公司名称');
            $table->string('c_rep', 45)->nullable()->comment('公司法定代表人');
            $table->string('c_contacts', 45)->nullable()->comment('公司联系人名称');
            $table->string('c_phone', 20)->nullable()->comment('公司（联系人）联系方式');
            $table->string('c_site', 255)->nullable()->comment('公司地址');
            $table->tinyInteger('c_status')->nullable()->default('1')->comment('审核状态（0通过 1未通过）');

            $table->unique(["c_id"], 'unique_companys');
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
       Schema::dropIfExists('companys');
     }
}
