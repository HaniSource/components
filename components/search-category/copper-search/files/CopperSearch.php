<?php

declare(strict_types=1);

namespace App\Livewire\Search;

use stdClass;
use App\Models;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Collection;
use App\Support\Highlighter;
use Illuminate\Database\Eloquent\Builder;

final class SimpleSearch extends Component
{
    const CLASSES = 'text-violet-500 font-semibold';
    public string $search = '';

    public function getResults(): Collection
    {
        $search = trim($this->search);

        if (empty($search)) {
            return new Collection();
        }


        $results = $this
            ->baseQuery()
            ->select('id', 'name', 'slug')
            ->where('name', 'like', '%' . $search . '%')
            ->get()
            ->map(function ($component) use ($search) {
                $result = new stdClass();
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

    public function getUrl($slug): string
    {
        return route('components.show', $slug);
    }

    public function baseQuery(): Builder
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
