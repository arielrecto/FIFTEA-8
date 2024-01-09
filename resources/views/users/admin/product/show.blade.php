<x-panel>
    <div class="w-full flex flex-col pt-8 md:p-4 relative">
        <div class="md:px-4">
            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">Product </h1>
                {{-- <p class="text-sm">You are about to add a new product</p> --}}
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="">
                <img src="{{ route('media.product', ['name' => $product->image]) }}" alt="" srcset=""
                    class="h-16 w-16 object object-center">

                    <h1>{{$product->name}}</h1>
                    <p>{!! $product->description !!}</p>
                    <p>{{$product->price}}</p>
            </div>


            @if ($product->supplies === null)
                <div class="flex flex-col gap-2" x-data="suppliesData" x-init="initSizes({{ $product->sizes }}), initSupplies({{ $supplies }})">
                    <div class="flex flex-col gap-5">
                        <template x-for="(size, index) in sizes" :key="index">
                            <div class="flex flex-col gap-2 border-2 rounded-lg p-2">
                                <div class="flex justify-between">
                                    <h1 class="text-lg font-bold gap-2">
                                        <span x-text="size.name"></span>

                                    </h1>

                                    <button class="btn btn-xs btn-ghost" @click="addSupplyForm(index, size.name)">
                                        Setup
                                    </button>
                                </div>

                                <template x-if="formIndex === index">
                                    <div class="flex flex-col gap-2">
                                        <h1>
                                            inventory
                                        </h1>
                                        <div class="grid grid-cols-6 grid-flow-row w-full p-2 border-2 rounded-lg">

                                            <template x-for="supply in blueprintSupplies" :key="supply.id">
                                                <button class="btn btn-sm btn-ghost" @click="addSupplyField(supply)">
                                                    <span x-text="supply.name"></span>
                                                </button>
                                            </template>
                                        </div>
                                        <div class="grid grid-cols-3 grid-flow-row gap-2 2-full">

                                            <template x-for="field in suppliesForm.fields" :key="field.id">
                                                <div class="flex items-center">
                                                    <h1><span x-text="field.name"></span></h1>
                                                    <input type="number" x-model="field.quantity">
                                                </div>
                                            </template>

                                        </div>
                                        <button @click="addSupplyDataFromToSupplies(suppliesForm)">
                                            Add
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <form action="{{ route('admin.products.show', ['product' => $product->id]) }}" method="get">

                            @csrf
                            <input type="hidden" x-model="JSON.stringify(supplies)" name="supply">
                            <button class="btn btn-sm btn-accent">Save</button>
                        </form>

                    </div>
                </div>
                @else
                <div>
                    @php
                        $supplies = json_decode($product->supplies)
                    @endphp

                    @foreach ($supplies as $supply )
                        <div class="flex flex-col gap-2">
                            <h1>{{$supply->size}}</h1>
                            @foreach ( $supply->supplies as $s_supply)
                                <h1>{{$s_supply->name}}</h1>
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
                initSizes(data) {
                    this.sizes = [{
                        name: 'regular',
                        price: 0
                    }, ...data]
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
                },
                addSupplyField(data) {

                    const field = {
                        ...data,
                        quantity: 0
                    }
                    console.log(field);

                    this.suppliesForm = {
                        ...this.suppliesForm,
                        fields: [
                            ...this.suppliesForm.fields,
                            field
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

                    console.log(this.supplies);
                },
            });
        </script>
    @endpush
</x-panel>
