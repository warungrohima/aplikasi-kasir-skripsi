<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('owner', function (Blueprint $table) {
        $table->bigIncrements('id'); // ID sebagai primary key
        $table->string('name', 50);
        $table->string('email', 50);
        $table->string('password');
        $table->string('phone', 20);
        $table->rememberToken();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('owner');
}
};
