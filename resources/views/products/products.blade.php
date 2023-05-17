<x-app-layout>
    <section class="pt-20 bg-white">
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28">

            <div class="flex flex-col space-y-2">

                <x-products-nav/>

                <section id="products-container">

                    {{-- <x-products-milktea/> --}}

                    {{-- <x-products-siomai/>

                    <x-products-waffle/>

                    <x-products-chicken/> --}}

                </section>
                
            </div>
        </div>
    </section>
</x-app-layout>
<script src="js/products-nav.js"></script>