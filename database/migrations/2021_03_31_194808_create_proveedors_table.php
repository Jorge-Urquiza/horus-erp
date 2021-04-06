<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipopersoneria', ['J', 'N'])->default('J');
            $table->string('direccion');
            $table->integer('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('formadepago')->nullable();
            $table->date('fechaalta')->nullable();
            $table->date('fechabaja')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('proveedors');
    }
}
