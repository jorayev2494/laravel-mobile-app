<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->string('type')->nullable();
            $table->string('path')->nullable();
            $table->string('name');
            
            $table->bigInteger('size')->nullable();     // in bytes file size
            $table->string('mime_type');
            $table->string('user_file_name')->nullable();
            
            $table->morphs('fileable');            

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
        Schema::dropIfExists('files');
    }
}
