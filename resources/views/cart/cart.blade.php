<x-app-layout>
    <section class="pt-16 bg-white">
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28">
            <div class="w-full flex-col p-4 space-y-4">
                <div class="w-full py-4 border-b border-gray-200">
                    <h1 class="text-2xl font-sans font-medium">YOUR CART</h1>
                </div>
                <div class="w-full flex flex-col space-y-6 md:flex-row md:space-x-8" x-data="productData">

                    <div class="flex flex-col w-full md:w-2/3">

                        @forelse ($cart->products as $product)
                            <div class="w-full flex flex-col space-y-2 border-b border-gray-200 p-4">
                                <div class="w-full flex items-center justify-between">
                                    <div class="flex items-center space-x-8 lg:space-x-10">
                                        <img class="w-24 h-24 md:w-36 md:h-36 rounded" src="{{ $product->image->url }}"
                                            alt="">

                                        <div class="flex flex-col">
                                            <h2
                                                class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                CATEGORY : {{ $product->categories()->first()->name }}</h2>
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                                {{ $product->name }}
                                            </h1>
                                        </div>
                                        <div>
                                            <p>P{{ $product->price }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row justify-enter lg:items-center lg:space-x-3">
                                        <div>
                                            <button @click="openModal({{ $product }})">
                                                <i
                                                    class='bx bx-edit text-gray-400 text-2xl hover:text-sbdlight cursor-pointer'></i>
                                            </button>

                                            <div x-show="modal === product.id" id="modal-{{ $product->id }}">
                                                <div class="modal-box">

                                                    <div class="w-full flex flex-col gap-2">
                                                        <div class="flex gap-2">
                                                            <h1>Size</h1>
                                                            <h1></h1>
                                                        </div>
                                                    </div>

                                                    <div class="modal-action">
                                                        <label for="my-modal-" class="btn">Yay!</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <i
                                            class='bx bx-trash text-gray-400 text-2xl hover:text-red-400 cursor-pointer'></i>
                                    </div>
                                </div>
                            </div>
                        @empty
                            no item
                        @endforelse
                    </div>

                    <div class="w-full md:w-1/3">
                        <div class="w-full flex flex-col space-y-4 p-4 border border-gray-200 rounded shadow">
                            <div class="w-full border-b border-gray-200 pb-4">
                                <h1 class="text-xl text-gray-600 font-medium">SUMMARY</h1>
                            </div>
                            <div class="w-full flex flex-col space-y-6 px-2">
                                <div class="w-full flex justify-between">
                                    <p class="font-medium">ITEMS</p>
                                    <P>{{$cart->products->count()}}</P>
                                </div>
                                <div class="w-full flex justify-between">
                                    <p class="font-medium">TOTAL PRICE</p>
                                    <P>{{$total}}</P>
                                </div>
                            </div>



                            <form action="{{route('client.order.store')}}" method="post">
                                <div class="w-full flex">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <button
                                        class="w-full text-white text-sm bg-sbgreen rounded py-2 px-4">CHECKOUT</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            function productData() {
                return {
                    modal: null,
                    product: null,
                    openModal(data) {

                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
