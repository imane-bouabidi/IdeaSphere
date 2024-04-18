<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeeTagTable extends Migration
{
    public function up()
    {
        Schema::create('idee_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idee_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('idee_tag');
    }
}
