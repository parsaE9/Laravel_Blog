<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->boolean('user_list')->default(false);
            $table->boolean('user_create')->default(false);
            $table->boolean('user_edit')->default(false);
            $table->boolean('user_delete')->default(false);

            $table->boolean('admin_list')->default(false);
            $table->boolean('admin_create')->default(false);
            $table->boolean('admin_edit')->default(false);
            $table->boolean('admin_delete')->default(false);

            $table->boolean('blog_list')->default(false);
            $table->boolean('blog_edit')->default(false);
            $table->boolean('blog_delete')->default(false);

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
