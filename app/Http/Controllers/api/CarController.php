<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\User;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class CarController extends Controller
{

    public function __construct(protected CarService $carService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $cars = $this->carService->all(request()->all(), ['details', 'soldTo']);

        return $this->res(CarResource::collection($cars));
    }
    public function search()
    {
        $cars = $this->carService->all(request()->all(), ['details', 'soldTo']);

        return $this->res(CarResource::collection($cars));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        Gate::authorize('create', Car::class);
        $data = $request->validated();

        $car = $this->carService->createCar($data);

        return $this->res(CarResource::make($car));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $car = $this->carService->getCar($id);
         Gate::authorize('view', $car);
        return $this->res(CarResource::make($car));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();

         Gate::authorize('update', $car);
        $this->carService->updateCar($car,$data);
        return $this->res(CarResource::make($car));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $car = $this->carService->getCar($id);
          Gate::authorize('delete', $car);
         if(!$car){
            return $this->res([],'Car not found',404,false);
         }
         $this->carService->deleteCar($car);
         return $this->res();
    }
}
