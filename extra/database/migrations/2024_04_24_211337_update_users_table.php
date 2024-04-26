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
        Schema::table('users', function (Blueprint $table) {
            ;
            $table->string('telefono')->after('name');
            $table->string('ciudad');
            $table->string('curp');
            $table->integer('nivel_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('telefono');
            $table->dropcolumn('ciudad');
            $table->dropcolumn('curp');
            $table->dropcolumn('nivel_id');
        });
    }
};
