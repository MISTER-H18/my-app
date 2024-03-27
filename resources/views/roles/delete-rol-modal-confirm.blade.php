<div>
    <x-danger-button wire:click="handleModal" wire:loading.attr="disabled">
        {{ __('Delete') }}
    </x-danger-button>

    <x-dialog-modal wire:model.live="display">
        <x-slot name="title">
            {{ __('Delete') }} {{ __('Roles') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Está seguro de que desea eliminar este rol de la base de datos?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('display')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <form class="inline-block" action="{{ route('roles.destroy', $rol_id) }}" method="post">
                @csrf
                @method('delete')

                <x-danger-button class="ms-3" type="submit" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
