<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'karya';
    protected $primaryKey = 'id_karya';

    protected $fillable = [
        'id_user',
        'title',
        'desc',
        'link',
        'karya',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_karya');
    }
}
