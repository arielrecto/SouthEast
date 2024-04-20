<x-app-layout>
    <x-landing-page.navbar />

    <div class="h-screen w-full flex justify-center items-center">
        <div class="bg-white rounded-lg flex flex-col shadow-lg shadow-accent w-2/6 p-5">
            {{$slot}}
        </div>
    </div>
</x-app-layout>
