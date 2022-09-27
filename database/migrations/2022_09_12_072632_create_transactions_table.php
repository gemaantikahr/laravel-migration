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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('source_account_number');
            $table->string('source_account_name');
            $table->double('amount');
            $table->string('remark');
            $table->enum('channel',['BRI', 'BCA','MANDIRI']);
            $table->timestamp('transaction_date_time');
            $table->foreignId('core_member_id');
            $table->string('beneficiary_account_name');
            $table->string('beneficiary_account_number');
            $table->string('beneficiary_account_email');
            $table->enum('status', ['PENDING','SUCCESS','WAITING','FAILED']);
            $table->string('error')->nullable();
            $table->string('bca_transaction_id')->default(0);
            $table->string('bca_reference_id')->default(0);
            $table->string('mandiri_external_id')->default(0);
            $table->string('mandiri_customer_reference_no')->default(0);
            $table->string('bri_no_referral')->default(0);
            $table->string('bri_transaction_date')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};
