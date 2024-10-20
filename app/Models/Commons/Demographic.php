<?php

namespace App\Models\Commons;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'about_me',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'complete_name',
        'age',
    ];

    /**
     * Return the model complete name.
     */
    protected function completeName(): Attribute
    {
        if (!empty($this->last_name) && !empty($this->first_name)) {
            return new Attribute(
                get: fn(
                ) => $this->last_name.', '.$this->first_name.((!empty($this->middle_name)) ? ' '.Str::substr($this->middle_name,
                            0, 1).'.' : null),
            );
        }
        return new Attribute(get: fn() => null);
    }

    /**
     * Return the model age.
     */
    protected function age(): Attribute
    {
        if (!empty($this->birthdate)) {
            return new Attribute(
                get: fn() => Carbon::parse($this->birthdate)->age,
            );
        }
        return new Attribute(get: fn() => null);
    }

    /**
     * Return the model birthdate attribute for db storage.
     */
    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // If value exists, parse and format the birthdate
                return $value ? Carbon::parse($value)->format(config('carevise.formats.date')) : null;
            },
            set: function ($value) {
                // If value is not null, parse and format it for the DB, otherwise return null
                return $value ? Carbon::parse($value)->format(config('carevise.formats.db_datetime')) : null;
            }
        );
    }

    /**
     * Email address relationship to model
     *
     * @return HasOne
     */
    public function email_address(): HasOne
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
