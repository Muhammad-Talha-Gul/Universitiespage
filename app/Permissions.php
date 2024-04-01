<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions'; // Specify the table name if it's different from the default convention
    protected $fillable = ['admin_id', 'admin_name', 'admin_email', 'admin_password', 'admin_permissions']; // Define the fillable attributes
}
