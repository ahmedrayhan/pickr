<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestRatingWithAllReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('guest_rating_and_all_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('rating')->default(0);
            $table->integer('rated-id')->unsigned();
            $table->integer('user_id')->nullable();
            $table->string('rated_by');
            $table->string('guest_email')->nullable();
            $table->string('guest_name')->nullable();
            $table->text('review');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
