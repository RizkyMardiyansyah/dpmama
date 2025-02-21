<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'domain', 'template', 'nik', 'email', 'ktp', 'siup', 'npwp',
                'subscription', 'domainCost', 'templateCost', 'subscriptionCost',
                'orderId', 'status', 'snapKey', 'terms_and_condition_at',
                'paymentType', 'invoice', 'referal'
            ]);

            // Tambahkan kolom orders dengan tipe JSON
            $table->longText('orders')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
