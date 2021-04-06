<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UnidadMedida;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\Categoria;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigolocal');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->longText('imagen')->nullable();
            $table->integer('stockactual')->default(0);
            $table->decimal('precio',12,4)->default(0);
            $table->foreignIdFor(UnidadMedida::class)->constrained();
            $table->foreignIdFor(Marca::class)->constrained();
            $table->foreignIdFor(Proveedor::class)->constrained();
            $table->foreignIdFor(Categoria::class)->constrained();
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
        Schema::dropIfExists('productos');
    }
}
