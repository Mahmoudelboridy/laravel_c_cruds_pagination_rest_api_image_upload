<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cruds extends Model
{
    use HasFactory;
    public $table="cruds";
    protected $fillable=[
        "name",
        "image",
        "id",
        "created_at"

    ];
    protected $hidden=[
        "updated_at"
    ];
}