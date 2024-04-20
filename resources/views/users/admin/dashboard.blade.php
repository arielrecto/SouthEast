<x-dashboard.admin.base>

    <div class="grid grid-cols-3 h-34 grid-flow-row w-full gap-5 capitalize">

        <div class="w-full h-full bg-white rounded-lg shadow-md shadow-secondary flex gap-2 p-5">
            <img src="{{ asset('sticker/multiple-user.png') }}" alt="" srcset=""
                class="object-cover w-1/3 h-full">
                <div class="flex flex-col gap-2 justify-between w-full">
                    <h1 class="text-2xl font-bold text-accent">
                        Users
                    </h1>
                    <p class="text-5xl text-accent font-bold text-ellipsis overflow-hidden flex justify-start">
                       {{$total_users}}
                    </p>
                </div>
        </div>
        <div class="w-full h-full bg-white rounded-lg shadow-md shadow-secondary flex gap-2 p-5">
            <img src="{{ asset('sticker/presentation.png') }}" alt="" srcset=""
                class="object-cover w-1/3 h-full">
                <div class="flex flex-col gap-2 justify-between w-full">
                    <h1 class="text-2xl font-bold text-accent">
                        classrooms
                    </h1>
                    <p class="text-5xl text-accent font-bold text-ellipsis overflow-hidden flex justify-start">
                        {{$total_classrooms}}
                    </p>
                </div>
        </div>
        <div class="w-full h-full bg-white rounded-lg shadow-md shadow-secondary flex gap-2 p-5">
            <img src="{{ asset('sticker/elearning.png') }}" alt="" srcset=""
                class="object-cover w-1/3 h-full">
                <div class="flex flex-col gap-2 justify-between w-full">
                    <h1 class="text-2xl font-bold text-accent">
                        Students
                    </h1>
                    <p class="text-5xl text-accent font-bold text-ellipsis overflow-hidden flex justify-start">
                        {{$total_students}}
                    </p>
                </div>
        </div>
    </div>

    <div class="panel">
        <x-dashboard.line-chart/>
    </div>
</x-dashboard.admin.base>
