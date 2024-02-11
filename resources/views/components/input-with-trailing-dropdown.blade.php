@props(['disabled' => false])

<div>
    <div class="relative mt-2 col-span-6 sm:col-span-4 rounded-md shadow-sm ">
        
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <span class="text-orange-500 sm:text-sm">$</span>
        </div>

        <input type="text" name="price" id="price"
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-sky-400 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 rounded-md shadow-sm']) !!}
        
        style="height: 42px"
        placeholder="0.00">

        <div class="absolute inset-y-0 right-0 flex items-center">
            <label for="currency" class="sr-only">Currency</label>
            
            <select id="currency" name="currency"
                class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm">
                <option>USD</option>
                <option>CAD</option>
                <option>EUR</option>
            </select>
            
        </div>
    </div>
</div>
