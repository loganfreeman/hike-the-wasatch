<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function(Blueprint $table) {
          $table->string('nickname')->nullable();
          $table->string('confirm_code', 64)->unique()->nullable();
          $table->tinyInteger('status')->default(false);
          $table->boolean('is_admin')->default(false);
          $table->string('github_id')->nullable();
          $table->string('github_name')->nullable();
          $table->string('github_url')->nullable();
          $table->string('weibo_name')->nullable();
          $table->string('weibo_link')->nullable();
          $table->string('website')->nullable();
          $table->string('description')->nullable();
          $table->enum('email_notify_enabled', ['yes',  'no'])->default('yes')->index();
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
        //
    }
}
