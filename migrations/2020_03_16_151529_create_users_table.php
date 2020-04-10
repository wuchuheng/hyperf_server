<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 150)->comment('账号');
            $table->string('password', '255')->comment('密码');
            $table->string('nickname', 50)->nullable()->comment('昵称');
            $table->char('phone', 11)->nullable()->comment( '手机号');
            $table->string('avatar', 255)->comment('头像');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
