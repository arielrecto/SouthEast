<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Enums\UserRoles;
use App\Models\Strand;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $roles = UserRoles::cases();


        collect($roles)->map(function ($role) {
            Role::create([
                'name' => $role->value
            ]);
        });


        $adminRole = Role::where('name', UserRoles::ADMIN->value)->first();

        $teacherRole = Role::where('name', UserRoles::TEACHER->value)->first();
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('teacher123')
        ]);


        Strand::create([
            'name' => 'INFORMATION AND COMMUNICATION TECHNOLOGY',
            'acronym' => 'ICT',
            'descriptions' => 'sample description'
        ]);


      Subject::create([
            'name' => 'ORAL COMMUNICATION',
            'subject_code' => "ORL-101",
            'description' => 'SAMPLE DESCRIPTION'
        ]);



        $admin->assignRole($adminRole);

        $teacher->assignRole($teacherRole);
    }
}
