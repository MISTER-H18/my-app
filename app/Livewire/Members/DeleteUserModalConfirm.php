<?php

namespace App\Livewire\Members;

use Livewire\Component;

class DeleteUserModalConfirm extends Component
{
    public bool $display = false;

    public $user_id;

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
        return view('members.delete-user-modal-confirm', ['user_id' => $this->user_id]);
    }
}
