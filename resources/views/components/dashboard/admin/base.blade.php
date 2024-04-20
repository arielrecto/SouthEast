@php
    $links = [
        [
            'url' => 'admin.dashboard',
            'name' => 'dashboard',
            'icon' => '<i class="fi fi-rr-dashboard"></i>',
        ],
        [
            'url' => 'admin.users.index',
            'name' => 'users',
            'icon' => '<i class="fi fi-rr-users-alt"></i>',
        ],
        [
            'url' => 'admin.strands.index',
            'name' => 'strands',
            'icon' => '<i class="fi fi-rr-e-learning"></i>',
        ],
        [
            'url' => 'admin.subjects.index',
            'name' => 'subjects',
            'icon' => '<i class="fi fi-rr-books"></i>',
        ],
    ];
@endphp


<x-app-layout>
    <div class="h-full w-full flex justify-center">
        <div class="w-5/6 min-h-screen flex">
            <x-dashboard.sidebar :links="$links"/>
            <div class="w-full h-full flex flex-col gap-2">
                <x-dashboard.navbar/>

                <div class="main p-5">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
