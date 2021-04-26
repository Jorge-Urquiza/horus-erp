<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BranchOffice;
use App\Models\User;
class CreateOutputNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BranchOffice::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('total_amount',12,2)->default(0);
            $table->date('date');
            $table->integer('total_quantity');
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
        Schema::dropIfExists('output_notes');
    }
}
