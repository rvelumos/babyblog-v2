<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoalbumphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoalbumphotos', function (Blueprint $table) {
            $table->id();
            $table->integer('album_id');
            $table->string('name'); 
            $table->string('description')->nullable();           
            $table->string('image');            
            $table->string('width');
            $table->string('height');
            $table->string('type');
            $table->integer('filesize');
            $table->string('uploader');            
            $table->string('auth_key')->nullable();
            $table->integer('viewed')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('photoalbumphotos');
    }
}
