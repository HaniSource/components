<div
    {{
        $attributes->class([
            'flex-1 z-10 w-full mt-1 overflow-y-auto h-full bg-white transition dark:bg-transparent ',
            '[transform:translateZ(0)]',
        ])
    }}
>
    @if ($results->isEmpty())
        <x-components::search.no-results/>
    @else
        <ul 
            id="search-list"
            x-data="{
                handleKeyUp(){
                    $focus.getFirst() === $focus.focused() ? document.getElementById('search-input').focus() : $focus.previous();
                },
            }"
            x-on:focus-first-element.window="$focus.first()"
            x-on:keydown.up.stop.prevent="handleKeyUp()"
            x-on:keydown.down.stop.prevent="$focus.wrap().next()"
            x-animate
        >
            @foreach ($results as $index => $result )            
                <x-components::search.search-item
                    :title="$result->title"
                    :url="$result->url"
                    :index="$index"
                />
            @endforeach
        </ul>
    @endif
</div>