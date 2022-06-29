<?php

namespace Domain\Products\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends Builder
{

    public function active(): self
    {
        return $this->where('active', true);
    }

    public function selectAttributesForProductPage(): self
    {
        return $this->select('id')
            ->addSelect('title')
            ->addSelect('description')
            ->addSelect('background_color')
            ->addSelect('tag_quantity')
            ->addSelect('storage_space_quantity')
            ->addSelect('storage_space_unit');
    }
}
