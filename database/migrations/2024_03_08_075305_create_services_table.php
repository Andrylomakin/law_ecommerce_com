<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->longText('name');
            $table->longText('preview_name');
            $table->longText('description');
            $table->longText('seo_title');
            $table->longText('seo_description');
            $table->longText('seo_text');
            $table->string('price');
            $table->string('photo');
            $table->string('icon');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('service_categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
