<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vat
 * @package App\Models\Product
 *
 * @property integer id
 * @property string  name
 * @property double  regime
 *
 * @mixin Builder
 */
class Vat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['regime' => 'float'];

    public static function standard(): Vat
    {
        return self::firstWhere('name', 'standard');
    }
}
