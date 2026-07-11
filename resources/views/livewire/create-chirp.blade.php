{{-- <div>
    <!-- نموذج إضافة التغريدة (تم تحويله لـ Livewire) -->
    <div class="card bg-base-100 shadow mt-8">
        <div class="card-body">
            <form wire:submit="store">
                <div class="form-control w-full">
                    <textarea
                        wire:model="message"
                        placeholder="What's on your mind?"
                        class="textarea textarea-bordered w-full resize-none"
                        rows="4"
                        maxlength="255"
                        required></textarea>

                    @error('message')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Chirp
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- قائمة التغريدات -->
    <div class="space-y-4 mt-8">
        @forelse ($chirps as $chirp)
            <!-- نستدعي المكون الذي صنعته سابقاً لعرض التغريدة -->
            <x-chirp :chirp="$chirp" />
        @empty
            <!-- نستدعي مكون حالة الفراغ -->
            <x-empty-state message="No chirps yet. Be the first to chirp!" />
        @endforelse

        <!-- أزرار التقليب ستعمل الآن بدون إعادة تحميل الصفحة -->
        <div class="mt-5">
            {{ $chirps->links() }}
        </div>
    </div>
</div>

 --}}
<div>
    <h1>مرحباً، أنا المكون الذي يعمل!</h1>
</div>
