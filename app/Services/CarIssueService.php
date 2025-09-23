<?php

namespace App\Services;

use App\Enums\CarIssuePriorityEnum;
use App\Enums\CarIssueStatusEnum;
use App\Models\Car;
use App\Models\CarIssue;


class CarIssueService
{

      public function __construct(protected HelperService $helperService)
      {
      }

      public function indexIssues(Car $car, $data = [], $paginated = true, $withes = [])
      {

            $issues = CarIssue::where('car_id', $car->id);
            $issues = $this->helperService->addQueryEqualParamter($issues, $data, 'title');
            $issues = $this->helperService->addQueryEqualParamter($issues, $data, 'priority', enumClass: CarIssuePriorityEnum::class);
            $issues = $this->helperService->addQueryEqualParamter($issues, $data, 'state', enumClass: CarIssueStatusEnum::class);
            $issues = $issues->latest()->with($withes);
            if ($paginated) {
                  return $issues->paginate();
            } else {
                  return $issues->get();
            }

      }
      public function createCarIssue($data)
      {
            $carIssue = CarIssue::create($data);

            return $carIssue;
      }
      public function update($carIssue, $data)
      {
            $carIssue->update($data);
      }

}