<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarIssueRequest;
use App\Http\Requests\UpdateCarIssueRequest;
use App\Http\Resources\CarIssueResource;
use App\Models\Car;
use App\Models\CarIssue;
use App\Services\CarIssueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarIssueController extends Controller
{

    public function __construct(protected CarIssueService $carIssueService){}
    /**
     * Display a listing of the resource.
     */
    public function index(Car $car)
    {
        Gate::authorize('viewAny', CarIssue::class);
        $issues = $this->carIssueService->indexIssues($car, request()->all(),false,['fixer']);
    
        return $this->collectionResourceResponse($issues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarIssueRequest $request, Car $car)
    {
         Gate::authorize( 'create', CarIssue::class);
        $data = $request->validated();
        $data['car_id'] = $car->id;
        $is = $this->carIssueService->createCarIssue($data);

        return $this->singleResourceResponse($is);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarIssueRequest $request, CarIssue $carIssue)
    {
         Gate::authorize( 'update', $carIssue);
        $data = $request->validated();
        $this->carIssueService->update($carIssue, $data);
        return $this->singleResourceResponse($carIssue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarIssue $carIssue)
    {
          Gate::authorize( 'delete', $carIssue);
        $carIssue->delete();
        return $this->success();
    }
}
