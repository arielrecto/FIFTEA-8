<x-panel>
    <div class="w-full flex flex-col items-center justify-center p-4">

        <div class="w-1/2 p-4 flex flex-col space-y-6">

            @if (Session::has('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                    class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                    <i class='bx bx-check-circle text-white text-xl'></i>
                    <p class="text-white text-sm text-center">{{ Session::get('message') }}</p>
                </div>
            @endif

            <div>
                <a href="{{ route('admin.products.create') }}"
                    class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center w-fit">
                    <i class='bx bx-left-arrow-alt text-2xl text-gray-500 hover:text-gray-800'></i>
                </a>
            </div>

            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">New Category</h1>
                {{-- <p class="text-sm">This will be added to the list of supplies Type</p>
                <p class="text-sm">Note: input "addons" if the supply has a additional price in the produc to show the price input field in the add supply form
                </p> --}}
            </div>

            <form action="{{ route('admin.category.store') }}" method="post" class="flex flex-col space-y-4">

                @csrf
                <div class="flex flex-col space-y-2">
                    <div class="flex flex-col space-y-1">
                        <label for="name" class="text-sm">NAME <span class="text-red-500 text-base">*</span></label>
                        <input type="text" name="name" id="name" class="rounded px-4 border border-gray-300">
                        @error('name')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div>
                    <button class="py-2 px-4 rounded text-white bg-sbgreen flex items-center">
                        <i class='bx bx-save mr-2'></i>
                        save
                    </button>
                </div>

            </form>

            <div class="flex flex-col space-y-3">
                <span class="text-lg font-semibold text-gray-700">Current Categories</span>
                <div class="flex flex-col space-y-2">
                    @foreach ($categories as $category)
                        <div class="w-full flex items-center justify-between border border-gray-200 p-2 rounded">
                            <p class="text-sm text-gray-700">{{ $category->name }}</p>
                            <div class="flex items-center space-x-4">
                                <a href="{{route('admin.category.edit', ['category' => $category->id])}}" data-modal-target="default-modal" data-modal-toggle="default-modal">
                                    <i class='bx bxs-edit text-sm text-blue-600'></i>
                                </a>
                                <form action="{{route('admin.category.destroy', ['category' => $category->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button>
                                        <i class='bx bx-trash text-sm text-red-600'></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>


            <!-- Main modal -->

        </div>

    </div>
</x-panel>
