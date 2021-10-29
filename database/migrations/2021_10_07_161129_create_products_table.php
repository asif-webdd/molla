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
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('create_by');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('model')->nullable();
            $table->decimal('price');
            $table->decimal('offer_price');
            $table->date('offer_date_start')->nullable();
            $table->date('offer_date_end')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('gallery')->nullable();
            $table->integer('quantity');
            $table->string('sku_code');
            $table->enum('featured', ['yes', 'no'])->default('no');
            $table->text('size')->default('[]');
            $table->text('color')->default('[]');
            $table->tinyInteger('warranty')->default(1)->comment('1 Yes and 0 No');
            $table->string('warranty_duration')->nullable();
            $table->longText('warranty_conditions')->nullable();
            $table->longText('description');
            $table->text('video')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');
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
