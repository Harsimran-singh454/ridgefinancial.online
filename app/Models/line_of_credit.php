<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class line_of_credit extends Model
{
    use HasFactory;
    protected $table = 'line_of_credit';
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
        ];
}
