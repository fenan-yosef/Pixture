<div class="grid grid-cols-12 gap-3 h-full w-full overflow-hidden">

    <aside class="lg:col-span-7 m-auto items-center w-fulloverflow-scroll">

        {{-- CSS snap scroll --}}
        <div class="relative flex overflow-x-scroll overscroll-contain w-[500px] selection:snap-x snap-mandatory gap-2 px-2">

            @foreach ($post->media as $key =>$file)

                <div class="w-full h-full shrink-0 snap-always snap-center">

                    @switch($file->mime)
                        @case('video')

                            <x-video source="{{$file->url}}" />
                            @break

                        @case('image')

                            <img src="{{$file->url}}" alt="image" class="h-full w-full block object-scale-down">
                            @break

                        @default

                    @endswitch

                </div>

            @endforeach


        </div>

    </aside>

    <aside class="lg:col-span-5 h-full scrollbar-hide relative flex gap-4 flex-col overflow-hidden overflow-y-scroll">

    </aside>

</div>
