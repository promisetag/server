<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @mixin IdeHelperCategoryProduct
 */
class CategoryProduct extends Pivot
{
    public $incrementing = true;
}
