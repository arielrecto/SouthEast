@props([
    'title' => 'sample',
    'back_url' => null,
    'create_url' => null,
])

<div class="flex items-center justify-between w-full py-5">
    <div class="flex items-center gap-5">
        @if ($back_url)
            <a href="{{ $back_url }}" class="btn btn-xs btn-accent">
                <i class="fi fi-rr-arrow-left"></i>
            </a>
        @endif
        <a href="http://"></a>
        <h1 class="text-2xl  capitalize font-bold text-accent">
            {{ $title }}
        </h1>
    </div>

    <div>
        @if ($create_url)
            <a href="{{ $create_url }}" class="btn btn-sm btn-accent">create</a>
        @endif
    </div>

</div>
