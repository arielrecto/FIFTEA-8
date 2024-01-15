<x-panel>
    <div class="mt-10 mb-10">
        <div class="w-full max-w-[1000px] mx-auto ">
            <span class="font-bold text-lg">Hero Preview</span>
        </div>
        <section class="text-gray-600 body-font py-12 md:py-0">
            <div
                class="w-full max-w-[1000px] mx-auto flex flex-col md:flex-row items-center p-10 py-20 border-2 border-gray-300 welcome">
                <div class="w-full md:w-2/5 flex flex-col space-y-5 justify-start items-center md:items-start">
                    <h2 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="200"
                        class="font-sans  font-semibold text-yellow-700">
                        Experience
                    </h2>

                    <h1 data-aos="fade-right" data-aos-duration="2000" data-aos-delay="300"
                        class="dancing-script text-3xl text-sbgreen">Fif'tea-8
                    </h1>
                    <p data-aos="fade-left" data-aos-duration="2000" data-aos-delay="400"
                        class="font-sans  leading-relaxed text-xs text-center md:text-left">{{ $heroContent->description }}</p>
                    <div class="flex items-center">
                        <a href="{{ route('products') }}" data-aos="fade-left" data-aos-duration="2000"
                            data-aos-delay="500"
                            class="font-sans text-white font-medium text-xs bg-sbgreen hover:bg-green-800 border border-sbgreen py-1 px-2 cursor-pointer transition-all ease-in-out delay-150">Order
                            Now</a>
                    </div>

                    <a href="https://facebook.com"
                        class="flex items-center space-x-4 py-1 px-2 border border-gray-300 hover:border-blue-700 rounded-md"
                        data-aos="fade-right" data-aos-duration="2000" data-aos-delay="600">
                        <span class="text-xs text-blue-700">Follow us on</span>
                        <div class="">
                            <i class='bx bxl-facebook-circle text-sm text-blue-700'></i>
                        </div>
                    </a>
                </div>

                <div class="w-full md:w-3/5 h-full hidden md:block">
                    <div class="w-full h-full flex items-center justify-end space-x-2">
                        <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                            <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300"
                                class="w-[100px] h-[200px] object-contain object-center shadow-md bg-white rounded"
                                alt="hero" src="{{ asset('storage/' . $heroContent->leftImage) }}">
                        </div>

                        <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                            <img data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400"
                                class="w-[150px] h-[250px] object-contain object-center shadow-md bg-white rounded"
                                alt="hero" src="{{ asset('storage/' . $heroContent->centerImage) }}">
                        </div>

                        <div class="hover:transform hover:scale-105 transition duration-300 ease-in-out">
                            <img data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500"
                                class="w-[100px] h-[200px] object-contain object-center shadow-md bg-white rounded"
                                alt="hero" src="{{ asset('storage/' . $heroContent->rightImage) }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-[1000px] mx-auto mt-6 flex flex-col md:flex-row items-start justify-between md:space-x-3 space-y-4 md:space-y-0">
            @csrf
            <div class="w-full md:w-1/4">
                <label for="tag" class="poppins text-sm font-semibold text-gray-700">Description</label>
                @error('description')
                    <span class="text-xs font-light text-red-600">{{ $message }}</span>
                @enderror
                <textarea name="description" id="description" class="w-full min-h-80 h-auto resize-none border border-gray-300 rounded text-justify">
                    {{ $heroContent->description }}
                </textarea>
                <button class="hidden md:block text-sm px-6 py-2 rounded bg-blue-700 text-white">Update</button>
            </div>

            <div class="w-full md:w-1/4">
                <div class="flex flex-col items-start justify-start w-full">
                    <label for="tag" class="poppins text-sm font-semibold text-gray-700">Left Image</label>
                    @error('leftImage')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                    <label for="dropzone-file1"
                        class="flex flex-col items-center justify-center w-full h-96 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 ">
                        <div id="notes1" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF</p>
                        </div>
                        <img id="image1-preview" src="#" alt="Preview"
                            class="hidden w-full h-full rounded-md object-contain object-center" />
                        <img id="db-cover-photo1"
                            src="{{ $heroContent ? asset('storage/' . $heroContent->leftImage) : '' }}" alt="Image"
                            class="w-full h-full rounded-md object-contain object-center" />
                        <input id="dropzone-file1" type="file" name="leftImage" class="hidden"
                            accept="image/png, image/jpeg, image/gif" onchange="previewCoverPhoto1(this)" />
                    </label>
                </div>
            </div>

            <div class="w-full md:w-1/4">
                <div class="flex flex-col items-start justify-start w-full">
                    <label for="tag" class="poppins text-sm font-semibold text-gray-700">Center Image</label>
                    @error('centerImage')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                    <label for="dropzone-file2"
                        class="flex flex-col items-center justify-center w-full h-96 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 ">
                        <div id="notes2" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF</p>
                        </div>
                        <img id="image2-preview" src="#" alt="Preview"
                            class="hidden w-full h-full rounded-md object-contain object-center" />
                        <img id="db-cover-photo2"
                            src="{{ $heroContent ? asset('storage/' . $heroContent->centerImage) : '' }}"
                            alt="Image" class="w-full h-full rounded-md object-contain object-center" />
                        <input id="dropzone-file2" type="file" name="centerImage" class="hidden"
                            accept="image/png, image/jpeg, image/gif" onchange="previewCoverPhoto2(this)" />
                    </label>
                </div>
            </div>

            <div class="w-full md:w-1/4">
                <div class="flex flex-col items-start justify-start w-full">
                    <label for="tag" class="poppins text-sm font-semibold text-gray-700">Right Image</label>
                    @error('rightImage')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                    <label for="dropzone-file3"
                        class="flex flex-col items-center justify-center w-full h-96 border border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 ">
                        <div id="notes3" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF</p>
                        </div>
                        <img id="image3-preview" src="#" alt="Preview"
                            class="hidden w-full h-full rounded-md object-contain object-center" />
                        <img id="db-cover-photo3"
                            src="{{ $heroContent ? asset('storage/' . $heroContent->rightImage) : '' }}"
                            alt="Image" class="w-full h-full rounded-md object-contain object-center" />
                        <input id="dropzone-file3" type="file" name="rightImage" class="hidden"
                            accept="image/png, image/jpeg, image/gif" onchange="previewCoverPhoto3(this)" />
                    </label>
                </div>
            </div>

            <button class="md:hidden w-full text-sm px-6 py-2 rounded bg-blue-700 text-white">Update</button>
        </form>
    </div>

    <script>
        function previewCoverPhoto3(input) {
            var imagePreview3 = document.getElementById('image3-preview');
            var dbCoverPhoto3 = document.getElementById('db-cover-photo3');
            var description3 = document.getElementById('notes3');

            if (input.files && input.files[0]) {
                var reader3 = new FileReader();

                reader3.onload = function(eee) {
                    imagePreview3.src = eee.target.result;
                    imagePreview3.classList.remove('hidden');
                    dbCoverPhoto3.classList.add('hidden');
                    description3.classList.add('hidden');
                };

                reader3.readAsDataURL(input.files[0]);
            } else {
                imagePreview3.src = '';
                imagePreview3.classList.add('hidden');
                description3.classList.add('hidden');
                dbCoverPhoto3.classList.add('hidden');
            }
        }

        function previewCoverPhoto2(input) {
            var imagePreview2 = document.getElementById('image2-preview');
            var dbCoverPhoto2 = document.getElementById('db-cover-photo2');
            var description2 = document.getElementById('notes2');

            if (input.files && input.files[0]) {
                var reader2 = new FileReader();

                reader2.onload = function(ee) {
                    imagePreview2.src = ee.target.result;
                    imagePreview2.classList.remove('hidden');
                    dbCoverPhoto2.classList.add('hidden');
                    description2.classList.add('hidden');
                };

                reader2.readAsDataURL(input.files[0]);
            } else {
                imagePreview2.src = '';
                imagePreview2.classList.add('hidden');
                description2.classList.add('hidden');
                dbCoverPhoto2.classList.add('hidden');
            }
        }

        function previewCoverPhoto1(input) {
            var imagePreview1 = document.getElementById('image1-preview');
            var dbCoverPhoto1 = document.getElementById('db-cover-photo1');
            var description1 = document.getElementById('notes1');

            if (input.files && input.files[0]) {
                var reader1 = new FileReader();

                reader1.onload = function(e) {
                    imagePreview1.src = e.target.result;
                    imagePreview1.classList.remove('hidden');
                    dbCoverPhoto1.classList.add('hidden');
                    description1.classList.add('hidden');
                };

                reader1.readAsDataURL(input.files[0]);
            } else {
                imagePreview1.src = '';
                imagePreview1.classList.add('hidden');
                description1.classList.add('hidden');
                dbCoverPhoto1.classList.add('hidden');
            }
        }
    </script>
</x-panel>
