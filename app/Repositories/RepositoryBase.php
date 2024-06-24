<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RepositoryBase {
    protected static string $modelClass;

    public static function getById(int $id) : Model|null {
        try {
            return static::$modelClass::where(['id' => $id])->firstOrFail();
        } catch(ModelNotFoundException $ex) {
            return null;
        }
    }

    public static function getByLogicalName(string $logicalName) : Model|null {
        try {
            return static::$modelClass::where(['logical_name' => $logicalName])->firstOrFail();
        } catch(ModelNotFoundException $ex) {
            return null;
        }
    }

    public static function getCount() : int|null {
        $result = static::$modelClass::whereRaw('id > 0');

        return $result->count();
    }

    public static function getAll(string $sorting = null, bool $asArray = false, string|null $nameSearch = null) : Collection|array|null {
        $result = static::$modelClass::whereRaw('id > 0');

        if(! is_null($nameSearch)) {
            $result = $result->where('name', 'like', '%' . $nameSearch . '%')->orWhere('description', 'like', '%' . $nameSearch . '%');
        }

        if(! is_null($sorting)) {
            $result = $result->orderBy($sorting);
        }

        if($asArray) {
            return $result->get()->toArray();
        } else {
            return $result->get();
        }
    }

    public static function getFilteredItems(array $filters, string $sorting = null) : Collection|null {
        $result = static::$modelClass::where($filters);

        if(! is_null($sorting)) {
            $result = $result->orderBy($sorting);
        }

        return $result->get();
    }
}
