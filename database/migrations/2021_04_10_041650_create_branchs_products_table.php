<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\BranchOffice;

class CreateBranchsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs_products', function (Blueprint $table) {
            $table->id();
            $table->integer('current_stock')->unsigned()->default(0);
            $table->integer('minimum_stock')->unsigned()->default(0);
            $table->integer('maximum_stock')->unsigned()->default(0);
            $table->foreignIdFor(Product::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(BranchOffice::class)->constrained()
            ->onUpdate('cascade')
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
        Schema::dropIfExists('branchs_products');
    }
}
