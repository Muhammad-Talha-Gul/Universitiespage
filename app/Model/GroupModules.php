<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupModules extends Model
{
    protected $table = "group_modules";
    protected $fillable = ['group_id', 'module', '_show', '_create', '_edit', '_delete', '_import', 'show_email', 'show_phone'];
    public $timestamps = false;
}
