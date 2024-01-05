<x-app-layout>
    <x-user-header />
    <section>
        <div class="max-w-[1300px] mx-auto px-4 pt-24" x-data="product">
            <a href="{{ route('products') }}"
                class="rounded bg-gray-200 hover:bg-gray-300 px-4 py-1 flex items-center w-fit">
                <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                back
            </a>
            <div class="flex items-center justify-between space-x-4 py-4">
                <img src="/{{ $product->image }}" alt=""
                    class="object object-cover object-center w-[500px] h-[400px] rounded bg-gray-300">
                <form action="{{ route('client.cart.add') }}" method="POST" class="flex flex-col space-y-3 w-full">

                    @csrf

                    <span class="text-base font-semibold text-gray-400">{{ $product->categories[0]->name }}</span>
                    <h1 class="text-4xl font-bold ">{{ $product->name }}</h1>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <p class="text-base text-gray-600">{!! $product->description !!}</p>
                    <div class="flex items-center space-x-8">
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Sugar Level</label>
                            <select name="sugar_level" id=""
                                class="w-[150px] rounded px-4 py-2 text-sm border border-gray-300">
                                <option value="0">0%</option>
                                <option value="0.25">25%</option>
                                <option value="0.5">50%</option>
                                <option value="0.75">75%</option>
                                <option value="1">100%</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1" x-init="initAddOns({{ $supplies }})">
                            <label for="" class="text-base font-semibold">Extras</label>
                            <select name="extras" id="" @change="changeProductPriceByAddons($event)"
                                class="w-[200px] rounded px-4 py-2 text-sm border border-gray-300">
                                <option selected value="">Select Extras</option>

                                <template x-for="add in addons" id="add.id">
                                    <option :value="add.name"><span x-text="add.name"></span></option>
                                </template>

                                {{--
                                @forelse ($extras as $extra)
                                    <option value="Pearl">{{ $extra->name }}</option>
                                @empty
                                    <option disabled>No Exteas Available</option>s
                                @endforelse --}}
                            </select>
                        </div>
                    </div>
                    <div class="flex items-start space-x-8">
                        <div class="flex flex-col space-y-1" x-init="initSetSizes({{ $sizes }})">
                            <label for="" class="text-base font-semibold">Size</label>
                            <select name="size" id=""
                                class="w-[150px] rounded px-4 py-2 text-sm border border-gray-300"
                                @change="changeProductPriceBySize($event)">
                                <option selected value="">Select Size</span></option>
                                <template x-for="size in sizes" :id="size.id">
                                    <option :value="size.name"><span x-text="size.name"></span></option>
                                </template>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Quatity</label>
                            <div class="flex items-center space-x-2">
                                <button class="py-1 px-2 hover:bg-gray-200 rounded"
                                    @click="changeQuantity($event, 'minus')">
                                    <i class='bx bx-minus text-lg'></i>
                                </button>
                                <p
                                    class="py-1 px-4 rounded border border-gray-300 bg-gradient-to-r from-green-400 to-blue-400 text-white">
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
                                class="px-4 py-2 rounded text-sm bg-gradient-to-r from-green-400 to-blue-400 text-white">Place
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
                    addon : null,
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

                        this.totalPrice()
                    },
                    changeProductPriceByAddons(e) {
                        const name = e.target.value;
                        const addon = this.addons.find((item) => item.name === name);
                        if (name == '') {

                            if(this.addon !== null) {
                                this.price = this.price - parseInt(this.addon.pivot.price)
                            }

                            this.totalPrice()
                            return
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
