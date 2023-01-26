<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();

            //atau bisa tulis kaya biasa cuma di jelasin di bawah referencenya ketabel apa dan primarynya apa
            $table->unsignedBigInteger('camp_id');

            //buat relasi bisa kaya gini, cuma syarat'a field'a harus sama dengan table relasi dan primary keynya contoh tablenya camp dan primarynya id jadi camp_id
            // $table->foreign('camp_id')->constrained();

            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_benefits');
    }
}
