<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MeasurementsUnits;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Category;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('local_code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->longText('image')->nullable();
            $table->integer('current_stock')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->integer('maximum_stock')->default(0);
            $table->decimal('price',12,4)->default(0);
            $table->foreignIdFor(MeasurementsUnits::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(Brand::class)->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(Supplier::class)->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(Category::class)->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
