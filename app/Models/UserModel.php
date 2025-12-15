<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'custom_user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
