<x-app-layout>
    <section>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-admin-header />
        @else
            <x-header :cart="$cart" :subtotal="$subtotal" />
        @endif
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28 pt-24 bg-white h-screen text-gray-700">

            {{-- x-init="actions.fetchProduct" --}}
            <div class="flex w-full flex-col space-y-2" x-data="sample" x-init="fetchProduct">
                <div class="list w-full flex border-b border-gray-200 py-2 space-x-2">
                    <button @click="getFilterProducts('all')" class="nav py-1 px-4 rounded hover:bg-gray-200">
                        <p>All</p>
                    </button>

                    <template x-for="category in categories" :key="category.id">
                        <button @click="getFilterProducts(category.name)" class="nav py-1 px-3 rounded hover:bg-gray-200">
                            <p x-text="category.name"></p>
                        </button>
                    </template>
                </div>
                @if (Session::has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                        class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                        <i class='bx bx-check-circle text-white text-xl'></i>
                        <p class="text-white text-sm text-center">{{ Session::get('message') }}</p>
                    </div>
                @endif
                <section id="products-container" class="flex w-full flex-wrap gap-2 md:gap-4 relative">
                    <template x-for="product in productsFilter" :key="product.id">

                        <div class="w-full md:w-1/4 flex items-center space-x-2 transition duration-500 ease-in-out border border-gray-200 rounded-md"
                            x-show="!isLoading">
                            <img class="min-w-32 h-28 object-cover object-center rounded" alt="blog"
                                :src="`/media/product/${product.image}`">

                            <div class="w-full p-3">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                    <span x-text="product.categories[0].name"></span>
                                </h2>
                                <h1 class="title-font text-xl font-bold text-gray-900" x-text="product.name">
                                </h1>
                                <div class="rating rating-xs mb-3">

                                    <template x-for="i in 5">
                                        <input type="radio" name="rating-5"
                                            :class="`mask mask-star-2 ${i <= product.cart_avg_rate ? 'bg-yellow-400' : '' }`"
                                            disabled />
                                    </template>
                                    <p>
                                        <span x-text="product.cart_avg_rate === null ? 0 : product.cart_avg_rate"></span>
                                        <span>/5</span>
                                    </p>


                                    {{-- <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-400" disabled />
                                    <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-400" disabled/>
                                    <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-400" disabled/>
                                    <input type="radio" name="rating-5" class="mask mask-star-2 bg-yellow-400" disabled/> --}}
                                </div>
                                <div class="flex items-center justify-between flex-wrap ">
                                    <p class="font-sans font-bold">
                                        &#8369;<span x-text="product.price"></span>
                                    </p>

                                    @if (Auth::user())
                                        <button @click="openModal(product.id)"
                                            class="text-sm rounded font-medium text-blue-700 border border-blue-600 py-1 px-4">Order</button>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-sm rounded font-medium text-blue-700 border border-blue-600 py-1 px-4">Order</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </template>
                </section>
            </div>
        </div>
    </section>

    <script>
        function sample() {
            return {

                products: [],
                categories: [],
                isLoading: false,
                productsFilter: [],
                supplies: [],
                modal: null,
                total: 0,
                quantity: 0,
                size: [{
                    name: null,
                    price: 0
                }],
                isDone: false,
                extras: {
                    data: []
                },
                getFilterProducts(data) {
                    if (data === 'all') {
                        this.productsFilter = this.products;
                    } else {
                        this.productsFilter = this.products.filter((item) => {
                            if (item.categories.length !== 0) {
                                return item.categories[0].name === data;
                            }
                        });
                    }
                },

                async fetchProduct() {
                    try {
                        this.isLoading = true;

                        const response = await axios.get(
                            '/product/data'
                        );

                        this.isLoading = false;
                        this.products = response.data.products;
                        this.categories = response.data.categories;
                        this.productsFilter = response.data.products;
                        this.supplies = response.data.supplies;

                        console.log(response.data.supplies)

                    } catch (error) {
                        console.log(error);
                    }
                },
                openModal(id) {
                    window.location.href = `/client/products/${id}`
                },
            }
        }
    </script>



</x-app-layout>
