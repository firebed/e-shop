<?php

namespace Eshop\Models\Invoice;

use Eshop\Database\Factories\Invoice\InvoiceFactory;
use Eshop\Models\Location\Address;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Invoice
 * @package App\Models\Invoice
 *
 * @property Address billingAddress
 *
 * @mixin Builder
 */
class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function billable(): MorphTo
    {
        return $this->morphTo();
    }

    public function billingAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function delete(): bool
    {
        return $this->billingAddress()->delete() && parent::delete();
    }

    protected static function newFactory(): InvoiceFactory
    {
        return InvoiceFactory::new();
    }
}
