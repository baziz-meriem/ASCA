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
        Schema::create('adhesions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['contribution', 'signalement', 'adhesion'])->default('adhesion');
            $table->enum('nature', ['environnmentale', 'sociale', 'economique']);
            $table->enum('statut', ['en attente', 'traité', 'archivé'])->default('en attente');
            $table->string("niveau_etude"); // not sure about it
            $table->string("filiere"); // Not sure about it
            $table->string("secteur"); // Not sure about it
            $table->string("sit_familiale")->nullable();
            $table->string("nom_Jfille");
            $table->string("pays");
            $table->string("adresse");
            $table->string("code_postal");
            $table->string("ville")->nullable();
            // fonction = publique || privé
            $table->enum('fonction', ['publique', 'privé']);
            /*
            * Laravel doesn't support arrays
            * we can use a text field where we store values separated by ','
            */
            $table->text("centres_inter")->nullable();
            $table->string("cv")->nullable();
            $table->string("extrait_naissance")->nullable();
            $table->string("certificat_residence")->nullable();
            $table->string("piece_identite")->nullable();
            $table->string("photo")->nullable();
            $table->string("recu_paiment")->nullable();
            $table->boolean("deleted")->default(false);
            $table->foreignId('bureau_id')
                ->constrained('bureau__asca')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('adhesions');
    }
};
