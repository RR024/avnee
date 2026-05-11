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
        Schema::table('products', function (Blueprint $table) {
            // Badge text customization
            if (!Schema::hasColumn('products', 'badge_purchase_protection')) {
                $table->string('badge_purchase_protection')->default('100% Purchase Protection')->after('show_free_shipping_badge')->comment('Customizable purchase protection badge text');
            }

            if (!Schema::hasColumn('products', 'badge_assured_quality')) {
                $table->string('badge_assured_quality')->default('Assured Quality')->after('badge_purchase_protection')->comment('Customizable assured quality badge text');
            }

            if (!Schema::hasColumn('products', 'badge_returnable_text')) {
                $table->string('badge_returnable_text')->default('This product is returnable')->after('badge_assured_quality')->comment('Customizable returnable badge text');
            }

            if (!Schema::hasColumn('products', 'badge_free_shipping_text')) {
                $table->string('badge_free_shipping_text')->default('Free shipping*')->after('badge_returnable_text')->comment('Customizable free shipping badge text');
            }

            // Badge visibility toggles
            if (!Schema::hasColumn('products', 'show_purchase_protection_badge')) {
                $table->boolean('show_purchase_protection_badge')->default(true)->after('badge_free_shipping_text')->comment('Whether to display the purchase protection badge');
            }

            if (!Schema::hasColumn('products', 'show_assured_quality_badge')) {
                $table->boolean('show_assured_quality_badge')->default(true)->after('show_purchase_protection_badge')->comment('Whether to display the assured quality badge');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'badge_purchase_protection',
                'badge_assured_quality',
                'badge_returnable_text',
                'badge_free_shipping_text',
                'show_purchase_protection_badge',
                'show_assured_quality_badge',
            ]);
        });
    }
};
