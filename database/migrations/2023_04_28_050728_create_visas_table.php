<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_name');
            $table->string('slug')->unique();
            $table->string('visa_type');
            $table->string('entry_type');
            $table->string('processing_time');
            $table->longText('description');
            
            $table->string('banner_image')->nullable();
            $table->string('tile_img')->nullable();
            $table->string('flag')->nullable();
            
            $table->string('adult_selling_price')->nullable();
            $table->string('child_selling_price')->nullable();
            $table->string('infant_sell_price')->nullable();
            $table->longText('document_required')->nullable();

            $table->longText('employed_r_d')->nullable();
            $table->longText('self_employed_r_d')->nullable();
            $table->longText('studen_r_d')->nullable();
            $table->longText('retired_r_d')->nullable();

            $table->longText('important_note')->nullable();
            $table->longText('faq')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('visas');
    }
}
