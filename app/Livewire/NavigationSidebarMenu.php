<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationSidebarMenu extends Component
{
    // https://flowbite.com/docs/components/drawer/
    
    public bool $isSubLinkOpen = false;

    public array $collection = [
        // 'menuItem' => 'routeName'
        'Dashboard' => 'dashboard',
        'Members' => 'members',
        'Others' => [
            'Label' => 'dashboard',
            'Another Label' => 'members',
        ],
        'More stuff' => [
            'More Labels' => 'dashboard',
            'And Another Stuff' => 'members',
        ],
    ];

    // public function handleSubLink(){
    //     $this->isSubLinkOpen = !$this->isSubLinkOpen;
    // }

    public function render()
    {
        return view('livewire.navigation-sidebar-menu');
    }
}
