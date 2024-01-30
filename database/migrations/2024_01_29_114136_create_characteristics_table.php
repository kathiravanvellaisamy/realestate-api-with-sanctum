<?php

use App\Enums\PropertyCategoryEnum;
use App\Enums\PropertyStatusEnum;
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
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->unique();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_category',[
                PropertyCategoryEnum::INDEPENDENT_HOUSE->value,
                PropertyCategoryEnum::APARTMENT->value,
                PropertyCategoryEnum::STUDIO_APARTMENT->value,
                PropertyCategoryEnum::BUNGALOW->value,
            ]);
            $table->enum('status',[
                PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::HOLD->value,
            ])->required();
            $table->timestamps();

            $table->foreign('property_id')
                  ->references('id')
                  ->on('properties')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristics');
    }
};
