<?php

namespace App\Http\Controllers\Student;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function  index(string $id)
    {

        $user = Auth::user();

        return Task::where(function ($q) use ($id, $user) {
            $q->where('classroom_id', $id)
                ->whereHas('assignStudents', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                });
        })->with(['attachments', 'assignStudents' => function ($q) use ($user) {
            $q->where('user_id', $user->id);
        }])->latest()->get();
    }
    public function show(string $id)
    {
        $user = Auth::user();

        return StudentTask::where(function ($q) use ($id, $user) {
            $q->whereHas('task', function ($q) use ($id) {
                $q->where('id', $id);
            })
                ->where('user_id', $user->id);
        })->with([
            'task.attachments'
        ])->latest()->first();
    }
    public function addAttachment(Request $request){

    }
}
