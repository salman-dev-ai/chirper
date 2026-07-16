<?php

namespace App\Livewire;

use App\Models\Chirp;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class ChirpFeed extends Component
{
    // تفعيل التقليب بين الصفحات بدون إعادة تحميل
    use WithPagination;

    // تعريف الحقل مع قواعد التحقق مباشرة فوقه (Clean Code)
    #[Validate('required|string|max:255')]
    public string $message = '';

    public function store()
    {
        // 1. التحقق سيتم تلقائياً بناءً على الـ Attribute بالأعلى
        $this->validate();

        // 2. الحفظ في قاعدة البيانات
        Chirp::create([
            'message' => $this->message,
            'user_id' => null,  // مؤقتاً حتى نضيف تسجيل الدخول
        ]);

        // 3. تفريغ الحقل بعد الإرسال
        $this->reset('message');

        // 4. إعادة توجيه المستخدم للصفحة الأولى ليرى تغريدته الجديدة
        $this->resetPage();
    }

    public function render()
    {
        // جلب التغريدات مع التقليب (10 في كل صفحة مثلاً)
        $chirps = Chirp::latest()->paginate(10);

        return view('livewire.chirp-feed', [
            'chirps' => $chirps,
        ]);
    }
}
