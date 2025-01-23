---
name: copper-search
files: 
  CopperSearch: App/Livewire/Search/Index.php
  index: resources/views/livewire/search/index.blade.php
  Highlighter: App/Support/Highlighter.php
  input: resources/views/components/search/input.blade.php
  results: resources/views/components/search/results.blade.php
  no-result: resources/views/components/search/no-result.blade.php
  search-item: resources/views/components/search/search-item.blade.php
  footer: resources/views/components/search/footer.blade.php
  search-icon: resources/views/components/icon/search.blade.php
  loading-indicator-icon: resources/views/components/icon/loading-indicator.blade.php
dependencies: 
    internal: centred-modal
    external: 
        alpine-animation: https://github.com/CharrafiMed/alpine-animation
    

---

## Documentation 

### Overview 

Hey There! 👋

Let me walk you through the SimpleSearch component a simple yet powerful search feature that’s built with Livewire. It’s designed to make your life easier by offering real-time search with highlighted results. If you're looking to build something similar, don't worry! I’ve got your back. Let's dive in step by step.

### Setting Things Up
First, we need to create a Livewire component. Don’t panic it’s just one simple Artisan command. Open up your terminal and run this:

```shell
php artisan livewire:make Search/Index
```
This command will generate two things for you:

**A backend class**: ``App/Livewire/Search/Index``.
**A Blade view**: the front-facing part of your search.

For now, we’ll focus on the backend logic to make the search work.

###  The Backend Search Logic
```php
<?php

namespace Livewire\Search;

use App\Models;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Collection;
use App\Support\Highlighter;

class Index extends Component
{
    const CLASSES = 'text-violet-500 font-semibold';
    
    public string $search = "";

    public function getResults()
    {
        ....
    }

    public function getUrl(string $slug):string 
    {
        ....
    }

    public function baseQuery(): Builder
    {
        ....
    }

    public function render():View
    {
        return view('livewire.search.index', [
            'results' => $this->getResults(),
        ]);
    }
}

```

we added a ``$search`` property to bind it with the input in the `UI` it consider as the search query.

the ``baseQuery`` function is a just an example of the desired model's table to be searched in this case we use the components table as a use case but be sure to configure it to fit your need.

so whenever the search content change (as the user type in real time) the ``getResults`` will run and send the search results to the *UI* via the `results` variable, so let's explore the ``getResults`` function in the following section:

```php
    public function getResults():Collection
    {
        $search = trim($this->search);

        if (empty($search)) {
            return  new Collection();
        }


        $results = $this
            ->baseQuery()
            ->select('id', 'name','slug')
            ->where('name', 'like', '%' . $this->search . '%')
            ->get()
            ->map(function ($component) use ($search) {
                $result = new \stdClass();
                $result->title = Highlighter::make(
                    text: $component->name,
                    pattern: $search,
                    classes: self::CLASSES
                );
                $result->url = $this->getUrl($component->slug);
                return $result;
            });

        return $results;
    }
```
first we need to trim the search term to prevent uncessary queries like when the search term is space ... so we use the ``trim`` function for that, then we check if search is empty 

```php
    if (empty($search)) {
        return  new Collection();
    }
``` 
to return an empty collection and stop going further. if the search is not empty we need to complete our way to querying the database.

The ``$classes`` A CSS class is defined for highlighting matched search patterns

```php
$results = $this
    ->baseQuery()
    ->select(['id', 'name', 'slug'])
    ->where('name', 'like', "%{$this->search}%")
    ->get()
    ->map(function ($component) use ($search, $classes) {
        $result = new stdClass();
        $result->rawTitle = $component->name;
        $result->title = Highlighter::make(
            text: $component->name,
            pattern: $search,
            classes: $classes
        );
        $result->url = $this->getUrl($component->slug);

        return $result;
    });
```

The query selects the ``id``, ``name``, and ``slug`` columns and filters them based on the search term. Each result is highlighted and mapped into an object with a title (highlited) and a raw title (used for storing recent search in local storage) and URL.


