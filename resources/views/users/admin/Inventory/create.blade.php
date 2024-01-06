<x-panel>
    <div class="w-full flex flex-col items-center justify-center p-4" x-data="supplyScript">

        <div class="w-1/2 p-4 flex flex-col space-y-6">

            @if (Session::has('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                    class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                    <i class='bx bx-check-circle text-white text-xl'></i>
                    <p class="text-white text-sm text-center">{{ Session::get('message') }}</p>
                </div>
            @endif

            <div class="flex">
                <div class="flex-grow">
                    <a href="{{ route('admin.supply.index') }}"
                        class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center w-fit">
                        <i class='bx bx-left-arrow-alt text-2xl text-gray-500 hover:text-gray-800'></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">New Supply</h1>
                <p class="text-sm">This will be added to the list of supplies</p>
            </div>

            <form action="{{ route('admin.supply.store') }}" method="post" class="flex flex-col space-y-4">

                @csrf
                <div class="flex flex-col space-y-2">
                    <div class="flex flex-col space-y-1">
                        <label for="name" class="text-sm">NAME <span class="text-red-500 text-base">*</span></label>
                        <input type="text" name="name" id="name" class="rounded px-4 border border-gray-300">
                        @error('name')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="unit_value" class="text-sm">UNIT VALUE</label>
                        <input type="text" name="unit_value" class="rounded px-4 border border-gray-300"
                            id="unit_value">
                        @error('unit_value')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="unit" class="text-sm">UNIT</label>
                        <input type="text" name="unit" class="rounded px-4 border border-gray-300" id="unit">
                        @error('unit')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="quantity" class="text-sm">QUANTITY</label>
                        <input type="text" name="quantity" class="rounded px-4 border border-gray-300"
                            id="quantity">
                        @error('quantity')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <template x-if="!hiddenInput">
                        <div class="flex flex-col space-y-1" x-cloak>
                            <label for="quantity" class="text-sm">Size</label>
                            <select type="text" name="size" class="rounded px-4 border border-gray-300 capitalize"
                                id="quantity">
                                <option selected disabled>Select Size</option>
                                <option value="small">small</option>
                                <option value="medium"> medium</option>
                                <option value="large">large</option>

                            </select>
                            @error('size')
                                <div class="error text-xs text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </template>

                    <div class="flex flex-col space-y-1">
                        <label for="quantity" class="text-sm">Type</label>
                        <select type="text" name="type" class="rounded px-4 border border-gray-300" id="quantity"
                            @change="selectedType($event)">
                            <option value="">Select Type</option>
                            @forelse ($types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @empty
                                <option value="">No Item</option>
                            @endforelse

                        </select>
                        @error('type')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <template x-if="hiddenInput">
                        <div class="flex flex-col space-y-1">
                            <label for="quantity" class="text-sm">Price</label>
                            <input type="text" name="price" class="rounded px-4 border border-gray-300"
                                id="quantity">
                        </div>
                    </template>
                </div>

                <div class="flex justify-between">
                    <button class="py-2 px-4 rounded text-white bg-sbgreen flex items-center">
                        <i class='bx bx-save mr-2'></i>
                        save
                    </button>
                    <div>
                        <a href="{{ route('admin.supply.type.create') }}"
                            class="py-2 px-4 rounded text-white bg-sbgreen flex items-center">
                            <i class='bx bx-save mr-2'></i>
                            Add Supply Type
                        </a>
                    </div>
                </div>

            </form>
        </div>

        @push('js')
            <script>
                function supplyScript() {
                    return {
                        hiddenInput: false,
                        type: '',
                        selectedType(e) {

                            const selectType = e.target.value.toLowerCase();

                            if (selectType === "addons") {
                                this.hiddenInput = true;
                            } else {
                                this.hiddenInput = false;
                            }
                        }
                    }
                }
            </script>
        @endpush
    </div>
</x-panel>
