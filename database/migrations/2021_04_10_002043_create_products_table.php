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
            $table->string('local_code')->unique();
            $table->string('name');
            $table->Text('description')->nullable();
            $table->Text('image')->nullable();
            $table->integer('total_current_stock')->unsigned()->default(0);
            $table->integer('total_minimum_stock')->unsigned()->default(0);
            $table->integer('total_maximum_stock')->unsigned()->default(0);
            $table->float('gain',12,2)->default(0);
            $table->float('price',12,2)->default(0);
            $table->float('cost',12,2)->default(0);
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