```php
public function getUrl(string $slug): string
{
    return route('components.show', $slug);
}
```
The getUrl function generates a link for each search result.

As I said eirlier this is just an example query.

now let's deep dive into the highliter class wich's the core of highliting queries 

```php
<?php

declare(strict_types=1);

namespace App\Support;

final class Highlighter
{
    public static function make(?string $text, ?string $pattern, ?string $styles = '', ?string $classes = ''): string 
    {

        if (blank($pattern)) {
            return $text;
        }

        $highlightedPattern = '<span';

        if (! empty($classes)) {

            $highlightedPattern .= ' class="'.$classes.'"';
        }

        if (! empty($styles)) {

            $highlightedPattern .= ' style="'.$styles.'"';
        }

        $highlightedPattern .= '>$0</span>';

        return preg_replace('/('.preg_quote($pattern, '/').')/i', $highlightedPattern, $text);
    }
}
```
the class has ```make()``` static method that accept subject ``$text`` the ``$pattern`` wich is the query term it also accet two optional (but important ) ``styles`` and ``classes`` parameters 

First, the method checks if the pattern is empty and returns the original text early if so. Then it constructs the highlighted HTML using a ```html <span class="..." style="...">$0</span>``` structure, where ``$0`` is a regex placeholder for matched text.

Finally, ``preg_replace()`` searches the subject for occurrences of the query term and replaces them with the constructed highlighted pattern.

The ``preg_quote()`` function is used to escape special characters in the pattern to ensure safe regex execution.

This regex-based highlighting approach provides flexibility and simplicity compared to algorithmic alternatives.

now we ensure that the returen query is highlited withing a span let's focus now on the fron-end


### The Front-End Logic
while the design is build in different mind that the mind that read this docs, it ensure to build something beautiful, fully accessible, easy to customize.. so let's start the front end journey 

First we have the entry point. The ``index.blade.php`` livewire component 

```html
<x-modal
    openEvent="open-global-search"
    closeEvent="close-global-search"
>
    <x-slot:trigger>
        .... act as the trigger of the modal...
    </x-slot:trigger>
    <x-slot:header class="border-b border-gray-300 dark:border-gray-800 px-2">
        .... act as search input...
    </x-slot:header>
        .... act as results and recent searchs wrapper...
    <x-slot:footer>
        <x-search.footer/>        
    </x-slot:footer>
</x-modal>
```
#### the modal trigger 
I styled a nice button look as a button to open our search modal 

```html
<x-slot:trigger>
    <div 
        class="flex items-center w-60  justify-center" 
    >
        <div class="pointer-events-auto  relative bg-white dark:bg-black rounded-lg">
            <button
                class="hidden w-full items-center rounded-lg py-1.5 pl-2 pr-3 text-sm leading-6 text-slate-400 shadow-sm ring-2  ring-purple-500/15 hover:ring-purple-500 transition-all duration-300 dark:hover:bg-[#02031C] lg:flex"
                type="button"
            >
            <x-icon.search 
                size="5"
                class="mr-3"
                stroke="3"
            />Quick search...
            </button>
        </div>
    </div>
</x-slot:trigger>
``` 
> don't forget to copy the icons component from the files tab.

Alright, since now we have the trigger setup correctly let's build the search itself.

#### the search input

we use the header slot and put inside it the form input and bind the `$search` with backend 

```html
<x-slot:header class="border-b border-gray-300 dark:border-gray-800 px-2">
    <form 
        class="relative flex w-full items-center px-1 py-0.5"
    >
        <label 
            class="flex items-center justify-center text-gray-400 dark:text-gray-600"
            id="search-label" 
            for="search-input"
        >
            <x-icon.search 
                wire:loading.class="hidden" 
                size="5"
                stroke="3"
            />
            <div class="hidden" wire:loading.class.remove="hidden">
                <x-icon.loading-indicator />
            </div>
        </label>
        <x-search.input/> <!-- has the binding for the $search variable -->
    </form>
</x-slot:header>
```
> don't forget to copy the icons component from the files tab.

