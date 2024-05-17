<div class="w-full">
    <!-- header -->
    <header>

    </header>

    <!-- main -->
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">

    <aside class="lg:col-span-8 border overflow-hidden h-[1000px]">
        <!-- stories -->
        <section>
            <ul class="flex overflow-x-auto scrollbar-hide items-center gap-2">
                
                @for ($i = 0; $i < 15; $i++)
                <li class="flex flex-col justify-center w-20 gap-1 p-2">
                    <x-avatar story src="https://source.unsplash.com/500x500?face-{{$i}}" class="h-14 w-14"/>
                    <p class="text-xs font-mediun truncate">
                        {{fake()->name}}
                    </p>
                </li>
                    @endfor
                

            </ul>
        </section>


    </aside>
    <aside class="lg:col-span-4 border hidden lg:block p-4">

        <div class="flex items-center gap-2">
            <x-avatar src="https://source.unsplash.com/500x500?face" class="w-12 h-12"/>
            <h4 class="font-medium">{{fake()->name}}</h4>
        </div>
        <!-- suggestions -->
        <section class="mt-4">
            <h4 class="font-Bold text-gray-700/95">
                Suggestions for you
            </h4>
            <ul class="my-2 space-y-3">
            @for ($i = 0; $i < 3; $i++)
                <li class="flex items-center gap-3">
                    <x-avatar story src="https://source.unsplash.com/500x500?face-{{$i}}" class="h-14 w-14"/>
                    <div class="grid grid-cols-7 w-full gap-2">
                        <div class="col-span-5">
                            <h5 class="font-semibold truncate text-sm">{{fake()->name}}</h5>
                            <p class="text-xs font-mediun truncate">
                        Followed by {{fake()->name}}
                    </p>
                        </div>

                        <div class="col-span-2 flex flex-right justify-center">
                            <button class="font-bold text-blue-500 ml-auto">
                                Follow
                            </button>
                        </div>
                    </div>
                    
                </li>
                    @endfor
            </ul>
        </section>

        <!-- Ap links -->

        <section class="mt-5">
            <ol class="flex-gap-2 flex-wrap">
                <li class="text-xs text-gray-800/90 font-medium">
                    <a href="" class="hover:underline">About</a>
                </li>
            </ol>
        </section>

    </aside>

    </main>
</div>