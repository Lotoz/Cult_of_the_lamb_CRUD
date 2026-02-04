<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Follower
 *
 * Model representing a follower or adept in the cult.
 * Each follower has attributes such as name, species, power level,
 * loyalty points, and elderly status.
 *
 * @property int $id Unique identifier of the follower
 * @property int $user_id Identifier of the leader (owner of the follower)
 * @property string $name Name of the follower
 * @property string $species Species of the follower
 * @property int $level Power level (1-100)
 * @property int $loyalty_points Loyalty points (0-100)
 * @property bool $is_elderly Indicates if the follower is elderly
 * @property string $joined_at Date the follower joined the cult
 *
 * @package App\Models
 */
class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'species',
        'level',
        'loyalty_points',
        'is_elderly',
        'joined_at'
    ];

    /**
     * Attribute casting.
     *
     * Defines how Laravel should interpret data when retrieving and saving:
     * - 'is_elderly' is cast to boolean (true/false)
     * - 'joined_at' is cast to Carbon object for date manipulation
     * - 'level' and 'loyalty_points' are cast to integers
     */
    protected $casts = [
        'is_elderly' => 'boolean',
        'joined_at' => 'date',
        'level' => 'integer',
        'loyalty_points' => 'integer',
    ];

    /**
     * Relationship: A follower belongs to a single user (cult leader).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
