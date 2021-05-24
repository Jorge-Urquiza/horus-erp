<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BranchOffice;
use App\Models\User;
use App\Models\Customer;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('nit')->nullable()->default(0);
            $table->date('date');
            $table->float('subtotal', 12, 2)->default(0);
            $table->float('discount', 12, 2)->default(0);
            $table->float('total_amount', 12, 2)->default(0);
            $table->enum('status', ['Cerrada', 'Anulada'])->default('Cerrada');
            $table->foreignIdFor(BranchOffice::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(Customer::class)->constrained()
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
        Schema::dropIfExists('sales');
    }
}
