<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function index(Workspace $workspace): Response
    {
        $summary = $workspace->summary;
        $historyOfEmotions = $workspace->historyOfEmotions()->orderBy('created_at', 'desc')->take(10)->get();
        
        return Inertia::render('Workspace/Index', [
            'workspace' => $workspace,
            'summary' => $summary,
            'historyOfEmotions' => $historyOfEmotions,
        ]);
    }
}
