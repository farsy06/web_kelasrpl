<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    protected $table = 'sosmed';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'whatsapp',
        'instagram',
        'tiktok',
        'linkedin',
        'facebook',
        'youtube',
        'reddit',
        'x',
        'discord',
        'github',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
