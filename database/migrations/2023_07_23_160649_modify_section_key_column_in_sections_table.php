<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySectionKeyColumnInSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Remove the unique constraint on the section_key column
        Schema::table('sections', function (Blueprint $table) {
            $table->dropUnique('sections_section_key_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Add the unique constraint back to the section_key column
        Schema::table('sections', function (Blueprint $table) {
            $table->unique('section_key');
        });
    }
}

