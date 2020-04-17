<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreatePermissionesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->comment('权限名');
            $table->string('slug', 100)->comment('权限标识,用于控制器注解权限');
            $table->string('http_method', 200)->comment('请求方式');
            $table->string('http_path', 100)->comment('请求路由');
            $table->string('level_path', 200)->comment('分级路径');
            $table->string('pid', 200)->default('0')->comment('上级id');
            $table->string('note', 200)->nullable()->comment('备注');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissiones');
    }
}
