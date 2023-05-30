<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\AwardRequest;
use App\Repositories\AwardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwardsController extends Controller
{

    private $awardRepository;

    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
    }

    public function index()
    {
        $awards = $this->awardRepository->all();
        return view('awards.index', [
            'awards' => json_encode($awards)
        ]);
    }

    public function store(AwardRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->awardRepository->store($request->validated());
            });
            return redirect()->route('award.index')->with('success', 'Award created successfully');
        } catch (\Exception $e) {
            return redirect()->route('award.index')->with('error', 'An error occurred');
        }
    }
}
