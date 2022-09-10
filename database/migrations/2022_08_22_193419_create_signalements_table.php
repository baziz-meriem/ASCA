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
        Schema::create('signalements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['contribution', 'signalement', 'adhesion'])->default('signalement');
            $table->enum('nature', ['environnmentale', 'sociale', 'economique']);
            $table->enum('statut', ['en attente', 'traité', 'archivé'])->default('en attente');
            $table->string("pays");
            $table->string("wilaya");
            $table->string("daira");
            $table->string("commune");
            $table->integer("codePostale");
            $table->string("depassement");
            $table->text("depass_description");
            $table->boolean("voir_respo");
            $table->text("conduit")->nullable();
            $table->text("solution_propose")->nullable();
            $table->boolean("deleted")->default(false);
            //Id du citoyen qui a lancé le signalement
            $table->foreignId('user_id')
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
        Schema::dropIfExists('signalements');
    }
};
