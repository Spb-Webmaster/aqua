<?php
namespace Domain\Info\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class InfoQueryBuilder extends Builder
{
    public function get_infos()
    {
        return $this->where('published', 1);

    }
}

