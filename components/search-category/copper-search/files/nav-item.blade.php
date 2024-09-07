<ul>
    @foreach ($categories as $category)
        <li class="mt-12 lg:mt-8">
            <h5 class="mb-8 font-semibold text-slate-900 dark:text-slate-200 lg:mb-3">
                {{ $category->name }}
            </h5>
            <ul class="space-y-6 border-l border-slate-100 dark:border-slate-800 lg:space-y-2">
                @foreach ($category->components as $component)
                    <li>
                        <a class="-ml-px block border-transparent pl-4 text-slate-700 transition duration-300 hover:translate-x-2 hover:border-slate-400 hover:text-slate-900 dark:text-slate-400 dark:hover:border-slate-500 dark:hover:text-slate-300"
                            href="{{ route('components.show',$component) }}" wire:navigate>{{ $component->name }}
                            {!! Illuminate\Support\Lottery::odds(4, 20)->winner(
                                    fn() => '<span class="bg-violet-100 text-sky-500 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-white/5 dark:text-sky-500 border border-sky-600">free</span>',
                                )->loser(fn() => '')->choose() !!}

                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>