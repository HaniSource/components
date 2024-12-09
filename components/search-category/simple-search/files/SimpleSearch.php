<?php

declare(strict_types=1);

namespace App\Livewire\Search;

use App\Models;
use App\Support\Highlighter;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;

final class SimpleSearch extends Component
{
    public string $search = '';

    public function getResults()
    {
        $search = trim($this->search);

        if (empty($search)) {
            return new Collection();
        }

        $classes = 'text-violet-500 font-semibold';

        $results = $this
            ->baseQuery()
            ->select('id', 'name', 'slug')
            ->where('name', 'like', '%'.$this->search.'%')
            ->get()
            ->map(function ($component) use ($search, $classes) {
                $result = new stdClass();
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

    #[Layout('components::components.layouts.app')]
    public function render()
    {
        return view('components::livewire.search.simple-search', [
            'results' => $this->getResults(),
        ]);
    }
}
