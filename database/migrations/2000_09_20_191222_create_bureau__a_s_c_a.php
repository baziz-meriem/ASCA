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
        Schema::create('bureau__asca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pays_id")->nullable();
            $table->foreign("pays_id")->references("id")->on("pays");
            $table->unsignedBigInteger("wilayas_id")->nullable();
            $table->foreign("wilayas_id")->references("id")->on("wilayas");
            $table->unsignedBigInteger("dairas_id")->nullable();
            $table->foreign("dairas_id")->references("id")->on("dairas");
            $table->unsignedBigInteger("communes_id")->nullable();
            $table->foreign("communes_id")->references("id")->on("communes");
            $table->integer("codePostale");
            // Types : BureauWilay/ BureauCommune / BureauDaira/ BureauNational
            $table->string("type");
            $table->string("localisation");
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
        Schema::dropIfExists('bureau__asca');
    }
};
