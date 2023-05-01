<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class PodcastPublicCard extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $podcasts;
    public function __construct(Collection $podcasts)
    {
        $this->podcasts = $podcasts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.podcast-public-card', ['podcasts'=>$this->podcasts]);
    }
}
