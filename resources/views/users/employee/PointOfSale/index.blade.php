<x-employee-panel>
    <div class="w-full relative p-5" x-data="pos" x-init="getAllProducts({{ $products }})">
        <div class="w-full flex gap-5">
            <div class="flex flex-grow">
                <div class="w-full flex flex-col gap-2">
                    <div class="p-4">
                        <h1 class="w-full flex justify-center text-xl font-bold">Point of Sale</h1>
                    </div>
                    <div class="flex flex-wrap space-x-5 rounded-l-lg border-2 p-2 h-[38rem]">
                        <template x-for="product in products" :key="product.id">
                            <button @click="select(product)">
                                <div class="w-24 h-24 rounded-lg border-2">
                                    <h1><span x-text="product.name"></span></h1>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>
            <div class="w-1/5 border-2 rounded-l-lg p-2 flex flex-col space-y-2">
                <h1 class="w-full text-xl p-2 border-b-2 text-center font-bold">Selected Product</h1>
                <div class="flex flex-col gap-2 p-2 bg-gray-100 h-96 overflow auto rounded-lg">
                    <template x-for="item in selectedProducts" :key="item.id">
                        <button @click="remove(item)">
                            <div class="rounded-lg border-2 bg-white">
                                <span x-text="item.name"></span>
                            </div>
                        </button>

                    </template>
                </div>
                <div class="w-full">
                    <div>
                        total : <span x-text="subtotal()"></span>
                    </div>
                </div>
                <div class="w-full p-2">
                    <button class="btn w-full" @click="openModal()">Proceed</button>
                </div>
            </div>
        </div>
        <div class="w-1/2 bg-gray-300 rounded-lg h-[30rem] flex flex-col gap-2 absolute z-10
        top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-2"
            x-show="modal" x-transition.duration.700>
            <div class="w-full">
                <h1 class="text-center text-xl font-bold">Payment</h1>
            </div>
            <div class="relative overflow-x-auto flex flex-col gap-2 h-[12rem]">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 sticky top-0">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                item name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                price
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="item in selectedProducts" :key="item.id">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <span x-text="item.name"></span>
                                </th>
                                <td class="px-6 py-4">
                                    <span x-text="item.price"></span>
                                </td>
                                {{-- <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td> --}}
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div>
                total : <span x-text="subtotal()"></span>
            </div>
            <div>
                change : <span x-text="totalChange()"></span>
            </div>
            <div>
                <label for="">Amount</label>
                <input type="text" class="input w-full" placeholder="amount" x-model="amount">
            </div>
            <div class="flex flex-row-reverse">
                <div class="felx gap-2">
                    <button class="btn" @click="sendTransaction()">Pay</button>
                    <button class="btn" @click="openModal()">Close</button>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            function pos() {
                const baseURL = '127.0.0.1:8000';
                return {
                    products: [],
                    selectedProducts: [],
                    modal: false,
                    amount: 0,
                    getAllProducts(data) {
                        this.products = data;
                    },
                    select(data) {


                        this.selectedProducts.push(data)
                        this.products = this.products.filter(item => item.id !== data.id)

                        console.log(this.selectedProducts)
                    },
                    remove(data) {
                        this.products.push(data)
                        this.selectedProducts = this.selectedProducts.filter(item => item.id !== data.id)
                    },
                    subtotal() {
                        let subtotal = 0;
                        this.selectedProducts.forEach(item => {
                            subtotal = subtotal + parseInt(item.price);
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
                                'products' : this.selectedProducts,
                                'type' : 'walk_in',
                                'total' : total
                            };
                            const response = await axios.post('transaction', data, config);
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Success',
                                text : `${response.data.message}`
                            })

                            window.location.reload()

                        } catch (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Order Error',
                                text: `${error.response.data.message}`,
                            })
                        }
                    }
                }
            }
        </script>
    @endpush
</x-employee-panel>
