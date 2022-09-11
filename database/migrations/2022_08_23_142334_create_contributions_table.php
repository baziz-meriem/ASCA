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
        Schema::create('contributions', function (Blueprint $table) {
            
            $table->id();
            /* preocupation -> Vie sociale
             * Vie économique
             * Vie Environnementale
             */
            $table->enum('type', ['contribution', 'signalement', 'adhesion'])->default('contribution');
            $table->enum('nature', ['environnmentale', 'sociale', 'economique']);
            $table->enum('statut', ['en attente', 'traité', 'archivé'])->default('en attente');
            $table->string("pays");
            $table->string("wilaya");
            $table->string("commune");
            $table->string("daira")->nullable();
            $table->integer("codePostale")->nullable();
            //autorités locales
            $table->boolean("maire");
            $table->boolean("deputé");
            $table->boolean("wali");
            $table->text("description");
            $table->text("proposition");
            $table->boolean("deleted")->default(false);
            $table->foreignId('user_id')->nullable()
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributions');
    }
};
