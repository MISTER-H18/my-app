<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownSearchBar extends Component
{
    public $optionName = ''; //input name -> occupation
    public $selectedItem; 
    public $options = []; // Array with the database values

    // represents database fields
    public $valueNameField = ''; //id
    public $slotNameField = ''; //job_title

    public function mount()
    {
        $this->options;

        $this->valueNameField; //id
        $this->slotNameField; //job_title

    }

    public function render()
    {
        return view('livewire.dropdown-search-bar');
    }
}
