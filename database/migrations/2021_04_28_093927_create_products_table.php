<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->decimal('sale_price')->nullable();
$table->string('SKU');
$table->enum('stock_status',['instock','outofstock']);

$table->boolean('featured')->default(false);
$table->integer('qty')->default(10);
$table->string('image')->nullable();
$table->text('images')->nullable();
$table->bigInteger('category_id')->unsigned()->nullable();

$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
