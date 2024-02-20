<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ErrorLogs extends Model
{
    protected $table = 'error_logs';
    protected $fillable = ['message', 'code', 'line', 'file', 'is_resolved'];

}
