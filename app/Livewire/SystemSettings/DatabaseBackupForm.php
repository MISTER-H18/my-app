<?php

namespace App\Livewire\SystemSettings;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use ZipArchive;

class DatabaseBackupForm extends Component
{
    public bool $display = false;

    public string $password = "";
    public string $hashedPassword = "";

    public string $errorResponse = "";

    /**
     * Shows the Modal component.
     *
     * @var bool
     */
    public function handleModal()
    {
        $this->display = true;
    }

    /**
     * Handle the database download.
     *
     * @var void
     */
    public function downloadDataBase()
    {

        $password = $this->password;
        $hashedPassword = $this->hashedPassword = auth()->user()->password;

        if (Hash::check($password, $hashedPassword)) {

            $DBHost = config('database.connections.' . config('database.default') . '.host');
            $DBName = config('database.connections.' . config('database.default') . '.database');
            $DBUserName = config('database.connections.' . config('database.default') . '.username');
            $DBPassword = config('database.connections.' . config('database.default') . '.password');

            $currentDateTime = Carbon::now('America/Caracas')->format('d_m_Y__h_i_s');

            $sqlFileName = $DBName . '__' . $currentDateTime . '.sql';

            $dump = "mysqldump -h$DBHost -u$DBUserName -p$DBPassword --opt $DBName > $sqlFileName";

            system($dump, $output);

            $zip = new ZipArchive;

            $zipFileName = $DBName . "__" . $currentDateTime . ".zip";

            if ($zip->open(public_path($zipFileName), ZipArchive::CREATE) == true) {
                $zip->addFile($sqlFileName, basename($sqlFileName));
                $zip->close();

                header("Location: $zipFileName");

                unlink(public_path($sqlFileName));

                return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);

            } else {
                return $this->errorResponse = 'Error, failed to create zip file.';
            }

        } else {
            return $this->errorResponse = 'The password is incorrect.';
        }

    }

    public function render()
    {
        return view('system-settings.database-backup-form', ['errorResponse' => $this->errorResponse]);
    }
}
