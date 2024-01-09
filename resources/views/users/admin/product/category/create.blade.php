<x-panel>
    <div class="w-full flex flex-col items-center justify-center p-4">

        <div class="w-1/2 p-4 flex flex-col space-y-6">

            @if (Session::has('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                    <i class='bx bx-check-circle text-white text-xl'></i>
                    <p class="text-white text-sm text-center" >{{Session::get('message')}}</p>
                </div>
            @endif

            <div>
                <a href="{{route('admin.products.create')}}" class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center w-fit">
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
                    <div class="w-full flex items-center justify-between border border-gray-200 p-2 rounded">
                        <p class="text-sm text-gray-700">Name</p>
                        <div class="flex items-center space-x-4">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal">
                                <i class='bx bxs-edit text-sm text-blue-600'></i>
                            </button>
                            <form action="">
                                <i class='bx bx-trash text-sm text-red-600'></i>
                            </form>
                        </div>
                    </div>

                    <div class="w-full flex items-center justify-between border border-gray-200 p-2 rounded">
                        <p class="text-sm text-gray-700">Name</p>
                        <div class="flex items-center space-x-4">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal">
                                <i class='bx bxs-edit text-sm text-blue-600'></i>
                            </button>
                            <form action="">
                                <i class='bx bx-trash text-sm text-red-600'></i>
                            </form>
                        </div>
                    </div>

                    <div class="w-full flex items-center justify-between border border-gray-200 p-2 rounded">
                        <p class="text-sm text-gray-700">Name</p>
                        <div class="flex items-center space-x-4">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal">
                                <i class='bx bxs-edit text-sm text-blue-600'></i>
                            </button>
                            <form action="">
                                <i class='bx bx-trash text-sm text-red-600'></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full ">

                    <!-- Modal content -->
                    <form class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-5 flex flex-col space-y-2">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                            <h1 class="text-lg font-semibold">Update Category Name</h1>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-sm">Category Name</span>
                            <input type="text" class=" w-full px-4 py-2 text-sm border border-gray-400 rounded" placeholder="Category">
                        </div>
                        <button class="w-fit text-xs bg-blue-600 rounded px-4 py-2 text-white">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-panel>
