<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
class HelperService
{
      public function addQueryEqualParamter(Builder $oquery, array $data, string $param = '', string $dataName = null, string $dbName = null)
      {
            $dataName = $dataName ?: $param;
            $dbName = $dbName ?: $param;
            return $oquery->when(isset($data[$dataName]), function ($query) use ($data, $dataName, $dbName) {
                  if (is_array($data[$dataName])) {
                        return $query->whereIn($dbName, $data[$dataName]);
                  } else {
                        return $query->where($dbName, '=', $data[$dataName]);
                  }

            });
      }
      public function addQueryMinMaxParamter(Builder $oquery, array $data, string $param, string $dataName = null, string $dbName = null)
      {
            $dataName = $dataName ?: $param;
            $dbName = $dbName ?: $param;
            return $oquery->when(isset($data["{$dataName}Min"]), function ($query) use ($data, $dataName, $dbName) {
                  return $query->where($dbName, '>=', $data["{$dataName}Min"]);
            })->when(isset($data["{$dataName}Max"]), function ($query) use ($data, $dataName, $dbName) {
                  return $query->where($dbName, '<=', $data["{$dataName}Max"]);
            });
      }
}