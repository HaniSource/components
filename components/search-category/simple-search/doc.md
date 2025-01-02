---
files: 
  SimpleSearch: App/Livewire/Search/Index
  Highlighter: App/Support/Highlighter
  footer: resources/views/components/search/footer
  no-result: resources/views/components/search/no-result
  search-item: resources/views/components/search/search-item
  results: resources/views/components/search/results
  input: resources/views/components/search/input
name: simple search
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

###  The Backend : Search Logic
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

    public string $search = "";

    public function getResults()
    {
        $search = trim($this->search);

        if (empty($search)) {
            return  new Collection();
        }


        $classes = 'text-violet-500 font-semibold';

        $results = $this
            ->baseQuery()
            ->select('id', 'name','slug')
            ->where('name', 'like', '%' . $this->search . '%')
            ->get()
            ->map(function ($component) use ($search, $classes) {
                $result = new \stdClass();
                $result->title = Highlighter::make(
                    text: $component->name,
                    pattern: $search,
                    classes: $classes
                );
                $result->url = $this->getUrl($component->slug);
                return $result;
            });

        return $results;
    }

    public function getUrl($slug)
    {
        return route('components.show', $slug);
    }

    public function baseQuery()
    {
        return Models\Component::query();
    }

    public function render()
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
    public function getResults()
    {
        $search = trim($this->search);

        if (empty($search)) {
            return  new Collection();
        }


        $classes = 'text-violet-500 font-semibold';

        $results = $this
            ->baseQuery()
            ->select('id', 'name','slug')
            ->where('name', 'like', '%' . $this->search . '%')
            ->get()
            ->map(function ($component) use ($search, $classes) {
                $result = new \stdClass();
                $result->title = Highlighter::make(
                    text: $component->name,
                    pattern: $search,
                    classes: $classes
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
the ``$classes`` variable is just used to highligh the matching pattern
