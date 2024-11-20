<div
    x-data="{
        activeIndex: -1,
        resultsCount: {{ $results->count() }},
        focusItem(index) {
            this.activeIndex = index;
            const item = document.querySelector(`[data-index='${index}']`);
            item?.focus();
        },
        next() {
            if (this.activeIndex < this.resultsCount - 1) {
                this.focusItem(this.activeIndex + 1);
            }
        },
        previous() {
            if (this.activeIndex > 0) {
                this.focusItem(this.activeIndex - 1);
            }
        },
    }"
    {{-- x-on:keydown.up.prevent="$focus.wrap().previous()"
    x-on:keydown.down.prevent="$focus.wrap().next()"
    x-on:focus-first-element.window="console.log('test')" --}}
    x-on:keydown.up.prevent="previous()"
    x-on:keydown.down.prevent="next()"
    x-on:focus-first-element.window="focusItem(0)"
    {{
        $attributes->class([
            'fi-global-search-modal-results-ctn flex-1 z-10 w-full mt-1 overflow-y-auto h-full bg-white shadow-lg transition dark:bg-transparent ',
            '[transform:translateZ(0)]',
        ])
    }}
>
    @if ($results->isEmpty())
        <x-components::search.no-results/>
    @else
        <ul>
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