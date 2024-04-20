<div class="w-full h-screen flex justify-center" id="announcement">
    <div class="w-5/6 h-full flex flex-col gap-2 py-5 justify-between">
        <h1 class="text-3xl font-bold flex items-center text-accent gap-5">
            <span>
                <i class="fi fi-rr-megaphone"></i>
            </span>
            <span>
                Announcements
            </span>
        </h1>


        <div class="flex flex-col gap-2 h-[38rem] overflow-y-hidden w-full">

            @for ($i = 0; $i < 5; $i++)
                <div class="flex items-center h-32 border-b border-accent w-full py-2 gap-5 justify-between">
                    <img src="{{ asset('images2.jpg') }}" alt="" srcset="" class="object-cover h-full w-auto">
                    <div class="h-full flex flex-col gap-2 w-5/6">
                        <h1 class="text-2xl font-bold text-accent tracking-wider">Heat Strike</h1>
                        <p class="text-secondary text-xs">Post : 4/17/2024</p>
                        <p class="truncate whitespace-pre-line">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a lacinia lacus. Nulla varius
                            purus tincidunt nulla mollis convallis. Integer elementum, risus at ullamcorper fermentum,
                            metus eros dapibus purus, eu aliquam sapien lorem eu eros. Quisque et pharetra nulla. Etiam
                            leo turpis, dictum maximus mi sed, euismod dictum neque. Nam rhoncus, quam quis vehicula
                            facilisis, enim urna pharetra enim, a accumsan nisl leo vitae lorem. Praesent faucibus
                            vulputate ornare. Nunc mollis venenatis urna tincidunt tincidunt. Quisque mollis placerat ex
                            hendrerit ultricies. Ut sollicitudin non justo a sollicitudin. Sed sollicitudin magna quis
                            leo vestibulum bibendum.
                        </p>
                    </div>

                    <div class="h-full flex justify-center items-center w-auto">
                        <a href="http://" class="btn btn-accent btn-sm">Read More</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
