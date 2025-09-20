<?php

namespace App\Services;

use App\Models\Branch;


class BranchService
{


      public function __construct(protected HelperService $helperService)
      {
      }

      public function all($data, $withes, $paginated = true)
      {


            $branches = Branch::query();

            $branches = $this->helperService->addQueryEqualParamter($branches, $data, 'state');
            $branches = $this->helperService->addQueryEqualParamter($branches, $data, 'city');
            $branches = $this->helperService->addQueryEqualParamter($branches, $data, 'street');
            $branches = $this->helperService->addQueryEqualParamter($branches, $data, 'address');
            $branches = $branches->latest()->with($withes);

            if (isset($data['withCars'])) {
                  $branches = $branches->with('cars');
            }

            if ($paginated) {
                  return $branches->paginate()->all();
            } else {
                  return $branches->get();
            }

      }
      public function createBranch($data)
      {

            $branch = Branch::create($data);

            //TODO do notifications of NEW_BRANCH.
            return $branch;

      }
      public function updateBranch($branch, $data)
      {

            $branch->update($data);
            return $branch;

      }

      public function deleteBranch($branch)
      {
            $branch->delete();
      }

}