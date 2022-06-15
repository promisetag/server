<?php

namespace Domain\Products\Models;

use App\Models\IdeHelperProductPreset;
use Domain\Products\Models\Factories\ProductPresetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperProductPreset
 */
class ProductPreset extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function newFactory(): ProductPresetFactory
    {
        return new ProductPresetFactory();
    }
}
