<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "user_id";
    public $timestamps = true;

    protected $guarded = [
        'user_id',
    ];

    protected $hidden = [
        'user_id',
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function projects()
    {
        // SELECT * FROM users JOIN projects ON projects.user_id = users.user_id;
        return $this->hasMany(Project::class, 'user_id', 'user_id');
    }
}
