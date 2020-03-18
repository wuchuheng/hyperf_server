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
            $table->string('level_path', 200)->default(0)->comment('关系链');
            $table->string('route', 100)->comment('路由');
            $table->string('action', 10)->nullable()->comment(http请求动作);
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
