<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    // git data
    public function index()
    {

        $chirps = Chirp::with('user')
            ->latest()
            // ->take(10)->get();
            ->paginate(10);

        return view("home", ["chirps" => $chirps]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Use the authenticated user
        auth()->user->chirps()->create($validated);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    public function edit(Chirp $chirp)
    {
        Gate::authorize('update', $chirp);
        return view('chirps.edit', compact('chirp'));
    }



    public function update(Request $request, Chirp $chirp)
    {

        Gate::authorize('update', $chirp);
        $validated = $request->validate(
            [
                'message' => 'required|string|max:255',
            ],
            [
                'message.required' => 'Please write something to chirp!',
                'message.max' => 'Chirps must be 255 characters or less.',
            ]
        );


        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp)
    {
        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
