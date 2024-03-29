<?php

use App\Enums\PropertyTypeEnum;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('broker_id');
            $table->enum('property_type',[
                PropertyTypeEnum::OPEN->value,
                PropertyTypeEnum::SELL->value,
                PropertyTypeEnum::EXCLUSIVE->value,
                PropertyTypeEnum::NET->value,
            ])->default(PropertyTypeEnum::OPEN->value);
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->longText('description');
            $table->year('build_year');
            $table->timestamps();

            $table->foreign('broker_id')
                  ->references('id')
                  ->on('brokers')
                  ->cascadeOnDelete();

            $table->unique(['address','zip_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
