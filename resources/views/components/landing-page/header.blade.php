<div class="min-h-screen w-full bg-cover bg-no-repeat bg-bottom"
    style="background-image: url({{ asset('images.jpg') }})">
    <div class="h-screen w-full flex justify-center backdrop-sepia-0 bg-white/80 ">
        <div class="w-5/6 h-full flex flex-col">
            <div class="flex flex-col gap-2 w-full">
                <div class="w-full p-2 rounded-lg flex items-center justify-between sticky top-0">
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('logo-modified.png') }}" alt="" srcset=""
                            class="object-center h-16 w-16">
                        <h1 class="text-accent text-3xl font-bold tracking-wider">
                            South East Asia Institute of Trade and Technology
                        </h1>
                    </div>


                    <a href="{{route('login')}}" class="btn btn-accent text-white btn-sm">Login</a>

                </div>
                {{-- <div class="w-full flex items-end justify-center">
                    <div class="flex items-center gap-5">
                        <a href="#" class="py-2 px-4 hover:bg-accent rounded-lg duration-700 hover:text-primary text-sm tracking-wider">Home</a>
                        <a href="#announcement" class="py-2 px-4 hover:bg-accent rounded-lg duration-700 hover:text-primary text-sm tracking-wider">Announcement</a>
                        <a href="http://" class="py-2 px-4 hover:bg-accent rounded-lg duration-700 hover:text-primary text-sm tracking-wider">Gallery</a>
                        <a href="http://" class="py-2 px-4 hover:bg-accent rounded-lg duration-700 hover:text-primary text-sm tracking-wider">About</a>
                        <a href="http://" class="py-2 px-4 hover:bg-accent rounded-lg duration-700 hover:text-primary text-sm tracking-wider">Contact US</a>
                    </div>
                </div> --}}
            </div>


            <div class="flex items-center h-[40rem]  w-full p-2 justify-between ">
                <div class="flex flex-col gap-5">
                    <h1 class="text-4xl text-accent tracking-wider font-bold">
                        E-Learning Access Anywhere
                    </h1>
                    <p class="text-nuetral">
                        Access the new journey of Education
                    </p>
                    <a href="#" class="py-2 px-4 bg-accent rounded-tl-lg rounded-br-lg text-white font-bold w-32 text-center hover:scale-95 duration-700">
                       More Details
                    </a>
                </div>

                <div class="flex flex-col gap-5 h-96 rounded-lg">
                    <img src="{{asset('images2.jpg')}}" alt="" srcset="" class="rounded-lg w-[30rem] h-full object-cover object-top">
                </div>

            </div>

        </div>
    </div>
</div>
