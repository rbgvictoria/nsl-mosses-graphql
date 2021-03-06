<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTropicosNamesReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tropicos.tropicos_names_references', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('tropicos_name_id');
            $table->bigInteger('tropicos_reference_id');
            $table->boolean('accepted_by')->nullable();
            $table->boolean('published_in')->nullable();
            $table->string('annotation')->nullable();
            $table->index('tropicos_name_id');
            $table->index('tropicos_reference_id');
            $table->unique(['tropicos_name_id', 'tropicos_reference_id']);
            $table->foreign('tropicos_name_id')->references('id')->on('tropicos.tropicos_names');
            $table->foreign('tropicos_reference_id')->references('id')->on('tropicos.tropicos_references');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tropicos.tropicos_names_references');
    }
}
