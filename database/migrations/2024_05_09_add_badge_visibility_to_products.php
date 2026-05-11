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
            // Add badge visibility fields if they don't exist
            if (!Schema::hasColumn('products', 'show_returnable_badge')) {
                $table->boolean('show_returnable_badge')->default(true)->after('is_returnable')->comment('Whether to display the returnable badge on product page');
            }
            if (!Schema::hasColumn('products', 'show_free_shipping_badge')) {
                $table->boolean('show_free_shipping_badge')->default(true)->after('show_returnable_badge')->comment('Whether to display the free shipping badge on product page');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['show_returnable_badge', 'show_free_shipping_badge']);
        });
    }
};
