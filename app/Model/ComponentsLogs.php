<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ComponentsLogs extends Model
{
    protected $table = "components_logs";
    protected $fillable = ['log_id', 'page_id', 'title', 'type', 'meta', 'sort_order'];
    public $timestamps = false;
}
