<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidats', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->string('adress')->after('email')->nullable();
            $table->float('exp_years')->after('status')->nullable();
            $table->string('poste_similaire')->after('status')->nullable();
            $table->integer('salair_min')->after('status')->nullable();
            $table->date('disponibilité')->after('status')->nullable();
            $table->string('langues')->after('status')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidats', function (Blueprint $table) {
            $table->dropCulomn('surname');
            $table->dropCulomn('adress');
            $table->dropCulomn('exp_years');
            $table->dropCulomn('poste_similaire');
            $table->dropCulomn('salaire_min');
            $table->dropCulomn('disponibilité');
            $table->dropCulomn('langues');
        });
    }
}
