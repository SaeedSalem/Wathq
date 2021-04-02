<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crs', function (Blueprint $table) {
            $table->id();
            $table->string('number', 100);
            $table->string('entity_number', 100);
            $table->string('name');
            $table->string('hijri_issue_date', 19);
            $table->string('hijri_expiry_date', 19);
            $table->string('hijri_cancellation_date', 19)->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->string('main_number', 100)->nullable();
            $table->text('activity_description')->nullable();
            $table->foreignId('cr_business_type_id')->nullable()->constrained();
            $table->foreignId('cr_status_id')->nullable()->constrained();
            $table->foreignId('cr_location_id')->nullable()->constrained();
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
        Schema::dropIfExists('crs');
    }
}
