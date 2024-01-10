<x-employee-panel>
    <div class="w-full md:p-5 py-5 flex flex-col space-y-2" x-data="pos" x-init="getAllProducts({{ $products }})">

        <div class="md:p-4 py-4 pb-3 bg-sbgreen w-full rounded flex items-center justify-start">
            <h1 class="text-white text-xl font-bold">Point of Sale</h1>
        </div>
        <div class="w-full flex flex-col-reverse md:flex-row md:space-x-4">

            <div class="w-full md:w-3/4 flex flex-col flex-grow">
                <div class="w-full flex items-center border-b border-gray-300 py-2">
                    <span class="text-sm text-gray-700 font-semibold mr-2">Filter Products:</span>
                    <a href="{{ route('employee.pos.index') }}"
                        class="text-sm text-gray px-4 py-2 hover:bg-gray-200">All</a>

                    @foreach ($categories as $category)
                        <a
                            href="{{ route('employee.pos.index') }}?category={{ $category->name }}"class="text-sm text-gray px-4 py-2 hover:bg-gray-200">{{ $category->name }}</a>
                    @endforeach
                    {{-- <a href="" class="text-sm text-gray px-4 py-2 hover:bg-gray-200">Siomai</a> --}}
                </div>
                <div class="w-full flex flex-wrap gap-4 h-[590px] overflow-auto space-y-2">
                    <template x-for="product in products" :key="product.id">
                        <button @click="addCustomizeProduct(product)"
                            class="w-fit h-fit border border-gray-300 p-2 bg-white hover:shadow-md rounded">
                            <div class="flex flex-col items-start justify-start space-y-1">
                                <div class="">
                                    <img :src="`/media/product/${product.image}`" alt=""
                                        class="w-36 h-32 object-center object-cover rounded">
                                </div>
                                <div>
                                    <h1 x-text="product.name" class="text-left font-semibold"></h1>
                                    <h1 class="text-left text-sm">&#8369; <span x-text="product.price"></span></h1>
                                </div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <div class="w-full md:w-1/4 h-fit border border-gray-300 flex flex-col rounded mb-4 md:mb-">
                <div class="border-b border-gray-300 p-2">
                    <h1 class="w-full text-base text-sbgreen text-center font-bold">SELECTED PRODUCTS</h1>
                </div>

                <div class="p-2">
                    <div class="flex flex-col space-y-1 p-1 h-96 overflow-y-auto">

                        <template x-for="(item, index) in selectedProducts" :key="index">

                            <div
                                class="w-full relative border border-gray-300 py-1 px-2 rounded flex justify-between items-start ">
                                <div class="w-full flex flex-col gap-2">
                                    <div class="w-full flex items-center space-x-2">
                                        <img :src="`/media/product/${item.image}`" alt="" srcset=""
                                            class="h-8 w-8 rounded object object-center">
                                        <span x-text="item.name" class="text-left"></span>
                                    </div>

                                    <div
                                        class="w-full flex items-center justify-between border-t border-dashed border-gray-200 py-1">
                                        <span class="w-full text-xs font-semibold">Price</span>
                                        <p class="text-xs">&#8369;<span x-text="item.total"> </span></p>
                                    </div>

                                    <div
                                        class="w-full flex items-center justify-between border-t border-dashed border-gray-200 py-1">
                                        <span class="w-full text-xs font-semibold">Quantity</span>
                                        <span x-text="item.quantity" class="text-xs"></span>
                                    </div>

                                    <div
                                        class="w-full flex items-center justify-between border-t border-dashed border-gray-200 py-1">
                                        <span class="w-full text-xs font-semibold">Sugar Level</span>
                                        <span class="text-xs">25%</span>
                                    </div>

                                    <div class="flex flex-col space-y-1">
                                        <span
                                            class="w-full border-b border-dashed border-gray-200 text-xs font-semibold">Size</span>
                                        <div class="w-full flex items-center justify-between ">
                                            <span class="text-xs">Small</span>
                                            <span class="text-xs">&#8369;10</span>
                                        </div>
                                    </div>

                                    <template x-if="item.addon !== null">
                                        <div class="flex flex-col space-y-1">
                                            <span
                                                class="w-full border-b border-dashed border-gray-200 text-xs font-semibold">Extra</span>
                                            <div class="w-full flex items-center justify-between ">
                                                <span class="text-xs" x-text="`${item.addon.name}`"></span>
                                                <span class="text-xs"
                                                    x-text="`${item.addon.pivot.price}`">&#8369;10</span>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="w-full flex items-center justify-between border-t border-gray-400 py-1">
                                        <span class="w-full text-sm font-semibold">Total</span>
                                        <span class="text-xs">&#8369;60</span>
                                    </div>

                                    <template x-if="item.addon !== null">
                                        <p class="text-sm">
                                            <span class="font-semibold">Extra : </span>
                                        <p href="">
                                            &#8369;
                                            <span x-text="`${item.addon.name} (${item.addon.pivot.price})`"
                                                class="text-xs"></span>
                                        </p>
                                        </p>
                                    </template>

                                </div>

                                <button class="absolute top-2 right-2" @click="remove(index)"><i
                                        class='bx bx-x hover:text-red-500 hover:bg-gray-200'></i></button>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="w-full p-2">
                    <div class="flex items-center justify-between px-1 py-3">
                        <span class="text-base">TOTAL:</span>
                        <span x-text="subtotal()" class="text-base"></span>
                    </div>
                    <button class="py-2 px-4 rounded bg-sbgreen text-white w-full" @click="openModal()">Proceed</button>
                </div>

            </div>
        </div>
        <template x-if="customizeProduct !== null">
            <div aria-hidden="true"
                class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-modal md:h-full bg-white bg-opacity-20">
                <div class="relative p-4 w-[80%]  h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Customize Order
                            </h3>
                            <button type="button" @click="customizeProduct = null"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div>
                            <div class="h-full">
                                <div class="flex flex-col md:flex-row items-center justify-between md:space-x-4 py-4">
                                    <img :src="`/media/product/${customizeProduct.image}`" alt=""
                                        class="object object-cover object-center w-[600px] h-[400px] rounded bg-gray-300">
                                    {{-- src="{{ route('media.product', ['name' => $product->image])}}" --}}

                                    <form @submit.prevent="addToSelectionProduct(customizeProduct)"
                                        class="flex flex-col space-y-3 w-full">
                                        @csrf
                                        <span class="text-base font-semibold text-gray-400"></span>
                                        {{-- {{ $product->categories[0]->name }} --}}
                                        <h1 class="text-4xl font-bold "></h1> {{-- {{ $product->name }} --}}
                                        <input type="hidden" name="product_id"> {{-- value="{{ $product->id }}" --}}
                                        <input type="hidden" name="price"> {{-- value="{{ $product->price }}" --}}

                                        <p class="text-base text-gray-600"></p> {{-- {!! $product->description !!} --}}
                                        <div
                                            class="w-full flex flex-col md:flex-row items-center md:space-x-8 space-y-4 md:space-y-0">
                                            <div class="w-full flex flex-col space-y-1">
                                                <label for="" class="text-base font-semibold">Sugar
                                                    Level</label>
                                                <select name="sugar_level" x-model="sugar_level" id=""
                                                    class="w-full  rounded px-4 py-2 text-sm border border-gray-300">
                                                    <option value="0">0%</option>
                                                    <option value="0.25">25%</option>
                                                    <option value="0.5">50%</option>
                                                    <option value="0.75">75%</option>
                                                    <option value="1">100%</option>
                                                </select>
                                            </div>
                                            <div class="w-full flex flex-col space-y-1" x-init="initAddOns({{ $supplies }})">
                                                {{--  x-init="initAddOns({{ $supplies }})" --}}
                                                <label for="" class="text-base font-semibold">Extras</label>
                                                <select id="" @change="changeProductPriceByAddons($event)"
                                                    class="w-full  rounded px-4 py-2 text-sm border border-gray-300">
                                                    <option selected value="">Select Extras</option>

                                                    <template x-for="add in addons" id="add.id">
                                                        <option :value="add.name"><span
                                                                x-text="`${add.name} (₱ ${add.pivot.price})`"></span>
                                                        </option>
                                                    </template>
                                                </select>
                                                <input type="hidden" name="extras" x-model="JSON.stringify(addon)">
                                            </div>
                                        </div>
                                        <div class="w-full flex items-start space-x-8">
                                            <div class="w-full flex flex-col space-y-1" x-init="initSetSizes(customizeProduct.sizes)">
                                                {{--  x-init="initSetSizes({{ $sizes }})" --}}
                                                <label for="" class="text-base font-semibold">Size</label>
                                                <select name="size" x-model="size" id=""
                                                    class="w-[full rounded px-4 py-2 text-sm border border-gray-300"
                                                    @change="changeProductPriceBySize($event)">
                                                    <option selected value="">Select Size</span></option>
                                                    <template x-for="(size, index) in sizes">
                                                        <option :value="size.name"><span
                                                                x-text="`${size.name}(₱ ${size.price})`"></span>
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="w-full flex flex-col space-y-1">
                                                <label for="" class="text-base font-semibold">Quatity</label>
                                                <div class="w-full flex items-center space-x-2">
                                                    <button class="py-1 px-2 hover:bg-gray-200 rounded"
                                                        @click="changeQuantity($event, 'minus')">
                                                        <i class='bx bx-minus text-lg'></i>
                                                    </button>
                                                    <p
                                                        class="py-1 px-4 rounded border border-gray-300 bg-green-600 text-white">
                                                        <span x-text="quantity"></span>
                                                        <input type="hidden" name="quantity" x-model="quantity">
                                                    </p>
                                                    <button class="py-1 px-2 hover:bg-gray-200 rounded"
                                                        @click="changeQuantity($event, 'add')">
                                                        <i class='bx bx-plus text-lg'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <div class="w-full flex items-center justify-between border-t border-gray-200 py-3"
                                                x-init="initPrice(customizeProduct.price)">
                                                {{--  x-init="initPrice({{ $product->price }})" --}}
                                                <input type="hidden" name="total" x-model="total">
                                                <p class="font-bold text-lg">&#8369; <span x-text="total"></span></p>
                                                <button class="px-4 py-2 rounded text-sm bg-green-700 text-white">Place
                                                    Order</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <div class="w-[90%] md:w-1/2 bg-white shadow-2xl border border-gray-300 rounded-md  flex flex-col gap-2 absolute z-10 top-[200px] left-1/2 transform -translate-x-1/2 p-4"
            x-show="modal">

            <div class="w-full flex justify-start items-center space-x-2">
                <i class='bx bx-credit-card text-xl'></i>
                <h1 class="text-center text-base font-bold">PAYMENT</h1>
            </div>

            <div class="relative overflow-x-auto flex flex-col gap-2 h-[12rem]">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700">
                        <tr>
                            <th scope="col" class=" text-sm border border-white px-4 py-2 text-left">ITEM NAME</th>
                            <th scope="col" class=" text-sm border border-white px-4 py-2 text-left">PRICE</th>
                    </thead>

                    <tbody>
                        <template x-for="item in selectedProducts" :key="item.id">
                            <tr class="border-b">
                                <td scope="row" class="px-2 py-2 text-base text-gray-800">
                                    <span x-text="item.name"></span>
                                </td>
                                <td class="px-2 py-2 text-base text-gray-800">
                                    <span x-text="item.price"></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>


            <div class="flex flex-col space-y-1">
                <div class="flex items-center justify-between px-1">
                    <span class="text-base">TOTAL:</span>
                    <span x-text="subtotal()" class="text-base"></span>
                </div>

                <div class="flex items-center justify-between px-1">
                    <span class="text-base">CHANGE:</span>
                    <span x-text="totalChange()" class="text-base"></span>
                </div>

                <div
                    class="flex flex-col items-start justify-between p-2 border border-gray-300 rounded bg-white bg-opacity-70">
                    <span class="text-sm">AMOUNT:</span>
                    <input type="text" class="border border-gray-200 rounded w-full text-sm" placeholder="amount"
                        x-model="amount">
                </div>




                <div class="flex flex-row-reverse">
                    <div class="flex items-center space-x-2 py-2">
                        <button class="py-2 px-8 rounded text-white bg-sbgreen"
                            @click="sendTransaction()">Pay</button>
                        <button class="py-2 px-6 rounded bg-gray-200 " @click="openModal()">Close</button>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- modal -->
    {{-- <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-[80%]  h-full md:h-auto">

            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Customize Order
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div>
                    <div class="h-full" x-data="product">
                        <div class="flex flex-col md:flex-row items-center justify-between md:space-x-4 py-4">
                            <img alt=""
                                class="object object-cover object-center w-[600px] h-[400px] rounded bg-gray-300">


                            <form action="{{ route('client.cart.add') }}" method="POST"
                                class="flex flex-col space-y-3 w-full">
                                @csrf
                                <span class="text-base font-semibold text-gray-400"></span>
                                <h1 class="text-4xl font-bold "></h1>
                                <input type="hidden" name="product_id">
                                <input type="hidden" name="price">

                                <p class="text-base text-gray-600"></p>
                                <div
                                    class="w-full flex flex-col md:flex-row items-center md:space-x-8 space-y-4 md:space-y-0">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="" class="text-base font-semibold">Sugar Level</label>
                                        <select name="sugar_level" id=""
                                            class="w-full  rounded px-4 py-2 text-sm border border-gray-300">
                                            <option value="0">0%</option>
                                            <option value="0.25">25%</option>
                                            <option value="0.5">50%</option>
                                            <option value="0.75">75%</option>
                                            <option value="1">100%</option>
                                        </select>
                                    </div>
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="" class="text-base font-semibold">Extras</label>
                                        <select id="" @change="changeProductPriceByAddons($event)"
                                            class="w-full  rounded px-4 py-2 text-sm border border-gray-300">
                                            <option selected value="">Select Extras</option>

                                            <template x-for="add in addons" id="add.id">
                                                <option :value="add.name"><span
                                                        x-text="`${add.name} (₱ ${add.pivot.price})`"></span></option>
                                            </template>
                                        </select>
                                        <input type="hidden" name="extras" x-model="JSON.stringify(addon)">
                                    </div>
                                </div>
                                <div class="w-full flex items-start space-x-8">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="" class="text-base font-semibold">Size</label>
                                        <select name="size" id=""
                                            class="w-[full rounded px-4 py-2 text-sm border border-gray-300"
                                            @change="changeProductPriceBySize($event)">
                                            <option selected value="">Select Size</span></option>
                                            <template x-for="size in sizes" :id="size.id">
                                                <option :value="size.name"><span
                                                        x-text="`${size.name}(₱ ${size.price})`"></span></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="" class="text-base font-semibold">Quatity</label>
                                        <div class="w-full flex items-center space-x-2">
                                            <button class="py-1 px-2 hover:bg-gray-200 rounded"
                                                @click="changeQuantity($event, 'minus')">
                                                <i class='bx bx-minus text-lg'></i>
                                            </button>
                                            <p
                                                class="py-1 px-4 rounded border border-gray-300 bg-green-600 text-white">
                                                <span x-text="quantity"></span>
                                                <input type="hidden" name="quantity" x-model="quantity">
                                            </p>
                                            <button class="py-1 px-2 hover:bg-gray-200 rounded"
                                                @click="changeQuantity($event, 'add')">
                                                <i class='bx bx-plus text-lg'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <div
                                        class="w-full flex items-center justify-between border-t border-gray-200 py-3">

                                        <input type="hidden" name="total" x-model="total">
                                        <p class="font-bold text-lg">&#8369; <span x-text="total"></span></p>
                                        <button class="px-4 py-2 rounded text-sm bg-green-700 text-white">Place
                                            Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div> --}}
    @push('js')
        <script>
            function pos() {
                const baseURL = '127.0.0.1:8000';
                return {
                    products: [],
                    selectedProducts: [],
                    modal: false,
                    amount: 0,
                    customizeProduct: null,
                    price: 0,
                    prev_price: 0,
                    total: 0,
                    quantity: 1,
                    sizes: [],
                    addons: [],
                    sugar_level: null,
                    addon: null,
                    size: null,
                    initSetSizes(sizes) {
                        const data = JSON.parse(sizes);
                        console.log(data);
                        this.sizes = [...data]
                    },
                    initAddOns(addons) {
                        this.addons = [...addons]
                        console.log(this.addons);
                    },
                    changeQuantity(e, operator) {
                        e.preventDefault();
                        if (operator.toLowerCase() === 'add') {
                            this.quantity++
                            this.totalPrice()
                            return
                        }
                        if (this.quantity <= 0) return
                        this.quantity--
                        this.totalPrice()
                    },
                    initPrice(price) {
                        console.log(price);
                        this.price = price
                        this.prev_price = price
                        this.totalPrice()
                    },
                    totalPrice() {
                        this.total = this.price * this.quantity
                    },
                    changeProductPriceBySize(e) {
                        const name = e.target.value;
                        if (name == '') {
                            this.price = this.prev_price
                            this.totalPrice()
                            return
                        }
                        const size = this.sizes.find((size) => size.name === name);
                        this.price = parseInt(size.price);
                        this.addon = null

                        this.totalPrice()
                    },
                    changeProductPriceByAddons(e) {
                        const name = e.target.value;
                        const addon = this.addons.find((item) => item.name === name);
                        if (name == '') {

                            if (this.addon !== null) {
                                this.price = parseInt(this.price) - parseInt(this.addon.pivot.price)
                            }
                            this.addon = null
                            this.totalPrice()
                            return
                        }


                        if(this.addon !== addon && this.addon !== null){
                            this.price = this.price - parseInt(this.addon.pivot.price)
                        }


                        this.addon = addon
                        this.price = parseInt(this.price) + parseInt(addon.pivot.price)

                        this.totalPrice()
                    },
                    addToSelectionProduct(customizeProduct) {
                        console.log(customizeProduct)
                        const data = {
                            ...customizeProduct,
                            total: this.total,
                            price: this.price,
                            sugar_level: this.sugar_level,
                            addon: this.addon,
                            size: this.size,
                            quantity: this.quantity
                        }

                        this.selectedProducts.push(data);

                        this.customizeProduct = null

                        console.log(this.selectedProducts);
                    },
                    addCustomizeProduct(data) {
                        console.log('costomize product', data);
                        this.customizeProduct = {
                            ...data
                        }
                        this.price = 0;
                        this.prev_price = 0;
                        this.total = 0;
                        this.quantity = 1;
                        this.sizes = [];
                        this.addons = [];
                        this.sugar_level = null;
                        this.addon = null;
                        this.size = null;
                    },
                    closeCustomizeProduct() {
                        this.customizeProduct = null;
                        this.price = 0;
                        this.prev_price = 0;
                        this.total = 0;
                        this.quantity = 1;
                        this.sizes = [];
                        this.addons = [];
                        this.sugar_level = null;
                        this.addon = null;
                        this.size = null;
                    },



                    getAllProducts(data) {
                        this.products = data;
                    },
                    select(data) {


                        if (this.selectedProducts.includes(data) && this.selectedProducts.length !== 0) {
                            return
                        }

                        this.selectedProducts.push(data)
                        // this.products = this.products.filter(item => item.id !== data.id)

                        console.log(this.selectedProducts)
                    },
                    remove(index) {
                        this.selectedProducts.splice(index, 1)
                    },
                    subtotal() {
                        let subtotal = 0;
                        this.selectedProducts.forEach(item => {
                            subtotal = subtotal + parseInt(item.total);
                        });

                        return subtotal.toLocaleString('en-PH', {
                            style: 'currency',
                            currency: 'PHP'
                        });
                    },
                    openModal() {
                        this.modal = !this.modal
                    },
                    totalChange() {
                        let total = 0;
                        let subTotal = parseFloat(this.subtotal().replace(/[^0-9.-]+/g, ""));

                        if (subTotal === 0) {
                            return total.toLocaleString('en-PH', {
                                style: 'currency',
                                currency: 'PHP'
                            });;
                        }

                        if (this.amount === 0) {
                            return total.toLocaleString('en-PH', {
                                style: 'currency',
                                currency: 'PHP'
                            });;
                        }
                        total = this.amount - subTotal;

                        return total.toLocaleString('en-PH', {
                            style: 'currency',
                            currency: 'PHP'
                        });;
                    },
                    async sendTransaction() {
                        try {

                            const config = {
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            }

                            const total = parseFloat(this.subtotal().replace(/[^0-9.-]+/g, ""));

                            const data = {
                                'products': this.selectedProducts,
                                'type': 'walk_in',
                                'total': total
                            };
                            const response = await axios.post('transaction', data, config);
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Success',
                                text: `${response.data.message}`
                            })

                            window.location.reload()

                        } catch (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Order Error',
                                text: `${error.response.data.message}`,
                            })
                        }
                    },
                }
            }

            // function product() {
            //     return {
            //         price: 0,
            //         prev_price: 0,
            //         total: 0,
            //         quantity: 1,
            //         sizes: [],
            //         addons: [],
            //         addon: null,
            //         initSetSizes(sizes) {
            //             console.log(sizes);
            //             this.sizes = [...sizes]
            //         },
            //         initAddOns(addons) {
            //             this.addons = [...addons]
            //             console.log(this.addons);
            //         },
            //         changeQuantity(e, operator) {
            //             e.preventDefault();
            //             if (operator.toLowerCase() === 'add') {
            //                 this.quantity++
            //                 this.totalPrice()
            //                 return
            //             }
            //             if (this.quantity <= 0) return
            //             this.quantity--
            //             this.totalPrice()
            //         },
            //         initPrice(price) {
            //             this.price = price
            //             this.prev_price = price
            //             this.totalPrice()
            //         },
            //         totalPrice() {
            //             this.total = this.price * this.quantity
            //         },
            //         changeProductPriceBySize(e) {
            //             const name = e.target.value;
            //             if (name == '') {
            //                 this.price = this.prev_price
            //                 this.totalPrice()
            //                 return
            //             }
            //             const size = this.sizes.find((size) => size.name === name);
            //             this.price = parseInt(size.price);

            //             this.totalPrice()
            //         },
            //         changeProductPriceByAddons(e) {
            //             const name = e.target.value;
            //             const addon = this.addons.find((item) => item.name === name);
            //             if (name == '') {

            //                 if (this.addon !== null) {
            //                     this.price = this.price - parseInt(this.addon.pivot.price)
            //                 }

            //                 this.totalPrice()
            //                 return
            //             }

            //             this.addon = addon
            //             this.price = this.price + parseInt(addon.pivot.price)

            //             this.totalPrice()
            //         }
            //     }
            // }
        </script>
    @endpush
</x-employee-panel>
