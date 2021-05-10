<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyItemStatus extends Model
{
    //
    public const ADDED_TO_LIST = 'ADDED_TO_LIST';
    public const CONFIRMED_ORDER = 'CONFIRMED_ORDER';
    public const CONFIRMED_PURCHASE = 'CONFIRMED_PURCHASE';
}
