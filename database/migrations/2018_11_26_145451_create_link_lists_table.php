<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinkListsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_lists', function (Blueprint $table) {
            $table->increments('id');

            $table->string('word')->comment('加密字符');
            $table->string('link')->comment('链接地址');
            $table->integer('view')->nullable()->default(0)->comment('浏览次数');

            $table->timestamps();
            $table->softDeletes();

            $table->index('word');
            $table->index(['id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('link_lists');
    }
}
