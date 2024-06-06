<?php

namespace App\Http\Controllers\Student;

use App\Enums\GeneralStatus;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttachmentStudent;
use App\Models\StudentTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        }])->withCount([
            'attachments'
        ])->latest()->get();
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
    public function submitTask(Request $request, string $id)
    {

        $attachments = $request->attachments;

        $studentTask = StudentTask::find($id);

        if ($attachments) {

            collect($attachments)->map(function ($attachment) use($studentTask) {

                $base64 = str_replace(' ', '+', $attachment['data']);
                $fileName = "{$studentTask->task->name}-" . uniqid() . '.' . $attachment['extension'];
                $fileDecoded = base64_decode($base64);


                $storagePath = "public/students/attachment/" . $fileName;

                if (Storage::put($storagePath, $fileDecoded)) {
                    throw new \Exception('Failed to save the file');
                }


                $attachments = AttachmentStudent::create([
                    'file' => asset('/storage/students/attachment/' . $fileName),
                    'type' => $attachment->type,
                    'extension' =>  $attachment->extension,
                    'student_task_id' => $studentTask->id
                ]);
            });
        }

        $studentTask->update([
            'status' => GeneralStatus::SUBMITTED->value
        ]);

        return response(['message' => 'Task Submitted']);
    }
}
