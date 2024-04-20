<x-auth.base>

    <form action="{{route('login')}}" method="post" class="flex flex-col gap-2">

        @csrf
        <div class="flex justify-center w-full">
            <div class="flex items-center gap-2">
                <img src="{{ asset('logo-modified.png') }}" alt="" srcset="" class="h-12 w-12 object-cover">
                <h1 class="text-3xl font-bold text-center text-accent">Login</h1>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <label for="" class="text-accent">Email</label>
            <input type="email" name="email" class="input input-accent input-sm bg-primary">
        </div>
        <div class="flex flex-col gap-2">
            <label for="" class="text-accent">password</label>
            <input type="password" name="password" class="input input-accent input-sm bg-primary">
        </div>

        <button class="btn btn-accent btn-sm">Login</button>

    </form>

</x-auth.base>
