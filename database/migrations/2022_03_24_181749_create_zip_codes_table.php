<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string('d_codigo', 10)->nullable();
            $table->string('d_asenta')->nullable();
            $table->string('d_tipo_asenta')->nullable();
            $table->string('D_mnpio')->nullable();
            $table->string('d_estado')->nullable();
            $table->string('d_ciudad')->nullable();
            $table->string('d_CP')->nullable();
            $table->integer('c_estado')->nullable();
            $table->string('c_oficina')->nullable();
            $table->string('c_CP')->nullable();
            $table->string('c_tipo_asenta')->nullable();
            $table->integer('c_mnpio')->nullable();
            $table->integer('id_asenta_cpcons')->nullable();
            $table->string('d_zona')->nullable();
            $table->string('c_cve_ciudad')->nullable();
            $table->timestamps();

            $table->index('d_codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
};
