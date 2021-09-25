<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sent_date', 'first_name', 'last_name', 'email', 'message_title', 'message_body'
    ];
}
