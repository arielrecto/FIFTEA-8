<x-employee-panel>
    <div class="w-full md:p-5 py-5 flex flex-col space-y-2" x-data="pos" x-init="getAllProducts({{ $products }})">

        <div class="md:p-4 py-4 pb-3 bg-sbgreen w-full rounded flex items-center justify-start">
            <h1 class="text-white text-xl font-bold">Point of Sale</h1>
        </div>

        <div class="w-full flex flex-col-reverse md:flex-row md:space-x-4 ">

            <div class="w-full md:w-3/4 flex flex-grow 0">
                <div class="w-full flex items-start justify-start flex-col h-[590px] overflow-y-auto space-y-2">
                    <template x-for="product in products" :key="product.id">
                        <button @click="select(product)"
                            class="w-full border border-gray-300 p-2 hover:bg-gray-300 rounded">
                            <div class="flex justify-between">
                                <h1 x-text="product.name" class="text-left"></h1>
                                <i class='bx bx-plus text-xl text-gray-600'></i>
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

                        <template x-for="item in selectedProducts" :key="item.id">
                            <button @click="remove(item)">
                                <div
                                    class="border border-gray-300 py-1 px-2 rounded flex justify-between items-center hover:bg-gray-200">
                                    <span x-text="item.name" class="text-left"></span>
                                    <i class='bx bx-x'></i>
                                </div>
                            </button>
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
                        <button class="py-2 px-8 rounded text-white bg-sbgreen" @click="sendTransaction()">Pay</button>
                        <button class="py-2 px-6 rounded bg-gray-200 " @click="openModal()">Close</button>
                    </div>
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


                        if (this.selectedProducts.includes(data) && this.selectedProducts.length !== 0) {
                            return
                        }

                        this.selectedProducts.push(data)
                        // this.products = this.products.filter(item => item.id !== data.id)

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
        </script>
    @endpush
</x-employee-panel>
