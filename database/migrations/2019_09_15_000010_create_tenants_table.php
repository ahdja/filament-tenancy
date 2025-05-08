<?php

declare(strict_types=1);

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
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            //Login
            $table->string('password')->nullable();

            //OTP
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_code_active_at')->nullable();

            $table->boolean('is_active')->default(1)->nullable();

            $table->json('data')->nullable();

            $table->timestamps();
        });

        Schema::create('tenant_configurations',function(Blueprint $table){
            $table->id();
            $table->string('tenant_id')->nullable();
            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->string('config_name');
            $table->string('config_value');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
        Schema::dropIfExists('tenant_configurations');
    }
}
