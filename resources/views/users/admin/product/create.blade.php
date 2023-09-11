<x-panel>
    <div class="w-full flex flex-col pt-8 p-4 relative" x-data="data">
        <div class="px-4">
            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">New Products</h1>
                <p class="text-sm">You are about to add a new product</p>
            </div>
        </div>

        <form method="post" action="{{ route('admin.products.store') }}"enctype="multipart/form-data"
            class=" w-full h-full flex flex-col space-y-6">
            @csrf
            <div class="w-full flex items-start ">
                <div class="w-1/3 h-full flex p-4 ">
                    <div class="">
                        <template x-if="image !== null">
                            <img :src="image" class="h-96 rounded-md" />
                        </template>
                    </div>

                    <div class="flex items-center justify-center w-full h-full" x-show="image === null">
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
                    </div>
                </div>

                <div class="w-2/3 flex flex-col space-y-6 p-4">
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                             focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="flex space-x-4 items-center">
                        <div class="w-full ">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                            <input type="text" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="w-full ">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select
                                Category</label>
                            <select id="countries" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                              ">
                                <option selected>Select Category</option>

                                @forelse ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @empty
                                    <option>Empty</option>
                                @endforelse
                            </select>

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
                        </div>
                    </div>
                    <div>
                        <input type="hidden" id="" name="description" :value="content">
                        <div id="editor" class="h-auto min-h-[100px]">

                        </div>
                    </div>

                    <div class="w-full flex justify-start">
                        <button @click="submitData()" class="px-4 py-2 rounded bg-sbgreen text-white">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="w-full h-full absolute z-10 flex justify-center" x-show="modalSize" x-transition.duration.700ms>
            <div class="bg-gray-100 w-1/2 h-auto rounded-lg shadow-lg self-center p-4 flex flex-col gap-2">
                <template x-for="(field, index) in fields" :key="index">
                    <div class="w-full">
                        <p class="flex w-full"> Field <span x-text="index + 1" class="flex-grow"></span> <span>
                                <button @click="removeField(index)"
                                    class="px-4 py-2 rounded-full bg-sbgreen text-white">
                                    x
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
                <button @click="addFields" class="px-4 py-2 rounded-full bg-sbgreen text-white">
                    +
                </button>
                <div>
                    <button @click="addSizes" class="px-4 py-2 rounded-full bg-sbgreen text-white">
                        Save
                    </button>
                    <button @click="openModalSize" class="px-4 py-2 rounded-full bg-sbgreen text-white">
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
                            this.modalSize = false
                            this.fields = [{
                                name: null,
                                price: null
                            }]
                        }
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
