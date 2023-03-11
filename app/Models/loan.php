<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    use HasFactory;
    protected $table = 'loan';
        public $timestamps = true;
        protected $fillable = [

            'title',
            'name',
            'DOB',
            'email',
            'phone',
            'work_number',
            'address',
            'loan_amount',
            'purpose',
            'status',

            'account_number',
            'client_id',
            'account_balance',
            'due_date',
            'payment_amount',
            'frequency',
            'current_balance',
            'interest_rate',
            'term',
            'payment',

        ];
}
