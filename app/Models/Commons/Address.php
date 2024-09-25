<?php

namespace App\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'demographics_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'street_extended',
        'city',
        'state',
        'postal_code',
        'country_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'formatted',
    ];

    /**
     * Return the model complete name.
     */
    protected function formatted(): Attribute
    {
        if(!empty($this->street) && !empty($this->city) && !empty($this->state) && !empty($this->postal_code)) {
            return new Attribute(
                get: fn() => $this->street .
                    ((!empty($this->street_extended)) ? ' | ' . $this->street_extended : null) . '<br />' .
                    $this->city . '<br />' . $this->state . ', ' . $this->postal_code,
            );
        }
        return new Attribute(get: fn () => '&nbsp;<br />&nbsp;<br />&nbsp;');
    }
}
