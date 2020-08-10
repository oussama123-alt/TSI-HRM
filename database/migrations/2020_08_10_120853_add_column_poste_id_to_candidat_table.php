<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPosteIdToCandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidats', function (Blueprint $table) {
            
            $table->unsignedBigInteger('poste_id')->nullable()->after('cv');

            $table->foreign('poste_id')->references('id')->on('postes');
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
            $table->dropForeign(['poste_id']);
            $table->dropCulomn('poste_id');
        });
    }
}
