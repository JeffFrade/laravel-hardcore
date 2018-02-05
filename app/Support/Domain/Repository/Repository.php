<?php

namespace Confee\Support\Domain\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $modelClass;

    /**
     * @return Builder
     */
    public function newQuery()
    {
        return app()->make($this->modelClass)->newQuery();
    }

    public function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (!$query) {
            $query = $this->newQuery();
        }

        if ($paginate) {
            return $query->paginate($take);
        }

        if ($take) {
            return $query->take($take)->get();
        }

        return $query->get();
    }

    public function getAll($limit = 15, $paginate = true)
    {
        return $this->doQuery(null, $limit, $paginate);
    }

    public function delete(Model $model)
    {
        $model->delete();

        return $model;
    }

    public function deleteCollection(Collection $collection)
    {
        $collection->each(function (Model $model) {
            $this->delete($model);
        });
    }

    public function factory(array $data = [])
    {
        $model = $this->newQuery()->getModel()->newInstance();

        $this->fillModel($model, $data);

        return $model;
    }

    protected function fillModel(Model $model, array $data = [])
    {
        $model->fill($data);
    }

    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    public function create(array $data = [])
    {
        $model = $this->factory($data);

        return $this->save($model);
    }

    public function update(Model $model, array $data = [])
    {
        $this->fillModel($model, $data);

        return $this->save($model);
    }
}
