<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Article as Art;

class article extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(  public Art $article)
    {
      
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article');
    }
}
