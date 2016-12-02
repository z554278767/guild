<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * @table articles
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('a_id');
            $table->string('a_title', 255)->nullable()->comment('标题');
            $table->string('a_author', 45)->nullable()->comment('文章创建人');
            $table->text('a_content')->nullable()->comment('文章内容');
            $table->string('a_verifier', 45)->nullable()->comment('文章审核人');
            $table->date('verify_date')->nullable()->comment('文章审核时间');
            $table->tinyInteger('is_publish')->nullable()->default('1')->comment('是否对外发布（0发布 1不发布）');

            $table->unique(["a_id"], 'unique_articles');
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
       Schema::dropIfExists('articles');
     }
}
