<?php

namespace App\Http\Controllers;

use App\Enums\ProjectType;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RealisationController extends Controller
{
    public function index(Request $request): View
    {
        $selectedType = ProjectType::tryFrom((string) $request->query('type'));

        $realisations = Realisation::published()
            ->when($selectedType, fn ($query) => $query->where('type', $selectedType))
            ->latest('completed_at')
            ->paginate(9)
            ->withQueryString();

        return view('realisations.index', [
            'realisations' => $realisations,
            'types' => ProjectType::cases(),
            'selectedType' => $selectedType,
        ]);
    }

    public function show(Realisation $realisation): View
    {
        abort_unless($realisation->is_published, 404);

        return view('realisations.show', [
            'realisation' => $realisation,
            'relatedRealisations' => Realisation::published()
                ->where('type', $realisation->type)
                ->whereKeyNot($realisation->getKey())
                ->latest('completed_at')
                ->take(3)
                ->get(),
        ]);
    }
}
