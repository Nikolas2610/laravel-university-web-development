<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public static bool $isUserLog = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'municipality',
        'county',
        'fuel',
        'username',
        'afm',
        'password_confirmation'
    ];

    /**
     * Mutator method to hash the password before saving it to the database.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public static function isUserLog()
    {
//      Get the user id from the session
        $userId = session('user_id');


        if (isset($userId)) {
            //      Find the user from the database
            $user = User::find($userId);

//          Check the user if exists
            if (isset($user->id)) {
//          If exists continue with the request page
                self::$isUserLog = true;
                return true;
            }
        }

//      If not exists redirect the user to home page
        return false;
    }
}
