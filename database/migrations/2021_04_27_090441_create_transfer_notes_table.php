<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_office_origin_id');
            $table->unsignedBigInteger('branch_office_destiny_id');
            $table->foreign('branch_office_origin_id')->references('id')
                ->on('branch_offices')
                ->ondelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('branch_office_destiny_id')->references('id')
                ->on('branch_offices')
                ->ondelete('cascade')
                ->onUpdate('cascade');
            $table->foreignIdFor(User::class)->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('total_amount',12,2)->default(0);
            $table->date('date');
            $table->integer('total_quantity');
            $table->text('note')->nullable();
            $table->boolean('is_canceled')->default(false);
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
        Schema::dropIfExists('transfer_notes');
    }
}
