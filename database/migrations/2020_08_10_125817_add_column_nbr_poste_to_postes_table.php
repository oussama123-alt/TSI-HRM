<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNbrPosteToPostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->unsignedBigInteger('nbr_postes')->after('discription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->dropCulomn('nbr_postes');
        });
    }
}
