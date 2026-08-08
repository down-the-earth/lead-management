<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class PublicLeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        Lead::create([$request->validated(),
            'email' => $request->email,
            'phone' =>$request->phone,
            'comapany' => $request->company,
            'budget' => $request->budget,
            'status' => $request->status,
            'source' => $request->source
        ]);

        return back()->with('success', 'Thank you!');
    }
    public function create()
    {
        return view('public.contact');
    }
}
