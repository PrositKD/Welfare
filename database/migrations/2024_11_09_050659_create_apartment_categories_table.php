<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('apartment_categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->decimal('bill', 10, 2)->nullable();  // Add bill field
            $table->boolean('status')->default(1);  
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('apartment_categories');
    }
}
