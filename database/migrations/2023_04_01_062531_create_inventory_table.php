<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToInventoryTable extends Migration
{
    public function up()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity')->unsigned();
            $table->decimal('price', 10, 2);
        });
    }

    public function down()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->dropColumn(['name', 'description', 'quantity', 'price']);
        });
    }
}
