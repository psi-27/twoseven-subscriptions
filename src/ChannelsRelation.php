<?php

namespace TwoSeven;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class ChannelsRelation extends Relation
{

    public function addConstraints()
    {
    }

    public function addEagerConstraints(array $models)
    {
    }

    public function getResults()
    {
        return $this->query->get()->keyBy('id');
    }

    public function initRelation(array $models, $relation)
    {
    }

    public function match(array $models, Collection $results, $relation)
    {
    }
}
