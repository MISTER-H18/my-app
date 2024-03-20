<div>
    <x-danger-button wire:click="handleModal" wire:loading.attr="disabled">
        {{ __('Delete') }}
    </x-danger-button>

    <x-dialog-modal wire:model.live="display">
        <x-slot name="title">
            {{ __('Delete') }} {{ __('Members') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user from the database?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('display')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <form class="inline-block" action="{{ route('members.destroy', $user_id) }}" method="post">
                @csrf
                @method('delete')

                <x-danger-button class="ms-3" type="submit" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
