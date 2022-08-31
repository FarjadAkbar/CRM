<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $purpose, $objective, $projecttarget, $brandtarget, $desiredreaction, $competitor,  $design,  $functionality,  $positiveaspects,  $negativeaspects,  $trafficlevels,  $currentperformance,  $currrenthosting, $negativehosting;
    public function __construct($title, $purpose, $objective, $projecttarget, $brandtarget, $desiredreaction, $competitor,  $design,  $functionality,  $positiveaspects,  $negativeaspects,  $trafficlevels,  $currentperformance,  $currrenthosting, $negativehosting)
    {
        //
        $this->title = $title;
        $this->purpose = $purpose;
        $this->objective = $objective;
        $this->projecttarget  = $projecttarget;
        $this->brandtarget = $brandtarget ;
        $this->desiredreaction = $desiredreaction ;
        $this->competitor = $competitor ;
        $this->design = $design ;
        $this->functionality = $functionality ;
        $this->positiveaspects = $positiveaspects ;
        $this->negativeaspects = $negativeaspects ;
        $this->trafficlevels = $trafficlevels ;
        $this->currentperformance = $currentperformance ;
        $this->currrenthosting = $currrenthosting ;
        $this->negativehosting = $negativehosting;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web-form');
    }
}