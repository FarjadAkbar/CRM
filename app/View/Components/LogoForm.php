<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LogoForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $slogan, $imagery, $design, $colors, $intended, $business, $audience;
    public function __construct($title, $slogan, $imagery, $design, $colors, $intended, $business, $audience)
    {
        //
        $this->title = $title;
        $this->slogan = $slogan;
        $this->imagery = $imagery;
        $this->design = $design;
        $this->colors = $colors;
        $this->intended = $intended;
        $this->business = $business;
        $this->audience = $audience;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo-form');
    }
}