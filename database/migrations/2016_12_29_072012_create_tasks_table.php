<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->enum('action', ['call', 'visit']);
            $table->text('note')->nullable();
            $table->timestamp('expected_at')->nullable();
            $table->timestamp('marked_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->boolean('completed')->default(false);
            $table->integer('created_by')->unsigned()->nullable()->default(0);
            $table->integer('marked_by')->unsigned()->nullable();
            $table->integer('completed_by')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
