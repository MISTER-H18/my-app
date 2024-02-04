<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownSearchBar extends Component
{
    public $selectedItem= '';
    public $optionName = '';
    public $options = []; 

    public $valueNameField = '';
    public $slotNameField = '';

    public function mount()
    {
        $this->options;

        $this->valueNameField;
        $this->slotNameField;
    }

    public function render()
    {
        return view('livewire.dropdown-search-bar');
    }
}
