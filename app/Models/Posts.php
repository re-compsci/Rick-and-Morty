<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'post description',
        'post',
        'earth',
        'user_id',
        'type',
        'char'
    


        
    ];

    protected $casts = [
        'earth' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comments::class);
    }


}
