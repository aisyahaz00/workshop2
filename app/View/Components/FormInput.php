<?php

namespace App\View\Components;

use Closure;
use Hidehalo\Nanoid\Client;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id = '',
        public string $label = '',
        public string $name = '',
        public string $type = '',
        public string $value = '',
        public string $placeholder = '',
        public string $class = '',
    ) {
        if (empty($this->id)) {
            $client = new Client();
            $this->id = $client->generateId(15);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
