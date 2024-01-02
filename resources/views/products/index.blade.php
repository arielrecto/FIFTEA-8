<x-app-layout>
    <section>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-admin-header />
        @else
            <x-header :cart="$cart" :subtotal="$subtotal" />
            {{-- <x-guest-header /> --}}
        @endif
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28 pt-24 bg-white h-screen">

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
                <section id="products-container" class="flex w-full flex-wrap relative">
                    <template x-for="product in productsFilter" :key="product.id">

                        <div class="p-4 lg:w-1/4 transition duration-500 ease-in-out" x-show="!isLoading">
                            <div
                                class="h-fit border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  hover:shadow-lg bg-white">
                                <img class="lg:h-80 md:h-60 w-full object-cover object-center" alt="blog"
                                    :src="product.image">
                                <div class="p-3">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        <span x-text="product.categories[0].name"></span>
                                    </h2>
                                    <h1 class="title-font text-xl font-bold text-gray-900 mb-3" x-text="product.name">
                                    </h1>

                                    <div class="flex items-center justify-between flex-wrap ">

                                        <p class="font-sans font-bold">
                                            &#8369;<span x-text="product.price"></span>
                                        </p>

                                        @if (Auth::user())
                                            <button @click="openModal(product.id)"
                                                class="text-sm rounded text-white bg-gradient-to-r from-green-400 to-blue-400 py-2 px-4">Order</button>
                                        @endif
                                        {{-- <div x-show="modal === product.id" x-transition.duration.700ms class="absolute">
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
                                                                <h1 class="text-xl text-sbgreen font-medium">More
                                                                    Details</h1>
                                                            </div>

                                                            <div class="w-full flex items-center space-x-4">
                                                                <div class="w-1/3">
                                                                    <label for="size" class="text-xs">SIZE:</label>
                                                                    <input type="hidden" name="size"
                                                                        :value="size">
                                                                    <input type="hidden" name="price"
                                                                        x-model="size[0].price">
                                                                    <select name="size" id="size"
                                                                        @change="getSize($event, product)"
                                                                        class="w-full rounded">
                                                                        <option selected>Select Size
                                                                        </option>
                                                                        <option value="regular">Regular
                                                                        </option>
                                                                        <template
                                                                            x-for="(size, index) in JSON.parse(product.sizes)"
                                                                            :key="index">
                                                                            <option :value="size.name"><span
                                                                                    x-text="size.name"></span></option>
                                                                        </template>
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

                                                                <div class="w-1/3">>
                                                                    <label for="quantity"
                                                                        class="text-xs">Quantity</label>
                                                                    <input type="number" id="quantity" name="quantity"
                                                                        x-model="quantity" class="w-full rounded"
                                                                        placeholder="0">
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label for="sugar-level" class="text-xs">EXTRAs:</label>
                                                                <div class="flex gap-2 flex-wrap p-2">
                                                                    <template x-for="extra in extras.data"
                                                                        :key="extra.id">
                                                                        <p class="px-2 py-1 bg-white rounded-lg shadow-sm"
                                                                            x-text="extra.name"></p>
                                                                    </template>
                                                                </div>
                                                                <input type="hidden" name="extras"
                                                                    x-model="JSON.stringify(extras)">
                                                                <select id="sugar-level" @change="getExtras($event)"
                                                                    class="w-full rounded">
                                                                    <option selected value=" ">Select Extras
                                                                    </option>
                                                                    <template x-for="supply in supplies"
                                                                        :key="supply.id">
                                                                        <template
                                                                            x-if="supply.types[0].name.toLowerCase() === 'addons'">
                                                                            <option :value="supply.id"
                                                                                x-text="supply.name"></option>
                                                                        </template>
                                                                    </template>
                                                                    <option value="Pearl">Pearl</option>
                                                                    <option value="Nata De Coco">Nata De Coco</option>
                                                                    <option value="Crushed Cookies">Crushed Cookies
                                                                    </option>
                                                                    <option value="Cheesecake">Cheesecake</option>
                                                                    <option value="Cream Puff">Cream Puff</option>
                                                                </select>
                                                            </div>
                                                            <div class="flex">
                                                                <p class="flex gap-2">Total : <span>
                                                                        <p
                                                                            x-text="total.toLocaleString('en-PH', {
                                                                            style: 'currency',
                                                                            currency: 'PHP',
                                                                        });">
                                                                        </p>
                                                                    </span></p>
                                                                <input type="hidden" name="total"
                                                                    :value="total">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center space-x-2 pt-3">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            :value="product.id">
                                                        <template x-if="isDone">
                                                            <button
                                                                class="py-1 px-4 bg-sbgreen text-white rounded flex items-center">
                                                                <i class='bx bx-cart-add text-lg text-white mr-2'></i>
                                                                add
                                                            </button>
                                                        </template>
                                                        <template x-if="!isDone">
                                                            <button @click="costumizeDone($event, product.price)"
                                                                class="py-1 px-4 bg-sbgreen text-white rounded flex items-center">
                                                                <i class='bx bx-cart-add text-lg text-white mr-2'></i>
                                                                Save
                                                            </button>
                                                        </template>
                                                        <a @click="modal = null"
                                                            class="py-1 px-4 text-lg rounded bg-gray-100 hover:bg-gray-200 cursor-pointer">Cancel</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> --}}
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
            // const baseUrl = "http://127.0.0.1:8000";
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
                            baseUrl + '/product/data'
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
                    window.location.href = baseUrl + `/client/products/${id}`
                },
                // getExtras(e) {
                //     if (e.target.value === ' ') return

                //     const id = parseInt(e.target.value)
                //     const data = this.supplies.find(item => item.id === id)

                //     this.extras.data.push(data)
                // },
                // getTotal(price) {

                //     if (this.quantity === 0 || this.extras.data === null) {

                //         this.size = [{
                //             name: 'regular',
                //             price: price
                //         }]
                //         return this.total = price
                //     }

                //     const totalExtrasPrice = this.extras.data.reduce((acc, item) => acc + parseInt(item.types[0].pivot
                //         .price), 0)

                //     const total = (parseInt(this.size[0].price) + totalExtrasPrice) * this.quantity;

                //     this.total = total;
                // },
                // getSize(e, product) {
                //     if (e.target.value === 'regular') {
                //         this.size = [{
                //             name: 'regular',
                //             price: product.price
                //         }]
                //         return
                //     }

                //     const size = JSON.parse(product.sizes).filter((item) => item.name === e.target.value);

                //     console.log(size)

                //     this.size = size;
                // },
                // costumizeDone(e, price) {
                //     e.preventDefault();
                //     const total = this.getTotal(price);
                //     this.isDone = true;
                // }
            }
        }
    </script>



</x-app-layout>
