<x-app-layout>
    <section>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-admin-header />
        @else
            <x-header :cart="$cart" :subtotal="$subtotal" />
        @endif
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28 pt-24">

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
                    <div class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ Session::get('message') }}</span>
                    </div>
                @endif
                <section id="products-container" class="flex w-full flex-wrap relative">
                    <template x-for="product in productsFilter" :key="product.id">

                        <div class="p-4 lg:w-1/4 transition duration-500 ease-in-out" x-show="!isLoading">
                            <div
                                class="h-fit border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  hover:shadow-lg bg-white">
                                <img class="lg:h-80 md:h-60 w-full object-cover object-center" alt="blog"
                                    :src="product.image.url">
                                <div class="p-6 bg-gradient-to-tr from-sbdlight to-white">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        CATEGORY : <span x-text="product.categories[0].name"></span> </span></h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3" x-text="product.name">
                                    </h1>
                                    <div class="flex items-center justify-between flex-wrap ">

                                        <p class="font-sans text-sbblack" x-text="product.price"></p>

                                        <button @click="openModal(product.id)"
                                            class="text-sm text-white bg-sbgreen rounded py-1 px-4">ORDER</button>
                                        <div x-show="modal === product.id" x-transition.duration.700ms class="absolute">
                                            <div class="modal-box w-auto">
                                                <form action="{{ route('client.cart.add') }}" method="post">
                                                    <div class="flex space-x-4 items-center">
                                                        <div class="w-64 h-64 h-full">
                                                            <img src="{{ asset('images/hero.png') }}" alt=""
                                                                class="h-full w-full">
                                                        </div>

                                                        <div class="flex flex-col space-y-2">
                                                            <div class="flex items-center space-x-2">
                                                                <i class='bx bx-info-circle text-sbgreen text-xl'></i>
                                                                <h1 class="text-xl text-sbgreen font-medium">More Details</h1>
                                                            </div>

                                                            <div class="w-full flex items-center space-x-4">
                                                                <div class="w-1/3">
                                                                    <label for="size" class="text-xs">SIZE:</label>
                                                                    <select name="size" id="size" name="size"
                                                                        class="w-full rounded">
                                                                        <option value="small">Small</option>
                                                                        <option value="medium">Medium</option>
                                                                        <option value="large">Large</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="w-1/3">
                                                                    <label for="sugar-level" class="text-xs">SUGAR
                                                                        LEVEL:</label>
                                                                    <select id="sugar-level" name="sugar_level"
                                                                        class="w-full rounded">
                                                                        <option value="0">0%</option>
                                                                        <option value="0.25">25%</option>
                                                                        <option value="0.5">50%</option>
                                                                        <option value="0.75">75%</option>
                                                                        <option value="1">100%</option>
                                                                    </select>
                                                                </div>

                                                                <div class="w-1/3">
                                                                    <label for="quantity"
                                                                        class="text-xs">Quantity</label>
                                                                    <input type="number" id="quantity" name="quantity"
                                                                        class="w-full rounded" placeholder="0">
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label for="sugar-level" class="text-xs">EXTRAs:</label>
                                                                <select name="extras" id="sugar-level"
                                                                    class="w-full rounded">
                                                                    <option value="Pearl">Pearl</option>
                                                                    <option value="ata De Coco">Nata De Coco</option>
                                                                    <option value="Crushed Cookies">Crushed Cookies
                                                                    </option>
                                                                    <option value="Cheesecake">Cheesecake</option>
                                                                    <option value="Cream Puff">Cream Puff</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center space-x-2 pt-3">
                                                        @csrf
                                                        <input type="hidden" name="product_id" :value="product.id">
                                                        <button class="py-1 px-4 bg-sbgreen text-white rounded flex items-center">
                                                            <i class='bx bx-cart-add text-lg text-white mr-2'></i>
                                                            add
                                                        </button>
                                                        <a @click="modal = null" class="py-1 px-4 text-lg rounded bg-gray-100 hover:bg-gray-200 cursor-pointer">Cancel</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
            const baseUrl = "http://localhost:8000";
            return {

                products: [],
                categories: [],
                isLoading: false,
                productsFilter: [],
                modal : null,

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
                            baseUrl + '/product/data'
                        );

                        this.isLoading = false;
                        this.products = response.data.products;
                        this.categories = response.data.categories;
                        this.productsFilter = response.data.products;

                    } catch (error) {
                        console.log(error);
                    }
                },
                openModal(id){
                    this.modal = id
                }
            }
        }
    </script>



</x-app-layout>
