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
        'Eventos' => [
            'Ver Eventos' => 'event.event',
            'Añadir Eventos' => 'event.EventCrud',
        ],
        'Cursos' => [
            'Visualizar curso' => 'curso.index',
            'Modificar curso' => 'curso.cursoCrud',
        ],
        'finanzas' => [
            'Movimientos' => 'finanzas.index',
        ],
        'Censo' => [
            'Estadistica' => 'user.estadistica',
            'Registrar' => 'members',
        ],
        'Configuración' => 'members',
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
