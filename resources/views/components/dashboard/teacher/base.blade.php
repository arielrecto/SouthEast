@php
    $links = [
        [
            'url' => 'teacher.dashboard',
            'name' => 'dashboard',
            'icon' => '<i class="fi fi-rr-dashboard"></i>',
        ],
        [
            'url' => 'teacher.classrooms.index',
            'name' => 'classrooms',
            'icon' => '<i class="fi fi-rr-users-alt"></i>',
        ],
    ];

    $user = Auth::user();

    $profile =  $user->profile !== null ? route('teacher.profile.show', ['profile' => $user->profile->id]) : null;
@endphp


<x-app-layout>
    <div class="h-full w-full flex justify-center">
        <div class="w-5/6 min-h-screen flex">
            <x-dashboard.sidebar :links="$links"/>
            <div class="w-full h-full flex flex-col gap-2">
                <x-dashboard.navbar :profile_url="$profile"/>

                <div class="main p-5">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
