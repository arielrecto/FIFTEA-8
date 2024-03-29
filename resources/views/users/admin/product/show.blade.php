<x-panel>
    <div class="w-full flex flex-col pt-8 md:px-4 relative">
        <a href="{{ route('admin.products.index') }}" class="rounded border border-gray-200 hover:bg-gray-200 px-4 py-1 mb-4 flex items-center w-fit text-gray-700 text-sm">
            <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
            back
        </a>
        <div class="">
            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">Product </h1>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex items-center space-x-4 py-2">
                <img src="{{ route('media.product', ['name' => $product->image]) }}" alt="" srcset=""
                    class="h-64 w-64 object object-center rounded">

                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold">{{ $product->name }}</h1>
                    <p class="text-sm">{!! $product->description !!}</p>
                    <p class="font-semibold">{{ $product->price }}</p>
                </div>
            </div>


            @if ($product->supplies === null)
                <div class="flex flex-col gap-2 w-full" x-data="suppliesData" x-init="initSizes({{ $product->sizes }}), initSupplies({{ $supplies }})">
                    <div class="flex flex-col gap-5 w-full">
                        <template x-if="supplies.length > 0">
                            <div class="grid grid-cols-3 grid-flow-row w-full">
                                <template x-for="supply in supplies">
                                    <div class="grid grid-cols-3 grid-flow-row w-full">
                                        <div class="h-auto w-full flex flex-col gap-2 border-2 rounded-lg p-2">
                                            <div class="flex justify-between">
                                                <h1>
                                                    <span>size : </span>
                                                    <span x-text="supply.size"> </span>
                                                </h1>
                                                <button class="btn btn-xs btn-error"
                                                    @click="removeSupplyDataFromSupplies(supply)">
                                                    close
                                                </button>
                                            </div>

                                            <template x-for="item in supply.supplies">
                                                <h1 class="flex w-full gap-5">
                                                    <span x-text="`${item.name}:`"></span>
                                                    <span x-text="item.quantity"></span>
                                                </h1>
                                            </template>
                                        </div>
                                    </div>
                                </template>

                            </div>

                        </template>

                        <template x-for="(size, index) in sizes" :key="index">
                            <div class="flex flex-col gap-2 border border-gray-200 rounded p-2">
                                <div class="flex justify-between">
                                    <h1 class="text-lg font-bold gap-2">
                                        <span x-text="size.name"></span>
                                    </h1>

                                    <button class="text-xs border border-green-200 text-green-600 px-4 py-2 rounded"
                                        @click="addSupplyForm(index, size.name)">
                                        Setup
                                    </button>
                                </div>

                                <template x-if="formIndex === index">
                                    <div class="flex flex-col gap-2">
                                        {{-- <h1>
                                            Inventory
                                        </h1> --}}
                                        <div>

                                        </div>
                                        <p class="">Filter</p>
                                        <div class="flex justify-between" x-init="$watch('search', value => searchSupply(value))">
                                            <div class="">
                                                <button class="text-xs bg-teal-500 text-white font-semibold uppercase px-2 py-1 rounded" @click="filterSupplies('small', 'sizes')">Small</button>
                                                <button class="text-xs bg-teal-500 text-white font-semibold uppercase px-2 py-1 rounded" @click="filterSupplies('medium', 'sizes')">Medium</button>
                                                <button class="text-xs bg-teal-500 text-white font-semibold uppercase px-2 py-1 rounded" @click="filterSupplies('large', 'sizes')">Large</button>
                                                @foreach ($types as $type)
                                                    <button class="text-xs bg-teal-500 text-white font-semibold uppercase px-2 py-1 rounded" @click="filterSupplies('{{$type->name}}', 'type')">{{$type->name}}</button>
                                                @endforeach
                                            </div>
                                            <input type="text" class="input input-accent bg-gray-100" placeholder="search" x-model.debounce.500ms="search">
                                        </div>

                                        <div class="flex flex-wrap gap-2 w-full p-2 border border-gray-200 rounded">
                                            <template x-for="supply in blueprintSupplies" :key="supply.id">
                                                <button
                                                    class="text-sm border border-gray-300 rounded px-4 py-2 flex items-center"
                                                    @click="addSupplyField(supply)">
                                                    <span x-text="supply.name"></span> |
                                                    <template x-if="supply.size !== null">
                                                        <span>
                                                            <p x-text="supply.size" class="text-xs"></p>
                                                        </span>
                                                    </template>
                                                </button>
                                            </template>
                                        </div>

                                        <div class="flex flex-col items-start space-y-2">
                                            <template x-for="field in suppliesForm.fields" :key="field.id">
                                                <div
                                                    class="flex items-center space-x-2 border border-gray-300 p-2 rounded">
                                                    <h1><span x-text="field.name" class="text-sm"></span></h1>
                                                    <input type="number" x-model="field.quantity"
                                                        class="hidden w-20 border border-gray-300 rounded px-2 py-1 text-xs">
                                                    <button @click="removeSupplyField(field)" class="">
                                                        <i class='bx bx-trash text-sm text-red-600'></i>
                                                    </button>
                                                </div>
                                            </template>
                                        </div>

                                        <button @click="addSupplyDataFromToSupplies(suppliesForm)"
                                            class="w-fit px-6 py-2 text-xs bg-blue-700 text-white rounded">
                                            Add
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <form action="{{ route('admin.products.show', ['product' => $product->id]) }}" method="get">

                            @csrf
                            <input type="hidden" x-model="JSON.stringify(supplies)" name="supply">
                            <button class="px-4 py-2 text-white text-sm bg-blue-700 rounded">Save</button>
                        </form>
                    </div>
                </div>
            @else
                <div>
                    @php
                        $supplies = json_decode($product->supplies);
                    @endphp

                    @foreach ($supplies as $supply)
                        <div class="flex flex-col gap-2">
                            <h1>{{ $supply->size }}</h1>
                            @foreach ($supply->supplies as $s_supply)
                                <h1>{{ $s_supply->name }}</h1>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @push('js')
        <script>
            const suppliesData = () => ({
                sizes: [],
                defualtSupplies: [],
                blueprintSupplies: [],
                suppliesForm: null,
                supplies: [],
                formIndex: null,
                search : '',
                initSizes(data) {
                    this.sizes = [...data]
                },
                initSupplies(supplies) {
                    console.log(supplies);
                    this.defualtSupplies = [...supplies];
                    this.blueprintSupplies = [...supplies];
                },
                addSupplyForm(id, size) {
                    this.formIndex = id;
                    this.suppliesForm = {
                        size: size,
                        fields: []
                    }
                    console.log(this.suppliesForm)
                },
                addSupplyField(data) {


                    const field = {
                        ...data,
                        quantity: 1
                    }

                    this.suppliesForm = {
                        ...this.suppliesForm,
                        fields: [
                            ...this.suppliesForm.fields,
                            field
                        ]
                    }

                    console.log(this.suppliesForm);
                },
                removeSupplyField(data) {

                    this.suppliesForm = {
                        ...this.suppliesForm,
                        fields: [
                            ...this.suppliesForm.fields.filter(item => item.id !== data.id)
                        ]
                    }
                    console.log(this.suppliesForm);

                },
                addSupplyDataFromToSupplies(data) {
                    const supply = {
                        size: data.size,
                        supplies: data.fields
                    }

                    this.supplies = [...this.supplies, supply]

                    this.suppliesForm = null;

                },
                removeSupplyDataFromSupplies(data) {
                    this.supplies = [...this.supplies.filter(item => item.id !== data.id)]
                },
                async filterSupplies(data, type){
                    try {

                        let url = `/admin/supply/filter?size=${data}`;

                        if (type !== 'sizes'){
                            url = `/admin/supply/filter?type=${data}`
                        }

                        const response = await axios.get(url);

                        this.blueprintSupplies = [...response.data.supplies]


                    } catch (error) {
                        console.log(error.response.data);
                    }
                },
                async searchSupply(data){

                    try {
                        url = `/admin/supply/filter?search=${data}`

                        if(data === '') {
                            url = `/admin/supply/filter?getAll=''`
                        }

                        const response = await axios.get(url)

                        this.blueprintSupplies = [...response.data.supplies]

                    } catch (error) {
                        console.log(error.response.data);
                    }


                }
            });
        </script>
    @endpush
</x-panel>
