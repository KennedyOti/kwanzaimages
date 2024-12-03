<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientDetailsAndStatusToSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('client_name')->after('user_id'); // Client's name
            $table->string('client_contact')->after('client_name'); // Client's contact information
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending')->after('client_contact'); // Status of the sale
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn(['client_name', 'client_contact', 'status']);
        });
    }
}
