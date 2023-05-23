<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor_servicos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_created');
            $table->string('name', 100);
            $table->decimal('price', 10, 2);
            $table->enum('tipo', ['p/Kg', 'Fixo', 'Variavel']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedor_servicos');
    }
}
