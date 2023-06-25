<x-panel>
    <div class="w-full flex flex-col pt-8 p-4" x-data="data">
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
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="image"@change="preview($event)" />
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
        </div>
    </div>
    @push('js')
        <script>
            function data() {
                return {
                    content: null,
                    image: null,
                    preview(e) {
                        file = e.target.files[0]

                        this.image = URL.createObjectURL(file);
                    },
                    submitData() {
                        this.content = document.getElementById('editor').querySelector('.ql-editor').innerHTML
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
