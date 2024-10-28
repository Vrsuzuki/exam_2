<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('first_name', 255)->notNullable();
            $table->string('last_name', 255)->notNullable();
            $table->tinyInteger('gender')->notNullable();
            $table->string('email', 255)->notNullable();
            $table->string('tel', 255)->notNullable();
            $table->string('address', 255)->notNullable();
            $table->string('building', 255);
            $table->text('detail')->notNullable();
            $table->timestamp('created_at')->useCurrent()->notNullable();
            $table->timestamp('updated_at')->useCurrent()->notNullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
