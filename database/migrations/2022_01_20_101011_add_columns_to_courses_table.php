<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedInteger('e3tmad_id')->nullable();
            $table->boolean('bag_type')->default('1');
            $table->decimal('cert_price', 10,2)->default(0);
            $table->string('cert_image')->nullable();
            $table->json('cert_data')->nullable();
            $table->string('level')->nullable();
            $table->string('voltage')->nullable();
            $table->string('duration')->nullable();
            $table->string('recording_url')->nullable();
            $table->text('goals')->nullable();
            $table->text('requirements')->nullable();
            $table->text('outputs')->nullable();
            $table->text('target_group')->nullable();
            $table->text('sponsor_name')->nullable();

            $table->foreign('e3tmad_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['e3tmad_id','bag_type','cert_price','cert_image','cert_data','level','voltage','duration','recording_url','goals','requirements','outputs','target_group','sponsor_name']);
        });
    }
}
