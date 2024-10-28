<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('content', 255)->notNullable();
            $table->timestamp('created_at')->useCurrent()->notNullable();
            $table->timestamp('updated_at')->useCurrent()->notNullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
