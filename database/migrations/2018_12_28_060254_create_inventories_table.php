<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('item_id');
            $table->unsignedInteger('product_id');
            $table->string('product_type');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->timestamp('purchased_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->string('buyer_email')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
