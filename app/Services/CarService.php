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
      public function __construct(protected UserNotificationSubscriptionService $userNotificationSubscriptionService,
      protected HelperService $helperService)
      {

      }
      public function all($data = [], $withes = [], $paginated = true)
      {

            $cars = Car::query();
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'branch_id');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'make');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'model');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'used');
            $cars = $this->helperService->addQueryMinMaxParamter($cars, $data, 'year');
            $cars = $this->helperService->addQueryMinMaxParamter($cars, $data, 'buy_price', dataName: 'price');
            $cars = $this->helperService->addQueryMinMaxParamter($cars, $data, 'mileage');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'type');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, dataName: 'rent', dbName: 'for_rent');
            $cars = $this->helperService->addQueryEqualParamter($cars, $data, 'color');

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
    
}