#### handling results

this is getting injected to ``{{ $slot }}`` portion

```html
<div class="py-2" x-data="search">
        @unless (empty($search))
            <x-search.results :results="$results" />
        @else
            <div
            x-data="{
                handleKeyUp(){
                    focusedEl = $focus.focused()
                    {{-- $focus.getFirst() === $focus.focused() ? document.getElementById('search-input').focus() : $focus.previous(); --}}
                    if($focus.getFirst() === $focus.focused()){
                        document.getElementById('search-input').focus();return
                    }
                    if (focusedEl.hasAttribute('data-action')) {
                        const parentLi = focusedEl.closest('li');
                        if (parentLi) {
                            const actions = parentLi.querySelectorAll('[data-action]');
                            if (Array.from(actions).indexOf(focusedEl) === 0) {
                                parentLi.focus();
                                return;
                            }
                        }
                    }
                    $focus.previous()
                },
                handleKeyDown(){
                    focusedEl = $focus.focused() 
                    if(focusedEl.tagName == 'LI'){
                        actions = focusedEl.querySelectorAll('[data-action]');
                        if(actions.length > 0){
                            actions[0].focus();
                             return;
                        }
                    }
                    $focus.wrap().next(); 
                },
            }"   
            x-on:focus-first-element.window="$focus.first()"
            x-on:keydown.up.stop.prevent="handleKeyUp()"
            x-on:keydown.down.stop.prevent="handleKeyDown()" 
             class="global-search-modal w-full">
                <template x-if="search_history.length <=0">
                    <p class="dark:text-gray-200 w-full p-4 text-center text-gray-700">Please enter a search term to get
                        started.
                    </p>
                </template>
                <template x-if="search_history.length > 0">
                    <div>
                        <div class="top-0 z-10">
                            <h3
                                class="relative flex flex-1 flex-col justify-center overflow-x-hidden text-ellipsis whitespace-nowrap px-4 py-2 text-start text-[0.9em] font-semibold capitalize text-violet-600 dark:text-violet-500   ">
                                Recent
                            </h3>
                        </div>
                        <ul>
                            <template x-for="(result,index) in search_history">
                                <x-search.summary.item
                                    x-bind:key="index"
                                    x-on:click="addToSearchHistory(result.title,result.url)"
                                >
                                    <span x-html="result.title">
                                    </span>
                                    <x-slot:actions>
                                        <x-search.action-button
                                            title="delete"
                                            clickFunction="deleteFromHistory(result.title)"
                                            icon="x"
                                        />
                                    </x-slot:actions>
                                </x-search.copper.summary.item>
                            </template>
                        </ul>
                    </div>
                </template>
            </div>
        @endunless
    </div>
```

First we check if the search query is empty to render the fallback, recent search items (we will deep dive into in a minute), if not we need to start handling search results inside the ``resources/views/components/search/results.blade.php`` below :

```html
<div
    {{
        $attributes->class([
            'flex-1 z-10 w-full mt-1 overflow-y-auto h-full bg-white transition dark:bg-transparent ',
            '[transform:translateZ(0)]', // prevent safari ui bugs
        ])
    }}
>
    @if ($results->isEmpty())
        <x-search.no-results/>
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
            @foreach ($results as $index => $result)            
                <x-search.search-item
                    :title="$result->title"
                    :rawTitle="$result->rawTitle"
                    :url="$result->url"
                />
            @endforeach
        </ul>
    @endif
</div>
```
livewire re-render results each time we change the ``$search`` value (as user type ...) so we need to check if the searched query came up with some results from the database if not we render the ``resources/views/components/search/no-results.blade.php`` instead.

we use the ``focus`` plugin provided by alpine to manage accessibity the ``handleKeyUp()`` function is used to check when we are in the first search item, if so we go back to our source of truth the input 

