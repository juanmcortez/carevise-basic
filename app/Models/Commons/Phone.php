<?php

namespace App\Models\Commons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'demographics_phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_code',
        'area_code',
        'prefix_number',
        'line_number',
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
        if(!empty($this->country_code) && !empty($this->area_code) && !empty($this->prefix_number) && !empty($this->line_number)) {
            return new Attribute(
                get: fn() => $this->country_code . ' (' . $this->area_code  . ') ' . $this->prefix_number . '-' . $this->line_number,
            );
        }
        return new Attribute(get: fn () => null);
    }
}
