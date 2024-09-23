<?php

namespace App\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demographic extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'gender',
        'email_address_id',
        'address_id',
        'phone_id',
        'cellphone_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'email_address_id',
        'address_id',
        'phone_id',
        'cellphone_id',
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
            'birthdate' => 'datetime',
        ];
    }

    /**
     * Email address relationship to model
     *
     * @return HasOne
     */
    public function emailAddress(): HasOne
    {
        return $this->hasOne(EmailAddress::class, 'id', 'email_address_id')
            ->withDefault();
    }

    /**
     * Address relationship to model
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id')
            ->withDefault();
    }

    /**
     * Phone relationship to model
     *
     * @return HasOne
     */
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'phone_id')
            ->withDefault();
    }

    /**
     * Cellphone relationship to model
     *
     * @return HasOne
     */
    public function cellphone(): HasOne
    {
        return $this->hasOne(Phone::class, 'id', 'cellphone_id')
            ->withDefault();
    }
}
