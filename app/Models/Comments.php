<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_comment',
        'user_id',
        'post_id'
    ];


    public function post(): BelongsTo
    {
        return $this->BelongsTo(Posts::class);
    }

}
