<?php

namespace App\Livewire;

use App\Models\Chirp;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class ChirpFeed extends Component
{
    use WithPagination;

    #[Validate('required|string|max:255')]
    public string $message = '';

    public function store()
    {
        $this->validate();

        Chirp::create([
            'message' => $this->message,
            'user_id' => null, // مؤقتاً حتى نضيف تسجيل الدخول
        ]);

        $this->reset('message');
        $this->resetPage();
    }

    public function render()
    {
        $chirps = Chirp::latest()->paginate(10);

        return view('livewire.chirp-feed', [
            'chirps' => $chirps,
        ]);
    }
}
