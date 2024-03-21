<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('singing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('stagename')->nullable();
            $table->text('why_tup_expectations')->nullable();
            $table->text('why_we_select_you')->nullable();
            $table->text('future_plan_if_win')->nullable();
            $table->text('opinion_new_season_tup')->nullable();
            $table->text('written_composed_song_inspiration')->nullable();
            $table->text('life_changing_incident')->nullable();
            $table->text('change_about_self_love_about_self')->nullable();
            $table->text('unique_qualities')->nullable();
            $table->text('main_goal_difficulties')->nullable();
            $table->text('biggest_strength_support')->nullable();
            $table->text('favorite_judge_why')->nullable();
            $table->text('role_model_inspiration')->nullable();
            $table->text('prepared_songs')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singing');
    }
};
