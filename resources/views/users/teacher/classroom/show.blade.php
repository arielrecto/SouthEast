<x-dashboard.teacher.base>

    <x-dashboard.page-title :title="_('Classrooms - show')" :back_url="route('teacher.classrooms.index')" />
    <x-notification-message />
    <div class="panel flex flex-col gap-5 min-h-96">
        <div class="w-ful h-32 flex items-center justify-center bg-accent rounded-lg">
            <h1 class="text-2xl font-bold text-white capitalize">
                {{ $classroom->subject->name }}
            </h1>
        </div>
        <div class="w-full flex justify-end">
            <form method="POST" action="{{ route('teacher.classrooms.destroy', ['classroom' => $classroom->id]) }}">
                @csrf
                @method('delete')
                <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
            </form>
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

        <div class="grid grid-cols-4 grid-flow-row gap-5 h-32">
            <a href="{{ route('teacher.classrooms.students', ['classroom' => $classroom->id]) }}"
                class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">
                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-student"></i>
                    </span>
                    <span>
                        Students
                    </span>
                </h1>
                <p class="flex text-3xl font-bold text-accent text-center">
                    {{ count($classroom->classroomStudents) }}
                </p>
            </a>
            <a href="{{ route('teacher.announcements.index', ['classroom_id' => $classroom->id]) }}"
                class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">

                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-megaphone"></i>
                    </span>
                    <span>
                        Announcements / lesson
                    </span>
                </h1>
                <p class="flex text-3xl font-bold text-accent text-center">
                    {{ count($classroom->announcements) }}
                </p>
            </a>
            <a href="{{ route('teacher.tasks.index', ['classroom_id' => $classroom->id]) }}"
                class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">

                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-list-check"></i>
                    </span>
                    <span>
                        Tasks
                    </span>
                </h1>
                <p class="flex text-3xl font-bold text-accent text-center">
                    {{ count($classroom->tasks) }}
                </p>
            </a>
            <a href="{{ route('teacher.grades.index', ['classroom_id' => $classroom->id]) }}"
                class="card-generic bg-white flex flex-col gap-2 justify-between shadow-none border-accent border">

                <h1 class="font-bold flex items-center gap-2">
                    <span class="mt-1">
                        <i class="fi fi-rr-test"></i>
                    </span>
                    <span>
                        Grades
                    </span>
                </h1>
                {{-- <p class="flex text-3xl font-bold text-accent text-center">
                    {{count($classroom->tasks)}}
                </p> --}}
            </a>
        </div>
        @php
            $attendance = $classroom->attendances()->latest()->first();
        @endphp
        <div class="flex gap-2 justify-between">
            <div class="h-full w-1/2 flex flex-col gap-2">
                <div class="flex flex-items justify-between">
                    <h1 class="text-lg text-accent font-bold">
                        Attendance
                    </h1>
                    <div class="flex gap-2 items-center">
                        <a href="{{ route('teacher.classrooms.attendances', ['classroom' => $classroom->id]) }}"
                            class="btn btn-xs btn-accent">
                            QR Code
                        </a>

                    </div>

                </div>
                @if ($attendance)
                    <div class="w-full h-full flex justify-center items-center">
                        <div class="flex flex-col gap-2">
                            {!! QrCode::size(300)->generate($attendance->attendance_code) !!}
                            <p class="text-gray text-xs text-center">{{ $attendance->attendance_code }}</p>
                            <a href="{{ route('teacher.classrooms.attendances.scanner', ['attendance' => $attendance->id, 'classroom_id' => $classroom->id]) }}"
                                class="btn btn-xs btn-accent">
                                <span><i class="fi fi-rr-qr-scan"></i></span>
                            </a>
                        </div>

                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-sm text-accent">
                            Date Time : {{ date('F d, Y', strtotime($attendance->date)) }}
                        </p>

                    </div>
                    <div class="grid grid-cols-2 grid-flow-row gap-5">
                        <div class="flex flex-col gap-2">
                            <p class="text-sm text-accent">
                                Start Time
                            </p>
                            <p>
                                {{ date('h:s A', strtotime($attendance->start_time)) }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sm text-accent">
                                End Time
                            </p>
                            <p>
                                {{ date('h:s A', strtotime($attendance->end_time)) }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="h-full w-full flex justify-center items-center bg-gray-100 rounded-lg">
                        <h1>
                            No Attendance QR Code
                        </h1>
                    </div>
                @endif
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
                        <th>Date Joined</th>
                        <th>Action</th>
                        {{-- <th>Job</th>
                            <th>Favorite Color</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->

                    @forelse ($classroom->classroomStudents as $classroomStudent)
                        <tr>
                            <th></th>
                            <td>{{ $classroomStudent->student->name }}</td>
                            <td>{{ date('F d, Y H:s A', strtotime($classroomStudent->created_at)) }}</td>
                            <td class="flex items-center gap-2">
                                <a href="{{ route('teacher.student.show', ['student' => $classroomStudent->student->id, 'classroom_id' => $classroom->id]) }}"
                                    class="btn btn-xs btn-accent">
                                    <i class="fi fi-rr-eye"></i>
                                </a>

                                <form
                                    action="{{ route('teacher.classrooms.student.remove', ['classroom_student' => $classroomStudent->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-xs btn-error ">
                                        <i class="fi fi-rr-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th>No Students</th>

                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</x-dashboard.teacher.base>
