<?php

declare(strict_types=1);

namespace Src\Components\Livewire\Search;

use App\Models;
use App\Support\Highlighter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;

final class BronzeSearch extends Component
{
    const CLASSES = 'text-violet-500 font-semibold';
    public string $search = '';

    public function getResults():Collection
    {
        $search = trim($this->search);

        if (empty($search)) {
            return new Collection();
        }


        $results = $this
            ->baseQuery()
            ->select('id', 'name', 'slug')
            ->where('name', 'like', '%'.$search.'%')
            ->get()
            ->map(function ($component) use ($search) {
                $result = new stdClass();
                $result->rawTitle = $component->name;
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

    public function getUrl($slug):string 
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
