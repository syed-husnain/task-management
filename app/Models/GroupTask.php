<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'task_id'
    ];
}
