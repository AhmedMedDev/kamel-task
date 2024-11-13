<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @return Model[]
     */
    public function get(): array;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model|array;

    /**
     * @param array $data
     * @param Model $model
     * @return bool
     */
    public function update(array $data, Model $model): bool;

    /**
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): bool;
}