the ``x-animate`` provided by the alpine animation package for making the results changes smoothly [alpine animation](https://github.com/CharrafiMed/alpine-animation) (I am the author).

if there is results we loop over them and display them using the ``resources/views/components/search/search-item.blade.php`` views wich is simple as:  
##### Search Result Item Structure

Each search result item is represented by the following HTML structure:

```html
@props([
    'title',
    'rawTitle',
    'url',
])

<li 
    role="option"
    x-on:click="addToSearchHistory(@js($rawTitle),@js($url))"
>
    <a 
        href="{{ $url }}"
        wire:navigate
        @class([
            'block  scroll-mt-9 mx-1 my-1 dark:bg-white/5 group bg-gray-50 py-6 px-3 duration-300 transition-colors rounded-lg focus:bg-gray-100 dark:focus:bg-white/10 focus:border focus-visible:outline-none focus:border-gray-400 dark:focus:border-white/30  hover:bg-gray-100 dark:hover:bg-white/10 flex justify-between items-center',
            'p-3',
        ])
        >
        <h4 
            @class([
            'text-md text-start font-medium text-gray-950 dark:text-white',
            ])
        >
                {{ str($title)->sanitizeHtml()->toHtmlString() }}
        </h4>
    </a>
</li>
```

as you saw we added ``addToSearchHistory(@js($rawTitle),@js($url))`` that get exucted in click event that is a function we are going to build in the following section responsible for persist the searched item (getting clicked) in local storage so with that said let's deep into persist our items into the local storage

so if we go back to our resuls handling section se see that we are bind and an alpine component called search, it time to build it 
```html
<div class="py-2" x-data="search">
        @unless (empty($search))
           ....
        @else
            <div
            x-data="{
                <!-- used for accessibilty-->
            }"
            ....   
            class="global-search-modal w-full">    
                ....
            </div>
        @endunless
    </div>
```

at first we need to go to our resources folder and create ``resources/js/components/search.js`` then build our scripts 
```js
export default () => ({
    search_history: [],
    maxItemsAllowed: 10,
    init: function () {
        this.search_history = JSON.parse(localStorage.getItem("search_history")) || [];
        this.$watch("search_history", (val) => {
            localStorage.setItem("search_history", JSON.stringify(val));
        });
    },

    addToSearchHistory: function (searchItem,url) {
        const searchItemObject = { title: searchItem,url };

        let history_data = this.search_history.filter(
            (el) => el.title !== searchItemObject.title
        );
        
        history_data = [searchItemObject, ...history_data].slice(
            0,
            this.maxItemsAllowed
        );
        this.search_history = history_data;
    },
    deleteFromHistory: function (searchItem) {
        let index = this.search_history.findIndex(
            (el) => el.title === searchItem
        );
        if (index !== -1) {
            this.search_history.splice(index, 1);
        }
    },
    deleteAllHistory: function () {
        this.search_history = [];
    },
});
```

we store our recent search items in ``search_history`` array, that getting filled from the local storage each time the component getting initialized using 
```js
 this.search_history = JSON.parse(localStorage.getItem("search_history")) || [];
```
we check if there something in the search_history key in local storage, if so we parse it and storing in it into our `search_history` array,if not we give it empty array to make it happy 🙂.

> let's suppose we have somethinge into local storage to play with it 

next we need to watch our `search_history` if there is some items getting added (using ``addToSearchHistory`` function) or getting removed (using ``deleteFromHistory``function ) to update also the local storage, well there is many ways to do that, but the best option I find to prevent some alpinejs reactivity system issues is ``watch`` api like so:

```js
this.$watch("search_history", (val) => {
    localStorage.setItem("search_history", JSON.stringify(val));
});
```
is simple as listen for ``search_history`` updates to update local storage 😎. 


- [bronze search](bronze-search) for extra favorites features .
- [silver search](silver-search) for extra favorites features, grouping results, suggesston.


