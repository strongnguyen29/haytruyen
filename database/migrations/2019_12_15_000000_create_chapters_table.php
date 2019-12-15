<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_id');
            $table->boolean('publish')->default(true);
            $table->string('name');
            $table->string('slug')->index();
            $table->longText('content');
            $table->unsignedInteger('number');
            $table->string('content_type')->default('text');
            $table->string('source_link')->default('');
            $table->string('source_id')->default(0);
            $table->timestamps();
            $table->unique(['book_id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
