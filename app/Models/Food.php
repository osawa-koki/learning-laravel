<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    // `food`は不可算名詞だが、テーブル名は複数形にする。
    protected $table = 'foods';

    use HasFactory;
    use SoftDeletes;

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
