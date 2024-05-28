<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountypes', function (Blueprint $table) {
            $table->id();
            $table->string('AccTypeName', 255)->unique();
            $table->string('AccTypeDesc', 255)->nullable();
            $table->boolean('AccTypeStatus')->default(1); //0 => no, 1=>yes
            $table->string('AccTypeCreatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountypes');
    }
}
