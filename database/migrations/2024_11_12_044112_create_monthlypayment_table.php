<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlypaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlypayment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id');
            
            // Columns for each month
            for ($i = 1; $i <= 12; $i++) {
                $table->decimal('month_' . str_pad($i, 2, '0', STR_PAD_LEFT), 10, 2)->nullable()->comment("Payment for month $i");
            }
            
            $table->integer('year'); // Year field
            $table->string('type')->nullable(); // Type of payment (e.g., rent, maintenance, etc.)
            $table->timestamps();

            // Optionally add a foreign key constraint if the 'apartments' table exists
            // $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthlypayment');
    }
}
