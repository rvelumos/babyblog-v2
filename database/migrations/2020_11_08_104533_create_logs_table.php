<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string("ip");
            $table->string("page")->nullable();
            $table->string("user")->nullable();
            $table->string("url");
            $table->string("webhost");
            $table->string("browser");
            $table->string("os_server")->nullable();
            $table->string("os_user")->nullable();
            $table->string("referrer")->nullable();
            $table->string("protocol")->nullable();
            $table->string("method")->nullable();
            $table->string("message")->nullable();
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
        Schema::dropIfExists('logs');
    }
}
