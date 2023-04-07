<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $primaryKey = 'podcast_id';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        'audio'
    ];
    protected $table = 'podcasts';
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
