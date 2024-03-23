<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationMenu extends Component
{

    public array $collection = [
        // 'menuItem' => 'routeName'
        'Dashboard' => 'dashboard',
        'Members' => 'members',
        'Evento' => 'event.event',
        'Cursos' => [
            'Ver Cursos' => 'curso.index',
            'Crear Curso' => 'curso.create',
        ],
        // 'Another Stuff' => [
        //     'More Stuff' => 'dashboard',
        //     'And Even More Stuff' => 'members',
        // ],
        // 'Another Things' => [
        //     'More Things' => 'dashboard',
        //     'And Even More Things' => 'members',
        // ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.navigation-menu');
    }
}
