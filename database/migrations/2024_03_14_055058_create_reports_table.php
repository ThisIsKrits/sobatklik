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
            $table->string('category');
            $table->foreignId('type_id')->constrained('report_types');
            $table->dateTime('report_date');
            $table->foreignId('brand_id')->constrained('brand_lists')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('reporter_id')->constrained('users');
            $table->foreignId('admin_id')->nullable()->constrained('users');
            $table->string('complaint');
            $table->string('status')->default('Laporan Baru');
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
