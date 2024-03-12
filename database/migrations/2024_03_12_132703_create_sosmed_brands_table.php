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
        Schema::create('sosmed_brands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brand_lists')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('sosmed_id')->constrained('sosmed_categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('label');
            $table->string('link');
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
        Schema::dropIfExists('sosmed_brands');
    }
};
