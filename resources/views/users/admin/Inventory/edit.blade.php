<x-panel>
    <div class="w-full flex flex-col items-center justify-center md:p-4 py-4" x-data="supplyScript">

        <div class="w-full md:w-1/2 md:p-4 py-4 flex flex-col space-y-6">

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
                <h1 class="text-2xl font-semibold text-sbgreen">Edit Supply</h1>
                <p class="text-sm">This will be reflect to the list of supplies</p>
            </div>

            <form action="{{ route('admin.supply.update', ['supply' => $supply->id]) }}" method="post" class="flex flex-col space-y-4">
                @method('put')
                @csrf
                <div class="flex flex-col space-y-2">
                    <div class="flex flex-col space-y-1">
                        <label for="name" class="text-sm">NAME <span class="text-red-500 text-base">*</span></label>
                        <input type="text" name="name" id="name" class="rounded px-4 border border-gray-300" value="{{$supply->name}}">
                        @error('name')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="unit_value" class="text-sm">UNIT VALUE</label>
                        <input type="number" step="any" name="unit_value" class="rounded px-4 border border-gray-300"
                            id="unit_value" value="{{$supply->unit_value}}">
                        @error('unit_value')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="unit" class="text-sm">UNIT</label>
                        <input type="text" name="unit" value="{{ $supply->unit}}" class="rounded px-4 border border-gray-300" id="unit">
                        @error('unit')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="quantity" class="text-sm">QUANTITY</label>
                        <input type="number" name="quantity" value="{{ $supply->quantity}}" class="rounded px-4 border border-gray-300"
                            id="quantity">
                        @error('quantity')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col space-y-1">
                        <label for="quantity" class="text-sm">EXPIRATION DATE</label>
                        <input type="date" name="expiration_date" value="{{ $supply->expiration_date }}" @change="checkIfExpirationDate"  x-model="date" class="rounded px-4 border border-gray-300"
                            id="quantity">
                        @error('expiration_date')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                        <template x-if="'not_valid_date' in error">
                            <div class="error text-xs text-red-600"> <span x-text="error.not_valid_date"></span> </div>
                        </template>
                    </div>


                    <div class="pt-4">
                        <div class="flex items-end space-x-1 h-8 w-full mt-2">
                            <div class="h-full w-full bg-red-200 flex items-center justify-center rounded">
                                <span class="text-red-600 text-sm">Low Stock</span>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <span class="text-sm text-center font-semibold">Low</span>
                                <input type="number" name="low" value="{{ $supply->low }}" class="h-8 w-20 rounded border border-gray-200">
                            </div>
                            {{-- value="{{ $limit->low }}" --}}
                            <div class="h-full w-full bg-green-200 flex items-center justify-center rounded">
                                <span class="text-green-600 text-sm">Normal Stock</span>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <span class="text-sm text-center font-semibold">High</span>
                                <input type="number" name="high" value="{{ $supply->high }}" class="h-8 w-20 rounded border border-gray-200">
                            </div>
                            {{-- value="{{ $limit->high }}" --}}
                            <div class="h-full w-full bg-yellow-200  flex items-center justify-center rounded">
                                <span class="text-yellow-600 text-sm">Over Stock</span>
                            </div>
                        </div>
                            @error('low')
                                <div class="error text-xs text-red-600">{{ $message }}</div>
                            @enderror
                            @error('high')
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
                    <button class="py-2 px-4 rounded text-white bg-sbgreen flex items-center" :disabled="!is_valid">
                        <i class='bx bx-save mr-2'></i>
                        Update
                    </button>
                    {{-- <div>
                        <a href="{{ route('admin.supply.type.create') }}"
                            class="py-2 px-4 rounded text-white bg-sbgreen flex items-center">
                            <i class='bx bx-save mr-2'></i>
                            Add Supply Type
                        </a>
                    </div> --}}
                </div>

            </form>
        </div>

        @push('js')
            <script>
                function supplyScript() {
                    return {
                        hiddenInput: false,
                        type: '',
                        is_valid: true,
                        date : null,
                        error : {

                        },
                        selectedType(e) {

                            const selectType = e.target.value.toLowerCase();

                            if (selectType === "addons") {
                                this.hiddenInput = true;
                            } else {
                                this.hiddenInput = false;
                            }
                        },
                        checkIfExpirationDate(){
                            const selectedDate = new Date(this.date)
                            const currentDate = new Date();



                            if (selectedDate < currentDate){

                                console.log(this.date, 'not valid date');
                                this.error = {
                                    'not_valid_date' : `The Date is not Valid ${this.date}`
                                }



                                this.is_valid = false

                                return
                            }


                            this.is_valid = true
                            this.error = {

                            }

                        }
                    }
                }
            </script>
        @endpush
    </div>
</x-panel>
