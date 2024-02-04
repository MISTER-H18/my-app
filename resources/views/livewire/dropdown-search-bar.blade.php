<div>
    <div wire:ignore>
        <select id="select2"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            autofocus>

            @foreach ($options as $option)
                <x-option name="{{ $optionName }}" value="{{ $option->$valueNameField }}">{{ $option->$slotNameField }}</x-option>
            @endforeach

        </select>
    </div>

    <p>{{ $selectedItem }}</p>

    <script>
        
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                let myValue = $('#select2').select2("val");
                let myText = $('#select2 option:selected').text()      
                @this.set('selectedItem', myText);    
            });
        });
    </script>
</div>
