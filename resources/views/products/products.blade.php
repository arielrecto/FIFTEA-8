<x-app-layout>
    <section class="pt-20 bg-white">
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28">

<<<<<<< HEAD
            <div class="flex flex-col space-y-2" x-data="useProduct" x-init="actions.fetchProduct">
=======
            <div class="w-full flex flex-col space-y-2">
>>>>>>> 3d52564dcbffc70e7021e1bee02880fa9d493b27

                <div class="w-full flex border-b border-gray-200">
                    <ul class="w-full flex space-x-4 py-3">

                        <template x-for="category in state.categories" :key="category.id">
                            <button @click="getters.getData(state.products, category.id)" id="milktea" class="nav py-1 px-4 rounded hover:bg-gray-200">
                                <p x-text="category.name"></p>
                            </button>
                        </template>
                    </ul>
                </div>

<<<<<<< HEAD
                <section id="products-container" class="flex w-full flex-wrap">

                    <template x-for="product in state.products" :key="product.id">
=======
                    <x-products-milktea/>

                    <x-products-siomai/>
>>>>>>> 3d52564dcbffc70e7021e1bee02880fa9d493b27

                        <div class="p-4 lg:w-1/4 transition duration-500 ease-in-out">
                            <div
                                class="h-fit border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  hover:shadow-lg bg-white">
                                <img class="lg:h-80 md:h-60 w-full object-cover object-center"
                                    src="{{ asset('images/tea.jpg') }}" alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        CATEGORY</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3" x-text="product.name">
                                    </h1>
                                    <div class="flex items-center justify-between flex-wrap ">

                                        <p class="font-sans text-sbblack" x-text="product.price"></p>

                                        <label for="my-modal"
                                            class="text-sm text-white bg-sbgreen rounded py-1 px-4">ORDER</label>

                                        <input type="checkbox" id="my-modal" class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box">

                                                <div>
                                                    dito yung mg add ons
                                                </div>

                                                <div class="modal-action">
                                                    <label for="my-modal" class="btn">Yay!</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </template>

<<<<<<< HEAD
=======
                    <x-products-chicken/>
>>>>>>> 3d52564dcbffc70e7021e1bee02880fa9d493b27

                </section>

            </div>
        </div>
    </section>
</x-app-layout>



<script src="{{asset('js/products/useProduct.js')}}">

</script>
