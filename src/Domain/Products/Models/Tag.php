<?php

namespace Domain\Products\Models;

use App\Models\IdeHelperTag;
use Domain\Products\Models\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTag
 */
class Tag extends Model
{
    use HasFactory;

    protected static function newFactory(): TagFactory
    {
        return new TagFactory();
    }
}
