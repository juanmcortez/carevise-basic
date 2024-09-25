<?php

namespace App\Models\Users;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Commons\Demographic;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'username';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'is_active',
        'is_provider',
        'demographic_id',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'password',
        'is_active',
        'is_provider',
        'demographic_id',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password'      => 'hashed',
            'is_active'     => 'boolean',
            'is_provider'   => 'boolean',
        ];
    }

    /**
     * Demographic address relationship to model
     *
     * @return HasOne
     */
    public function demographic(): HasOne
    {
        return $this->hasOne(Demographic::class, 'id', 'demographic_id')
            ->withDefault();
    }
}
