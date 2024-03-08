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
        'Events' => [
            'Ver Eventos' => 'event.event',
            'Añadir Eventos' => 'event.EventCrud',
            'And Another Label' => 'members',
        ],
        'Cursos' => [
            'Visualizar curso' => 'curso.index',
            'Modificar curso' => 'curso.cursoCrud',
        ],
        'finanzas' => [
            'Estadisticas' => 'dashboard',
            'Registrar mov.' => 'members',
        ],
        'Censo' => [
            'Estadistica' => 'dashboard',
            'Registrar' => 'members',
        ],
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
