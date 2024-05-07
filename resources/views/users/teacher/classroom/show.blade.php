<x-dashboard.teacher.base>

    <x-dashboard.page-title :title="_('Classrooms - show')" />

    <div class="panel flex flex-col gap-5 min-h-96">
        <div class="w-ful h-32 flex items-center justify-center bg-accent rounded-lg">
            <h1 class="text-2xl font-bold text-white capitalize">
                {{ $classroom->subject->name }}
            </h1>
        </div>
        <div class="flex items-center justify-between">
            <h1 class="flex items-center gap-2 py-2 font-bold">
                <span>Code: </span>
                <span>{{ $classroom->class_code }}</span>
            </h1>
            <h1 class="flex items-center gap-2 py-2 capitalize text-xs">
                <span>created Date: </span>
                <span>{{ date('F d, Y h:s A', strtotime($classroom->created_at)) }}</span>
            </h1>
        </div>

        <div class="grid grid-cols-2 grid-flow-row gap-5 h-32">
            <div class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">
                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-chalkboard"></i>
                    </span>
                    <span>
                        Students
                    </span>
                </h1>
                <p class="flex text-3xl font-bold text-accent text-center">
                    1
                </p>
            </div>
            <div class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">

                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-chalkboard"></i>
                    </span>
                    <span>
                        Announcements
                    </span>
                </h1>
                <p class="flex text-3xl font-bold text-accent text-center">
                    2
                </p>
            </div>
        </div>
        <div class="flex gap-2 justify-between">
            <div class="h-full w-1/2 flex flex-col gap-2">
                <div class="flex flex-items justify-between">
                    <h1 class="text-lg text-accent font-bold">
                        Attendance
                    </h1>
                    <a href="http://" class="btn btn-xs btn-accent">
                        QR Code
                    </a>
                </div>

                <div class="w-full h-full flex justify-center items-center">
                    {!! QrCode::size(300)->generate($classroom->class_code) !!}
                </div>

            </div>
            <div class="w-1/2 h-auto flex flex-col gap-2" x-data="calendarInit">
                <div x-ref="calendar" class="h-fulls w-full">

                </div>
            </div>
        </div>


        <div class="overflow-x-auto">
            <h1 class="text-lg py-5 text-accent font-bold">Students</h1>
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="bg-accent text-white">
                        <th></th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->

                    @forelse ($classroom->classroomStudents as $classroomStudent)
                    <tr>
                        <th></th>
                        <td>$clas</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                    </tr>
                    @empty
                    <tr>
                        <th>No Students</th>

                    </tr>
                    @endforelse
                    {{-- <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard.teacher.base>
