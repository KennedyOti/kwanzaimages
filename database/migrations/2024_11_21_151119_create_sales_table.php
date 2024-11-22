<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // References 'id' on 'services' table
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade'); // References 'id' on 'branches' table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // References 'id' on 'users' table
            $table->integer('quantity'); // Quantity of the service
            $table->decimal('amount', 10, 2); // Sale amount in KSH
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
}
