<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('Name')->nullable();
            $table->string('gender')->nullable();
            $table->date('Date')->nullable();
            $table->string('Lieu_De_Naissance')->nullable();
            $table->string('adress')->nullable();
            $table->string('CIN')->nullable();
            $table->string('Etablissement')->nullable();
            $table->string('Formation')->nullable();
            $table->string('Lieu_De_Stage')->nullable();
            $table->string('Tuteur');
            $table->string('departement');
            $table->string('Remunire');
            $table->string('ribcheque')->nullable();
            $table->string('ribnumero')->nullable();
            $table->string('RIB')->nullable();
            $table->integer('Indemnite')->nullable();
            $table->string('Sujet')->nullable();
            $table->string('DR')->nullable(); // Numéro de la demande de recrutement
            $table->string('date_debut')->nullable();
            $table->string('date_fin')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conventions');
    }
}
