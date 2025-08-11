<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('experience', 'requirements');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('requirement', 'experience');
        });
    }
};
