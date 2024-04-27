<div id="commentsSection"
    class="sm:p-4 p-2.5 border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
    <div class="flex items-start gap-3 relative">
        <a href="{{ route('profile', $commentaire->user->id) }}">
            @if ($commentaire->user->image)
                <img src="{{ asset('images/' . $commentaire->user->image) }}" alt=""
                    class="w-9 h-9 rounded-full">
            @else
                <img src="{{ asset('images/user.jpg') }}" alt=""
                    class="w-9 h-9 rounded-full">
            @endif
        </a>
        <div class="flex-1">
            <a href="{{ route('profile', $commentaire->user->id) }}"
                class="text-black font-medium inline-block dark:text-white">
                {{ $commentaire->user->name }}
            </a>
            <p class="mt-0.5">{{ $commentaire->contenu }}</p>
        </div>
    </div>
</div>
