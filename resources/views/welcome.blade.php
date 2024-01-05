<x-app-layout>
    <div class="bg-white welcome text-gray-700">
        <x-hero/>
        <x-preview/>
        <x-testimony :feedBacks="$feedBacks"/>
        <x-footer/>
    </div>
</x-app-layout>
