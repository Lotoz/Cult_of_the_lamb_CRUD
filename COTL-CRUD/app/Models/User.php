<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Follower;

/**
 * User
 *
 * Model representing a user (cult leader) in the application.
 * A user can own multiple followers and is responsible for managing them.
 *
 * @property int $id Unique identifier of the user
 * @property string $name Name of the user
 * @property string $email Unique email address of the user
 * @property string $password Hashed password of the user
 * @property \Carbon\Carbon|null $email_verified_at Email verification date
 * @property string|null $remember_token Remember me token
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Attributes that can be mass assigned.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Attributes that should be hidden when serializing the model (JSON, array).
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define attribute casting for this model.
     *
     * Specifies how Laravel should interpret the data:
     * - 'email_verified_at' is cast to datetime for date handling
     * - 'password' is automatically hashed when saved
     *
     * @return array<string, string> Array with casting rules
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship: A user (leader) can have many followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function followers()
    {
        return $this->hasMany(Follower::class);
    }
}
