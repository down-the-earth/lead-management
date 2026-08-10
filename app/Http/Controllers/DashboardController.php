<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Lead::query();

        // Members can only see their assigned leads
        if ($user->role === 'member') {
            $query->where('assigned_to', $user->id);
        }

        $totalLeads = (clone $query)->count();

        $newLeads = (clone $query)
            ->where('status', 'new')
            ->count();

        $qualifiedLeads = (clone $query)
            ->where('status', 'qualified')
            ->count();

        $wonLeads = (clone $query)
            ->where('status', 'won')
            ->count();

        $lostLeads = (clone $query)
            ->where('status', 'lost')
            ->count();

        $recentLeads = (clone $query)
            ->with('assignedUser')
            ->latest()
            ->take(5)
            ->get();

        $members = $user->role === 'admin'
            ? User::where('role', 'member')->count()
            : null;

        return view('dashboard.index', compact(
            'totalLeads',
            'newLeads',
            'qualifiedLeads',
            'wonLeads',
            'lostLeads',
            'recentLeads',
            'members'
        ));
    }
}
