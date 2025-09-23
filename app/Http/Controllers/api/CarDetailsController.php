<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarDetailRequest;
use App\Http\Requests\UpdateCarDetailRequest;
use App\Http\Resources\CarDetailsResource;
use App\Models\Car;
use App\Models\CarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarDetailsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarDetailRequest $request, Car $car)
    {
        Gate::authorize('create', CarDetail::class);
        $car->loadMissing('details');
        if ($car->details()->exists()) {
            return $this->res([], 'error', 400, false, ['This car already has details set, update it instead.'], 'ALREADY_HAS');
        }

        $data = $request->validated();

        array_merge($data, ['car_id' => $car->id]);
        $d = CarDetail::create($data);

        return $this->res(CarDetailsResource::make($d));
    }

    public function show(Car $car)
    {
         Gate::authorize('view', CarDetail::class);
        
        $details = $car->details;
        if (!$details) {
            return $this->res();
        }
        return $this->res(CarDetailsResource::make($details));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarDetailRequest $request, Car $car)
    {
         Gate::authorize('update', CarDetail::class);
        
        $car->loadMissing('details');
        $data = $request->validated();
        if (!$car->details()->exists()) {
            return $this->res([], 'error', 400, false, ['This car does have details set, create it instead.'], 'NO_DETAILS_SET');
        }
        $d = $car->details;
        $d->update($data);
        return $this->res(CarDetailsResource::make($d));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
         Gate::authorize('delete', CarDetail::class);
        
        $car->loadMissing('details');
        if (!$car->details()->exists()) {
            return $this->res();
        }
        $car->details->delete();
        return $this->res();
    }
}
