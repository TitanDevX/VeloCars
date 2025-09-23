<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
class HelperService
{
      public function addQueryEqualParamter(Builder $oquery, array $data, string $param = '', string $dataName = null, string $dbName = null, $enumClass = null)
      {
            $dataName = $dataName ?: $param;
            $dbName = $dbName ?: $param;
            return $oquery->when(isset($data[$dataName]), function ($query) use ($data, $dataName, $dbName, $enumClass) {
                  
                  if (is_array($data[$dataName])) {
                        if($enumClass != null){
                              $enums = [];
                              foreach($data[$dataName] as $val){
                                    $enum = $enumClass::fromName(strtoupper($val));
                                    if($enum){
                                    $enums[] = $enum->value;
                                    }
                                    
                              }
                              return $query->whereIn($dbName, $enums);
                        }
                        return $query->whereIn($dbName, $data[$dataName]);
                  } else {
                        if($enumClass != null){
                              $enum = $enumClass::fromName(strtoupper($data[$dataName]));
                              if(!$enum){
                                    return $query;
                              }else{
                                    return $query->where($dbName, $enum->value);
                              }
                        }
                        return $query->where($dbName, $data[$dataName]);
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