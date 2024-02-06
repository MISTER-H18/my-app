<div>

    <style>
        /* main width for the select2 input */
        .select2-container {
            width: 100% !important;
        }

        /* styles for the default select input */
        .select2-container--default .select2-selection--single {
            height: 42px;
            padding: 0.5rem 0.75rem;
            margin-top: 0.25rem;
            font-size: 1rem;
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
            border-radius: 0.375rem;
            box-sizing: border-box;
            border-style: solid;
        }

        .select2-container--default .select2-selection--single:focus {
            border-color: rgb(99 102 241);
            --tw-ring-color: rgb(99 102 241);
            outline-color: var(--tw-ring-color);
            border-width: 2px;
        }

        /* styles for the dropdown */
        .select2-dropdown.select2-dropdown--below {
            width: fit-content;
        }

        /*These two style sentences are aplied for the rendered text on the select2 component*/
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0 !important;
            color: #030303;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5rem;
        }

        /* styles for the selection arrow */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            background-color: unset;
            margin: inherit;
            width: 40px;
            height: 42px;
            position: absolute;
            top: 0.85rem;
            right: -0.75rem;
        }

        /* background color for all the options */
        .select2-results__option--selectable {
            background-color: ;
        }

        /* background color for all the options and for the search input*/
        .select2-dropdown.select2-dropdown--below {
            background-color: ;
        }

        /* background color for the previous selected item */
        .select2-container--default .select2-results__option--selected {
            background-color: #ddd;
        }

        /* background color for the selected item */
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: rgb(99 102 241);
            color: white;
        }

        /* styles for the default search input */
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-color: #aaa;
        }

        .select2-search--dropdown {
            background-color: unset;
        }

        /* .select2-search__field[type="search"]:focus,{
            box-shadow: red !important;
        } */
    </style>

    <div wire:ignore>

        <select name="{{ $optionName }}" id="select2">

            @foreach ($options as $option)
                <x-option name="{{ $optionName }}"
                    value="{{ $option->$valueNameField }}">{{ $option->$slotNameField }}</x-option>
            @endforeach

        </select>
    </div>

    <script>
        $(document).ready(function() {
        
            $('#select2').select2();

            $('#select2').on('change', function(e) {
                let data = $('#select2').select2("val");
                @this.set('selectedItem', data);
            });

            $('b[role="presentation"]').hide();

            $('.select2-container--default .select2-selection--single .select2-selection__arrow')
            .append('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>');

        });
    </script>
</div>
