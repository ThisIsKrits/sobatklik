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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('codes');
            $table->date('report_date');
            $table->foreignId('categories_id')->constrained('sosmed_categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('contact_id')->constrained('contact_categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brand_lists')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('reporter_id')->constrained('users');
            $table->foreignId('admin_id')->constrained('users');
            $table->string('status');
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
        Schema::dropIfExists('reports');
    }
};
