<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use function Pest\Laravel\instance;

class CarService
{
      public function all($data = [], $withes = [], $paginated = true)
      {

            $cars = Car::query();
            $cars = $this->addQueryEqualParamter($cars, $data, 'make');
            $cars = $this->addQueryEqualParamter($cars, $data, 'model');
            $cars = $this->addQueryEqualParamter($cars, $data, 'used');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'year');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'price');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'mileage');
            $cars = $this->addQueryEqualParamter($cars, $data, 'type');
            $cars = $this->addQueryEqualParamter($cars, $data, dataName: 'rent', dbName: 'available_for_rent');
            $cars = $this->addQueryEqualParamter($cars, $data, 'color');

            $cars = $cars->with($withes)->latest();
            if ($paginated) {
                  return $cars->paginate();
            } else {
                  return $cars->get();
            }

      }
      private function addQueryEqualParamter(Builder $oquery, array $data, string $param = '', string $dataName = null, string $dbName = null)
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
      private function addQueryMinMaxParamter(Builder $oquery, array $data, string $param)
      {
            return $oquery->when(isset($data["{$param}Min"]), function ($query) use ($data, $param) {
                  return $query->where($param, '>=', $data["{$param}Min"]);
            })->when(isset($data["{$param}Max"]), function ($query) use ($data, $param) {
                  return $query->where($param, '<=', $data["{$param}Max"]);
            });
      }
}