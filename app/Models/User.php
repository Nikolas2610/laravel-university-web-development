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
        //      Παίρνουμε το ID του χρήστη από το session
        $userId = session('user_id');


        if (isset($userId)) {
            //  Βρίσκουμε τον χρήστη στη βάση δεδομένων
            $user = User::find($userId);

            //          Αν ο χρήστης υπάρχει ενημερώνουμε τη μεταβλητή και επιστρέφουμε true
            if (isset($user->id)) {
                self::$isUserLog = true;
                return true;
            }
        }

        //      Αν δεν υπάρχει επιστρέφουμε false
        return false;
    }
}
