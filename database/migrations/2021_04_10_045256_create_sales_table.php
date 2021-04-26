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
            $table->float('total_amount', 12, 2)->default(0);
            $table->integer('nit')->nullable();
            $table->date('date');

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
