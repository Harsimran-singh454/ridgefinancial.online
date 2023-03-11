<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credit_rebuilder extends Model
{
    use HasFactory;
    protected $table = 'credit_rebuilder';
        public $timestamps = true;
        protected $fillable = [

            'title',
            'name',
            'DOB',
            'email',
            'phone',
            'address',
            'term',
            'status',


            'account_number',
            'client_id',
            'monthly_fee',
            'amount_saved',
            'tot_lineOfCr',
            'tot_payments',
            'term',
            'due_date',
        ];
}
