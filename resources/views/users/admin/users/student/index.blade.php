<x-dashboard.admin.base>
    <x-dashboard.page-title :back_url="route('admin.users.index')" :title="_('Students')" :create_url="route('admin.users.students.create')"/>
    <div class="panel flex flex-col gap-2">
        <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead>
                <tr>
                  <th></th>
                  <th>name</th>
                  <th>email</th>
                  {{-- <th>Favorite Color</th> --}}
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                @forelse ($students as $student)

                <tr>
                    <th></th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    {{-- <td>Blue</td> --}}
                  </tr>
                @empty
                <tr>
                    <th>1</th>
                    <td>Cy Ganderton</td>
                    <td>Quality Control Specialist</td>
                    <td>Blue</td>
                  </tr>

                @endforelse

                {{-- <!-- row 2 -->
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
</x-dashboard.admin.base>
