<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dependencias', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();

            // Definir la clave foránea para la columna 'user_id'
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dependencias', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna 'user_id'
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
