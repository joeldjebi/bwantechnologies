<?php

namespace App\Http\Controllers;

use App\Enums\ContractType;
use App\Enums\Department;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobOfferController extends Controller
{
    public function index(Request $request): View
    {
        $selectedContractType = ContractType::tryFrom((string) $request->query('contract_type'));
        $selectedDepartment = Department::tryFrom((string) $request->query('department'));

        $jobOffers = JobOffer::active()
            ->when($selectedContractType, fn ($query) => $query->where('contract_type', $selectedContractType))
            ->when($selectedDepartment, fn ($query) => $query->where('department', $selectedDepartment))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('jobs.index', [
            'jobOffers' => $jobOffers,
            'contractTypes' => ContractType::cases(),
            'departments' => Department::cases(),
            'selectedContractType' => $selectedContractType,
            'selectedDepartment' => $selectedDepartment,
        ]);
    }

    public function show(JobOffer $jobOffer): View
    {
        abort_unless($jobOffer->is_active, 404);

        return view('jobs.show', [
            'jobOffer' => $jobOffer,
        ]);
    }
}
