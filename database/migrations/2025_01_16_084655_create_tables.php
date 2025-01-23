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
        Schema::create('authors', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->date("birthday")->nullable();
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->timestamps();
        });
        Schema::create('books', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->text("description")->nullable();
            $table->integer("pages")->nullable()->unsigned();
            $table->integer("author_id")->unsigned();
            $table->integer("category_id")->unsigned();
            $table->foreign("author_id")->references("id")->on("authors");
            $table->foreign("category_id")->references("id")->on("categories");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('books');
    }
};
