<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secured_card extends Model
{
    use HasFactory;
    protected $table = 'secured_card';
        public $timestamps = true;
        protected $fillable = [
            'account_number',
            'client_id',
            'credit_limit',
            'current_balance',
            'authorizations',
            'credit_remaining',
            'due_date',
            'cycle_date',
            'transactions',
            'card_number',
            'pin_number',
        ];
}
