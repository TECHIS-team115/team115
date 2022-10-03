<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['user_id', 'name', 'status', 'type', 'detail'];

    const TYPE = [
        1 => "エアコン",
        2 => "洗濯機",
        3 => "冷蔵庫",
        4 => "掃除機",
        5 => "テレビ",
        6 => "照明器具",
        7 => "空気清浄機"
    ];
}