<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            $table->enum('active', ['Y','N'])->default('Y');

            $table->date('subscription')->nullable();
            $table->date('expires_at')->nullable();
            $table->string('subscription_id', 255)->nullable();
            $table->boolean('subscription_active')->default(false);
            $table->boolean('subscription_suspended')->default(false);
            $table->timestamps();

            $table->foreign('plan_id')
                        ->references('id')
                        ->on('plans')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
