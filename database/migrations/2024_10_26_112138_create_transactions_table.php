<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // This will create a SERIAL PRIMARY KEY for transaction_id
            $table->foreignId('user_id')->constrained('users'); // Foreign key referencing users table
            $table->decimal('amount', 10, 2);
            $table->date('transaction_date');
            $table->integer('location_id')->nullable(); // Make nullable if location is optional
            $table->timestamps(); // This adds created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
