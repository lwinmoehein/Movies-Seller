<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyOrderStatus extends Model
{
    //
    public const ORDERED = 'ORDERED';
    public const PURCHASE_CONFIRMED = 'PURCHASE_CONFIRMED';
}
