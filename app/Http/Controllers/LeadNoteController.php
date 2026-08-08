<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadNoteController extends Controller
{
    public function store(Request $request, Lead $lead)
{
    $request->validate([
        'note'=>'required'
    ]);

    $lead->notes()->create([

        'user_id'=>auth()->id(),

        'note'=>$request->note

    ]);

    return back();
}
}
