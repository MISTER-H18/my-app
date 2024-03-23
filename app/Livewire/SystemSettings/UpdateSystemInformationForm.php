<?php

namespace App\Livewire\SystemSettings;

use Livewire\Component;

class UpdateSystemInformationForm extends Component
{
    public string $system_name = '';

    public function mount()
    {
        $this->system_name = config('app.name');
    }

    public function updateSystemInformation()
    {
        $envFilePath = base_path('.env');
        $contents = file_get_contents($envFilePath);

        if (file_exists($envFilePath)) {
            file_put_contents($envFilePath,
                str_replace('APP_NAME=' . strval(config('app.name')), 'APP_NAME=' . strval($this->system_name), $contents));
        }
    }

    public function render()
    {
        return view('system-settings.update-system-information-form');
    }
}
