<x-panel>
    <section class="w-full flex flex-col items-start p-4 pt-6 space-y-2">
        <div class="w-full items-center justify-start py-2 px-4  bg-sblight">
            <h1 class="font-medium text-white text-xl">LIST OF PRODUCTS</h1>
        </div>
        @if (Session::has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                <i class='bx bx-check-circle text-white text-xl'></i>
                <p class="text-white text-sm text-center" >{{Session::get('message')}}</p>
            </div>
        @endif
        <div class="w-full flex flex-col">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border border-gray-400 ">
                    <thead>
                        <tr>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">NAME</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">DESCRIPTION</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">PRICE</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">DATE ADDED</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count())
                            @foreach ($products as $product)
                                <tr>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $product->name }}</td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-left">
                                        {!! $product->description !!}
                                    </td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $product->price }}
                                    </td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $product->created_at }}</td>

                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 ">
                                        <div class="flex space-x-2">

                                            <form
                                                action="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button>
                                                    <i
                                                        class='bx bx-trash text-red-500 text-xl rounded hover:bg-red-50 cursor-pointer py-1 px-2'></i>
                                                </button>
                                            </form>

                                            <div>
                                                <label for="my-modal" class="p-0 m-0">
                                                    <i
                                                        class='bx bx-edit text-blue-500 text-xl cursor-pointer rounded hover:bg-blue-50 py-1 px-2'></i>
                                                </label>
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
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</x-panel>
