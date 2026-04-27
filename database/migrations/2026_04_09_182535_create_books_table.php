<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
          
        // Book Name
        // Book Description
        // Book Category
        // Book Author
        // Book Price
        // Book img
        
            $table->id();
            $table->string("book_name");
            $table->text("book_description");
            $table->enum("category", ['دينية', "علمية", "برمجة", "تاريخية"]);
            $table->string("author");
            $table->double("price");
            $table->string("book_img");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
