<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    // git data
    public function index()
    {

        $chirps = Chirp::with('user')
            ->latest()
            ->take(10)->get();

        return view("home", ["chirps" => $chirps]);
    }

    public function  store(Request $request)
    {
        $validated = $request->validate(
            [
                'message' => 'required|string|max:255',
            ],
            [
                'message.required' => 'Please write something to chirp!',
                'message.max' => 'Chirps must be 255 characters or less.',
            ]
        );

        \App\Models\Chirp::create([
            'message' => $validated['message'],
            'user_id' => null,
        ]);

        return redirect('/')->with('success', 'Chirp created!');
    }

    public function edit(Chirp $chirp){
        return view('chirps.edit',compact('chirp'));
    }

    public function update(Request $request ,Chirp $chirp){
        $validated =$request->validate(
            [
                'message' => 'required|string|max:255',
            ],
            [
                'message.required' => 'Please write something to chirp!',
                'message.max' => 'Chirps must be 255 characters or less.',
            ]
        );

        // Update the chirp with the validated data
        $chirp->update($validated);

        return redirect ('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp){
        $chirp->delete();

        return redirect('/')->with('success','Chirp deleted!');
    }

}
