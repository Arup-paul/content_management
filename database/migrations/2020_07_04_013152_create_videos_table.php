<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'videos', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'title' );
            $table->string( 'description' );
            $table->string( 'image' );
            $table->string( 'video_embed' );
            $table->string( 'slug' );
            $table->string( 'section' );
            $table->string( 'status' )->default( 0 );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'videos' );
    }
}
