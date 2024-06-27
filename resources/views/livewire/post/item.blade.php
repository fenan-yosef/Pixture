<div class="max-w-lg mx-auto">
    {{-- In work, do what you enjoy. --}}


    {{-- header --}}

    <header class="flex items-center gap-3">


        <x-avatar src="https://source.unsplash.com/500x500?face" class="h-9 w-9" />

        <div class="grid grid-cols-7 w-full gap-2">

            <div class="col-span-5">
                <h5 class="font-semibold truncate text-sm"> {{$post->user->name}} </h5>
            </div>

            <div class="col-span-2 flex text-right justify-end">

                <button class="text-gray-500 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                </button>
            </div>


        </div>


    </header>


    {{-- main --}}
    <main>
        <div class="my-2">
            <!-- Slider main container -->
            <div x-init="

            new Swiper($el,{

                modules: [Navigation, Pagination],
                loop:true,

                pagination: {
                    el: '.swiper-pagination',
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

            });
            
            " class="swiper h-[500px] border bg-white">
                <!-- Additional required wrapper -->

                <ul x-cloak class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($post->media as $file)
                    <li class="swiper-slide">
                        @switch($file->mime)
                        @case('video')
                        <x-video source="{{$file->url}}" />
                        @break
                        @case('image')

                        <img src="{{$file->url}}" alt="" class="h-[500px] w-full block object-scale-down">
                        @break
                        @default

                        @endswitch
                    </li>
                    @endforeach






                </ul>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                @if ( count($post->media)>1)

                {{-- prev --}}
                <div class="swiper-button-prev absolute top-1/2 z-10 p-2">
                    <div class=" bg-white/95 border p-1 rounded-full text-gray-900">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.8"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>


                    </div>

                </div>

                {{-- next --}}
                <div class="swiper-button-next absolute right-0 top-1/2 z-10 p-2">
                    <div class=" bg-white/95 border p-1 rounded-full text-gray-900">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.8"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>



                    </div>
                </div>

                @endif


                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>

        </div>
    </main>




    {{-- footer --}}
    <footer>

        {{-- actions --}}
        <div class="flex gap-4 items-center my-2">

            {{-- heart --}}

            @if ($post->isLikedBy(auth()->user()))
            <button wire:click='togglePostLike()'>

                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 text-red-900">
                    <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                  </svg>
                  
                  
            </button>unlike

            @else
            <button wire:click='togglePostLike()'>
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                  </svg>

            </button>like
            @endif



            @if ($post->allow_commenting)

            {{-- comment --}}
            <button
                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>

            </button>comment
            @endif

            {{-- forward --}}
            <span>
                <svg fill="#000000" class="w-6 h-6 text-blue-500" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                   
                    <path class="clr-i-solid clr-i-solid-path-1" d="M27.53,24a5,5,0,0,0-3.6,1.55L11.74,19.45a4.47,4.47,0,0,0,0-2.8l12.21-6.21a5.12,5.12,0,1,0-1.07-1.7L10.79,14.89a5,5,0,1,0,0,6.33l12.06,6.07A4.93,4.93,0,0,0,22.54,29a5,5,0,1,0,5-5Z"></path>
                    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                </svg>
            </span>share

            {{-- Bookmark/favorites --}}
            <span class="ml-auto">

                @if ($post->hasBeenFavoritedBy(auth()->user()))

                <button wire:click='toggleFavorite()'>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                      </svg>
                      
                </button>


                @else
                <button wire:click='toggleFavorite()'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                      </svg>
                      
                </button>
                @endif


            </span>

        </div>

        {{-- likes and views --}}
        @if ($post->totalLikers>0 && !$post->hide_like_view)
        <p class="font-bold text-sm">{{$post->totalLikers}} {{$post->totalLikers>1? 'likes':'like'}}</p>
        @endif

        {{-- name and comment --}}
        <div class="flex text-sm gap-2 font-medium">
            <p> <strong class="font-bold">{{$post->user->name}} </strong>
                {{$post->description}}
            </p>
        </div>

        @if ($post->allow_commenting)

        {{-- view post modal --}}
        <button onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})"
            class="text-slate-500/90 text-sm font-medium"> View all {{$post->comments->count()}} comments </button>


        @auth
        {{-- show comments for auth --}}
        <ul class="my-2">
            @foreach ($post->comments()->where('user_id',auth()->id())->get() as $comment )


            <li class="grid grid-cols-12 text-sm items-center">
                <span class="font-bold col-span-3 mb-auto">{{auth()->user()->name}} </span>
                <span class="col-span-8">{{$comment->body}} </span>
                <button class="col-span-1 mb-auto flex justify-end pr-px">
                    {{-- heart --}}
                    @if ($comment->isLikedBy(auth()->user()))
                    <span wire:click='toggleCommentLike({{$comment->id}})'>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-3 h-3 text-rose-500">
                            <path
                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    </span>

                    @else
                    <span wire:click='toggleCommentLike({{$comment->id}})'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                            stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>

                    </span>
                    @endif
                </button>
            </li>
            @endforeach
        </ul>
        @endauth

        {{-- leave comment --}}
        <form wire:key='{{time()}}' @submit.prevent="$wire.addComment()" x-data="{body:@entangle('body')}"
            class="grid grid-cols-12 items-center w-full">
            @csrf

            <input x-model="body" type="text" placeholder=" Leave a comment "
                class="border-0 col-span-10 placeholder:text-sm outline-none focus:outline-none px-0 rounded-lg hover:ring-0 focus:ring-0">
            <div class="col-span-1 ml-auto flex justify-end text-right">
                <button type="submit" x-cloak x-show="body.length >0"
                    class="text-sm font-semibold flex justify-end text-blue-500">
                    Post
                </button>
            </div>

            <span class="col-span-1 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>
            </span>

        </form>
        @endif


    </footer>
</div>