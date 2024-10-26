<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    // Optionally specify the table name if it's not plural of the model name
    protected $table = 'transactions'; // Adjust if your table name is different

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'user_id', // Assuming there is a user relationship
        'amount',
        'transaction_date', 
        'location_id', 
        // Add other fields as needed
    ];

    // Define relationships (if applicable)
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming a User model exists
    }
}