<x-panel>
    <div class="w-full flex flex-col pt-8 md:p-4 relative" x-data="data">
        <div class="md:px-4">
            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">New Products</h1>
                <p class="text-sm">You are about to add a new product</p>
            </div>
        </div>

        <form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
            class=" w-full h-full flex flex-col space-y-6">
            @csrf
            <div class="w-full flex flex-col md:flex-row items-start space-y-4 md:space-y-0 ">
                <div class="w-full md:w-1/3 h-full flex md:p-4 ">
                    <div class="">
                        <template x-if="image !== null">
                            <img :src="image" class="h-96 rounded-md" />
                        </template>
                    </div>


                    <div class="flex flex-col items-start justify-start w-full h-full space-y-1"
                        x-show="image === null">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-96 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Clickto upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden"
                                name="image"@change="preview($event)" />
                        </label>
                        @if ($errors->has('image'))
                            <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>

                <div class="w-full md:w-2/3 flex flex-col space-y-6 md:p-4">
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                             focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    @if ($errors->has('name'))
                        <p class="text-xs text-error">{{ $errors->first('name') }}</p>
                    @endif

                    <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4 items-center">
                        <div class="w-full ">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                            <input type="text" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @if ($errors->has('price'))
                                <p class="text-xs text-error">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                        <div class="w-full">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select
                                Category</label>
                            <div class="flex items-center gap-2">
                                <select id="countries" name="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                              ">
                                    <option selected value="">Select Category</option>

                                    @forelse ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @empty
                                        <option>Empty</option>
                                    @endforelse
                                </select>
                                <a href="{{ route('admin.category.create') }}"
                                    class="px-4 py-2 rounded bg-sbgreen text-white">
                                    add
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="flex space-x-4 items-center">
                        <div class="w-full ">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Sizes</label>
                            <input type="hidden" x-model="JSON.stringify(sizes)" name="sizes">
                            <p
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 flex gap-2">
                                <template x-for="(size, index ) in sizes" :key="index">
                                    <p class="px-4 py-2 bg-gray-100 shadow-lg rounded-lg">
                                        <span x-text="size.name"></span>
                                    </p>
                                </template>

                                <button @click="openModalSize($event)" class="px-4 py-2 rounded bg-sbgreen text-white">
                                    +
                                </button>
                            </p>
                            @if ($errors->has('sizes'))
                                <p class="text-xs text-error">{{ $errors->first('sizes') }}</p>
                            @endif
                        </div>
                    </div>
                    <div>
                        <input type="hidden" id="" name="description" :value="content">
                        <div id="editor" class="h-auto min-h-[100px]">

                        </div>
                    </div>
{{-- 
                    <div class="flex flex-col gap-2 w-full" x-init="initSupplies({{ $supplies }})">
                        <h1 class="text-lg font-bold">
                            Ingredients
                        </h1>
                        <p class="text-xs font-semibold">
                            Select Supplies
                        </p>
                        <div
                            class="flex gap-2 w-full max-w-full overflow-x-auto border-2 border-gray-100 rounded-lg p-2">
                            <template x-for="supply in supplies" :key="supply.id">

                                <button class="btn btn-xs btn-ghost" @click.prevent="addSupplyFields(supply)">


                                    <span x-text="`${supply.name} (${supply.size})`"></span>
                                </button>
                            </template>

                        </div>
                        <div class="grid grid-cols-2 grid-flow-row w-full">
                            <template x-if="suppliesFields.lenth !== 0">
                                <template x-for="(supplyField, index) in suppliesFields" :key="index">
                                    <div class="flex items-center">
                                        <label for="">
                                            <span x-text="supplyField.name"></span>
                                        </label>
                                        <div class="flex items-center">
                                            <input type="number" x-model="supplyField.quantity">
                                            <button @click.prevent="removeSupplyField(supplyField)"
                                                class="btn btn-error">X</button>
                                        </div>

                                    </div>
                                </template>
                            </template>
                        </div>
                        @if ($errors->has('ingredients'))
                            <p class="text-xs text-error">{{ $errors->first('ingredients') }}</p>
                        @endif
                    </div> --}}

                    <input type="hidden" name="ingredients" x-model="JSON.stringify(suppliesFields)">

                    <div class="w-full flex justify-start">
                        <button @click="submitData()" class="px-4 py-2 rounded bg-sbgreen text-white">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="w-full h-full absolute z-10 flex justify-center" x-show="modalSize" x-transition.duration.700ms>
            <div class="bg-gray-100 w-full md:w-1/2 h-auto rounded-lg shadow-lg self-center p-4 flex flex-col gap-2">
                <template x-for="(field, index) in fields" :key="index">
                    <div class="w-full">
                        <p class="flex w-full"> Size - <span x-text="index + 1" class="flex-grow"></span> <span>
                                <button @click="removeField(index)" class="px-4 py-2 rounded-full hover:bg-gray-200">
                                    <i class='bx bx-x text-red-600 text-xl'></i>
                                </button></span></p>
                        <div class="w-full ">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Size</label>
                            <input type="text" x-model="field.name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">price</label>
                            <input type="text"x-model="field.price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>

                </template>
                <button @click="addFields" class="px-4 py-2 rounded border border-sbgreen text-sbgreen">
                    +
                </button>
                <div class="flex items-center space-x-2">
                    <button @click="addSizes" class="px-4 py-2 rounded bg-sbgreen text-white">
                        Save
                    </button>
                    <button @click="openModalSize"
                        class="px-4 py-2 rounded text-gray-600 border border-gray-200 hover:bg-gray-200">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function data() {
                return {
                    content: null,
                    image: null,
                    modalSize: false,
                    sizes: [],
                    fields: [{
                        name: null,
                        price: null,
                    }],
                    supplies: [],
                    suppliesFields: [],
                    initSupplies(data) {
                        console.log(data);
                        this.supplies = [...data]
                    },
                    preview(e) {
                        file = e.target.files[0]

                        this.image = URL.createObjectURL(file);
                    },
                    submitData() {

                        this.content = document.getElementById('editor').querySelector('.ql-editor').innerHTML
                    },
                    openModalSize(e) {
                        e.preventDefault();
                        this.modalSize = !this.modalSize
                    },
                    addFields() {
                        const data = {
                            name: null,
                            price: null,
                        }

                        this.fields.push(data);
                    },
                    removeField(index) {
                        const itemIndex = index;
                        this.fields = this.fields.filter((item, index) => index !== itemIndex)
                    },
                    addSizes() {
                        if (this.sizes === null) {

                            this.sizes = this.fields
                            this.modalSize = false
                            this.fields = [{
                                name: null,
                                price: null
                            }]
                        } else {
                            this.fields.forEach(item => {
                                this.sizes.push(item)
                            });
                            const sizes = JSON.stringify(this.sizes);
                            console.log(sizes)

                            this.modalSize = false
                            this.fields = [{
                                name: null,
                                price: null
                            }]
                        }
                    },
                    addSupplyFields(supply) {

                        if (this.suppliesFields.some(item => item.size === supply.size) && this.suppliesFields.some(item => item
                                .name === supply.name)) {
                            console.log(supply);
                            return;
                        }
                        const supField = {
                            name: supply.name,
                            quantity: 0,
                            size: supply.size
                        }

                        this.suppliesFields = [...this.suppliesFields, supField]
                    },
                    removeSupplyField(supField) {
                        this.suppliesFields = this.suppliesFields.filter(item => item.name !== supField.name)
                    }
                }
            }
        </script>
        <script>
            let editor = document.getElementById('editor');
            var quill = new Quill(editor, {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block']
                    ]
                },
                placeholder: 'Write the description here...',
                theme: 'snow' // or 'bubble'
            });
        </script>
    @endpush
</x-panel>
