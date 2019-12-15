<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->string('poster', 1024);
            $table->text('description');
            $table->boolean('publish')->default(true)
                ->comment('0: private, 1: public');
            $table->unsignedTinyInteger('status')->default(0)
                ->comment('0:Đang ra, 1:Hoàn thành, 2:Giám định, 3:Tạm dừng.');
            $table->unsignedInteger('rate_value')->default(0);
            $table->unsignedInteger('rate_count')->default(0);
            $table->unsignedInteger('view_day')->default(0);
            $table->unsignedInteger('view_week')->default(0);
            $table->unsignedBigInteger('view_month')->default(0);
            $table->unsignedBigInteger('view_all')->default(0);
            $table->string('source');
            $table->string('source_link');
            $table->string('source_id');
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
        Schema::dropIfExists('books');
    }
}
