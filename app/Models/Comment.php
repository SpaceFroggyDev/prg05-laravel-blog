<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Comment extends Model
{
    public function article(): belongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
