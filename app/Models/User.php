<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'image',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
//     protected $appends = [
//         'profile_photo_url',
//     ];

    /**
     * Get the user's library.
     */
    public function library()
    {
        return $this->hasMany(Library::class);
    }

    /**
     * Define a one-to-many relationship with the Comment model.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * Define a one-to-many relationship with the Likes model.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        if ($this->role === $role) {
            return true;
        }else{
            return false;
        }
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
    }

}
