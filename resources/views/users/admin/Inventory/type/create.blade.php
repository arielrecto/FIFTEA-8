<x-panel>
    <div class="w-full flex flex-col items-center justify-center py-4 md:p-4">

        <div class="w-full md:w-1/2 md:p-4 py-4 flex flex-col space-y-6">

            @if (Session::has('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                    <i class='bx bx-check-circle text-white text-xl'></i>
                    <p class="text-white text-sm text-center" >{{Session::get('message')}}</p>
                </div>
            @endif

            <div>
                <a href="{{route('admin.supply.create')}}" class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center w-fit">
                    <i class='bx bx-left-arrow-alt text-2xl text-gray-500 hover:text-gray-800'></i>
                </a>
            </div>

            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">New Supply Type</h1>
                <p class="text-sm">This will be added to the list of supplies Type</p>
                <p class="text-sm">Note: input "addons" if the supply has a additional price in the produc to show the price input field in the add supply form
                </p>
            </div>

            <form action="{{ route('admin.supply.type.store') }}" method="post" class="flex flex-col space-y-4">

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
            <div class="overflow-x-auto">

                    @forelse ($types as $type)
                    <div class="w-full flex items-center justify-between px-2 py-1 rounded border border-gray-300">
                        <span>{{$type->name}}</span>
                        <div>
                            <a href="{{route('admin.supply.type.edit', ['type' => $type->id])}}">
                                <i class='bx bxs-edit-alt text-blue-600'></i>
                            </a>
                        </div>
                      </div>
                    @empty
                    <div class="py-5 flex items-center justify-center">
                        <span class="text-red-500 text-sm">No Type</span>
                    </div>
                    @endforelse

            </div>
        </div>

    </div>
</x-panel>
