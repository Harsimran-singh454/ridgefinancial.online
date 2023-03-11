<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiries extends Model
{
    use HasFactory;
    protected $table = 'inquiries';
        public $timestamps = true;
        protected $fillable = [
            'name',
            'phone',
            'email',
            'service',
            'message',
            'time_to_reach',
            'status',
        ];
}
