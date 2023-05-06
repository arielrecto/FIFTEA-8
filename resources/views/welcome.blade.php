<x-app-layout>

    <body>
        <div x-data="sample()">
            <span x-text="count"></span>

            <button @click="add">+</button>
        </div>
    </body>

    <script src="{{ asset('js/sample.js') }}"></script>

</x-app-layout>
