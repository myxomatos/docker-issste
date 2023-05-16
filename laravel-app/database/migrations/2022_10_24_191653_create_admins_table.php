<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('unidad_medica')->nullable();
            $table->text('nombre_subcoordinador')->nullable();
            $table->text('role')->nullable();
            $table->text('enlace')->nullable();
            $table->text('horario_servicio')->nullable();
            $table->text('turno')->nullable();
            $table->text('recibe')->nullable();
            $table->text('entrega')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('email',70)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('enlace_2')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
