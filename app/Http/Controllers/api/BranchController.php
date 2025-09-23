<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Services\BranchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BranchController extends Controller
{

    public function __construct(protected BranchService $branchService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = $this->branchService->all(request()->all(), []);

        return $this->res(BranchResource::collection($branches));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request)
    {
        Gate::authorize('create', Branch::class);

        $data = $request->validated();

        $branch = $this->branchService->createBranch($data);

        return $this->res(BranchResource::make($branch));
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        Gate::authorize('view', $branch);

        return $this->res(BranchResource::make($branch));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        Gate::authorize('update', $branch);

        $data = $request->validated();

        $this->branchService->updateBranch($branch, $data);

        return $this->res(BranchResource::make($branch));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        Gate::authorize('delete', $branch);
        $this->branchService->deleteBranch($branch);
        return $this->res();
    }
}
