@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full']) !!}>

