<?php

namespace App\Livewire\Roles;

use Livewire\Component;

class DeleteRolModalConfirm extends Component
{
    public bool $display = false;

    public $rol_id;

    /**
     * Shows the Modal component.
     *
     * @var bool
     */
    public function handleModal()
    {
        $this->display = true;
    }

    public function render()
    {
        return view('roles.delete-rol-modal-confirm', ['rol_id' => $this->rol_id]);
    }
}
