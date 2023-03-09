<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class money_transfer extends Model
{
    use HasFactory;
    protected $table = 'money_transfer';
        public $timestamps = true;
        protected $fillable = [
            'sender',
            'client_id',
            'receipient',
            'using',
            'card_number',
            'LOC_num',
            'rec_email',
            'transit',
            'inst_number',
            'account_number',
            'details',
            'amount',
            'transferStatus',
        ];
}
