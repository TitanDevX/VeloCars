<?php

namespace App\Services;

use App\Enums\UserNotifSubEnum;
use App\Models\Car;
use App\Models\User;
use App\Notifications\CarListNotification;
use Illuminate\Database\Eloquent\Builder;
use function Pest\Laravel\instance;

class CarService
{
      public function __construct(protected UserNotificationSubscriptionService $userNotificationSubscriptionService)
      {

      }
      public function all($data = [], $withes = [], $paginated = true)
      {

            $cars = Car::query();
            $cars = $this->addQueryEqualParamter($cars, $data, 'make');
            $cars = $this->addQueryEqualParamter($cars, $data, 'model');
            $cars = $this->addQueryEqualParamter($cars, $data, 'used');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'year');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'buy_price', dataName: 'price');
            $cars = $this->addQueryMinMaxParamter($cars, $data, 'mileage');
            $cars = $this->addQueryEqualParamter($cars, $data, 'type');
            $cars = $this->addQueryEqualParamter($cars, $data, dataName: 'rent', dbName: 'for_rent');
            $cars = $this->addQueryEqualParamter($cars, $data, 'color');

            $cars = $cars->with($withes)->latest();
            if ($paginated) {
                  return $cars->paginate();
            } else {
                  return $cars->get();
            }

      }

      public function createCar($data)
      {


            $car = Car::create($data);
            // $type = $car->for_rent ? 
            // $this->userNotificationSubscriptionService->forEachSubscribedUser(UserNotifSubEnum::SELL, function ($k, User $v) use ($car) {

            //       $v->notify(new CarListNotification($car));

            // });

            return $car;
      }

      public function getCar($id)
      {


            $car = Car::find($id);


            return $car;
      }
      public function updateCar(Car $car, $data)
      {


            $car->update($data);


            return $car;
      }
      public function deleteCar(Car $car)
      {


            $car->delete();


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
      private function addQueryMinMaxParamter(Builder $oquery, array $data, string $param, string $dataName = null, string $dbName = null)
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