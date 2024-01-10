<x-app-layout>
    <x-user-header />
    <section>
        <div class="h-screen md:h-full max-w-[1300px] mx-auto px-4 pt-24 text-gray-700" x-data="product">
            <a href="{{ route('products') }}"
                class="rounded bg-gray-200 hover:bg-gray-300 px-4 py-1 flex items-center w-fit">
                <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                back
            </a>
            <div class="flex flex-col md:flex-row items-center justify-between md:space-x-4 py-4">
                <img src="{{ route('media.product', ['name' => $product->image])}}" alt=""
                    class="object object-cover object-center w-[500px] h-[400px] rounded bg-gray-300">

                <form action="{{ route('client.cart.add') }}" method="POST" class="flex flex-col space-y-3 w-full">
                    @csrf
                    <span class="text-base font-semibold text-gray-400">{{ $product->categories[0]->name }}</span>
                    <h1 class="text-4xl font-bold ">{{ $product->name }}</h1>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <p class="text-base text-gray-600">{!! $product->description !!}</p>
                    <div class="w-full flex flex-col md:flex-row items-center md:space-x-8 space-y-4 md:space-y-0">
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
                        <div class="w-full flex flex-col space-y-1" x-init="initAddOns({{ $supplies }})">
                            <label for="" class="text-base font-semibold">Extras</label>
                            <select  id="" @change="changeProductPriceByAddons($event)"
                                class="w-full  rounded px-4 py-2 text-sm border border-gray-300">
                                <option selected value="">Select Extras</option>

                                <template x-for="add in addons" id="add.id">
                                    <option :value="add.name"><span x-text="`${add.name} (₱ ${add.pivot.price})`"></span></option>
                                </template>
                            </select>
                            <input type="hidden" name="extras"  x-model="JSON.stringify(addon)">
                        </div>
                    </div>
                    <div class="w-full flex items-start space-x-8">
                        <div class="w-full flex flex-col space-y-1" x-init="initSetSizes({{ $sizes }})">
                            <label for="" class="text-base font-semibold">Size</label>
                            <select id=""
                                class="w-[full rounded px-4 py-2 text-sm border border-gray-300"
                                @change="changeProductPriceBySize($event)">
                                <option selected value="">Select Size</span></option>
                                <template x-for="size in sizes" :id="size.id">
                                    <option :value="size.name"><span x-text="`${size.name}(₱ ${size.price})`"></span></option>
                                </template>
                            </select>
                            <input type="hidden" x-model="JSON.stringify(size)" name="size">
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
                            x-init="initPrice({{ $product->price }})">
                            <input type="hidden" name="total" x-model="total">
                            <p class="font-bold text-lg">&#8369; <span x-text="total"></span></p>
                            <button
                                class="px-4 py-2 rounded text-sm bg-green-700 text-white">Place
                                Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            function product() {
                return {
                    price: 0,
                    prev_price: 0,
                    total: 0,
                    quantity: 1,
                    sizes: [],
                    addons: [],
                    addon: null,
                    size : null,
                    initSetSizes(sizes) {
                        console.log(sizes);
                        this.sizes = [...sizes]
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
                        this.size = size;

                        this.totalPrice()
                    },
                    changeProductPriceByAddons(e) {
                        const name = e.target.value;
                        const addon = this.addons.find((item) => item.name === name);
                        if (name == '') {

                            if (this.addon !== null) {
                                this.price = this.price - parseInt(this.addon.pivot.price)
                            }
                            this.addon = null
                            this.totalPrice()
                            return
                        }


                        if(this.addon !== addon && this.addon !== null){
                            this.price = this.price - parseInt(this.addon.pivot.price)
                        }

                        this.addon = addon
                        this.price = this.price + parseInt(addon.pivot.price)

                        this.totalPrice()
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
