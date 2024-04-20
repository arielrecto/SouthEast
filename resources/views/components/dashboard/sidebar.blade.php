@props([
    'links' => []
])
<div class="w-1/6 flex flex-col gap-2 h-full py-5 px-4">
    <div class="flex justify-center">
        <div class="w-auto h-auto flex flex-col items-center gap-2">
            <img src="{{ asset('logo-modified.png') }}" alt="" class="h-24 w-24 object-cover">
            <h1 class="text-center font-semibold text-accent">

                South East-Asia

                Institute of Trade and Technology


            </h1>
        </div>

    </div>
    <div class="flex flex-col gap-2 justify-between h-full">
        <ul class="w-full h-full flex flex-col gap-5 p-5 text-accent capitalize">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['url'] === '#' ? '#' : route($link['url']) }}"
                    class="flex items-center gap-2 {{ Route::is($link['url']) ? 'font-bold bg-accent px-4 py-2 rounded-lg text-primary' : '' }}">
                        {!! $link['icon'] !!}
                        <span>
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
