<x-panel>
    <section class="w-full flex flex-col items-start md:p-4 pt-6 space-y-2">
        <div class="print-logo hidden items-center justify-start space-x-6 mb-4">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-28 h-28">
            </div>
            <div class="flex flex-col items-start justify-start">
                <p class="text-2xl font-semibold">Fif'Tea-8</p>
                <span class="text-sm">Brgy. San Nicolas III, Bacoor City</span>
                <span class="text-sm">shop@fiftea8.com</span>
                <span class="text-sm">09123456789</span>
            </div>
        </div>
        <div class="print-head w-full flex items-center justify-between py-2 px-4  bg-sblight rounded">
            <h1 class="font-medium text-white text-xl">LIST OF PRODUCTS</h1>
            <form action="{{route('admin.products.index')}}" method="GET" class="flex items-center space-x-3">
                <input type="text" name="filter" class="print-hidden text-sm px-4 py-2 rounded bg-inherit border border-gray-200 placeholder:text-white" placeholder="Search here..">
                <button class="print-hidden px-4 py-2 rounded text-sm bg-white text-sbgreen">Search</button>
                <a id="print-btn" class="flex items-center rounded border border-white px-4 py-2 text-sm text-white cursor-pointer">
                    <i class='bx bx-printer text-white mr-2'></i>
                    Print
                </a>
            </form>
        </div>
        @if (Session::has('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                <i class='bx bx-check-circle text-white text-xl'></i>
                <p class="text-white text-sm text-center">{{ Session::get('message') }}</p>
            </div>
        @endif
        <div class="w-full flex flex-col verflow-x-auto">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border border-gray-400 ">
                    <thead>
                        <tr>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">NAME</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">DESCRIPTION</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">SIZES</th>
                            <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">PRICE</th>
                            {{-- <th class="poppins text-sm border border-gray-400 px-4 py-2 text-center">DATE ADDED</th> --}}
                            <th class="action-head poppins text-sm border border-gray-400 px-4 py-2 text-center">ACTION</th>
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
                                    <td
                                        class="poppins text-sm border border-gray-400 px-4 py-2 text-center   ">
                                        @php
                                            $sizes = json_decode($product->sizes);
                                        @endphp
                                        @foreach ($sizes as $size)
                                            {{ $size->name }} ,
                                        @endforeach
                                    </td>
                                    <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        &#8369; {{ $product->price }}
                                    </td>
                                    {{-- <td class="poppins text-sm border border-gray-400 px-4 py-2 text-center">
                                        {{ $product->created_at }}</td> --}}

                                    <td class="action-body poppins text-sm border border-gray-400 px-4 py-2 ">
                                        <div class="flex space-x-2 items-center justify-center">

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

                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}">
                                                    <label for="my-modal" class="p-0 m-0">
                                                        <i
                                                            class='bx bx-edit text-blue-500 text-xl cursor-pointer rounded hover:bg-blue-50 py-1 px-2'></i>
                                                    </label>
                                                </a>
                                                <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">
                                                    <i class='bx bx-show text-xl text-green-600 rounded hover:bg-green-50 cursor-pointer py-1 px-2'></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="w-full py-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <script>
        const elements = document.querySelectorAll(".print-hidden");
        const printBtn = document.getElementById("print-btn");
        const printPadding = document.querySelector(".print-padding");
        const background = document.querySelector(".background");
        const printHead = document.querySelector(".print-head");
        const actionHead = document.querySelector(".action-head");
        const actionBody = document.querySelector(".action-body");
        const printLogo = document.querySelector(".print-logo");

        printBtn.addEventListener("click", () => {
            elements.forEach((el) => {
                el.classList.add("hidden");
                el.classList.remove("container");
            });
            printLogo.classList.replace("hidden", 'flex');
            actionHead.classList.add("hidden");
            actionBody.classList.add("hidden");
            printHead.classList.remove("bg-sblight");
            printHead.classList.add("bg-gray-700");
            printPadding.classList.remove("pt-16");
            printPadding.classList.remove("px-5");
            printPadding.classList.remove("container");
            printPadding.classList.remove("md:px-10");
            background.classList.remove("bg-gray-50");
            printBtn.classList.add("hidden");
            window.print();
            elements.forEach((el) => {
                el.classList.remove("hidden");
            });
            printLogo.classList.replace("flex", 'hidden');
            actionHead.classList.remove("hidden");
            actionBody.classList.remove("hidden");
            printHead.classList.add("bg-sblight");
            printHead.classList.remove("bg-gray-700");
            printPadding.classList.add("pt-16");
            printPadding.classList.add("px-5");
            printPadding.classList.add("container");
            printPadding.classList.add("md:px-10");
            background.classList.add("bg-gray-50");
            printBtn.classList.remove("hidden");
        });
    </script>
</x-panel>
