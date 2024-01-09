<section class="w-full">

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="w-full flex flex-col space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="w-full flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 ">
            <div class="flex flex-col items-start justify-start w-full md:w-[330px]">
                <label for="tag" class="poppins text-sm font-medium text-gray-700">Image
                    @error('cover_photo')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </label>
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-72 border border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div id="description" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                class="font-semibold">Click
                                to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF</p>
                    </div>
                    <img id="image-preview" src="#" alt="Preview"
                        class="hidden w-full h-full rounded-full" />
                    <img id="db-cover-photo" src="{{ $user->profile ? asset('storage/' . $user->profile->image) : ''}}"
                        alt="Image" class="w-full h-full rounded-full" />
                    <input id="dropzone-file" type="file" name="image" class="hidden"
                        accept="image/png, image/jpeg, image/gif" onchange="previewCoverPhoto(this)" />
                </label>

                <script>
                    function previewCoverPhoto(input) {
                        var imagePreview = document.getElementById('image-preview');
                        var dbCoverPhoto = document.getElementById('db-cover-photo');
                        var description = document.getElementById('description');

                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                imagePreview.classList.remove('hidden');
                                dbCoverPhoto.classList.add('hidden');
                                description.classList.add('hidden');
                            };

                            reader.readAsDataURL(input.files[0]);
                        } else {
                            imagePreview.src = '';
                            imagePreview.classList.add('hidden');
                            description.classList.add('hidden');
                            dbCoverPhoto.classList.add('hidden');
                        }
                    }
                </script>
            </div>
        </div>
        <div class="flex items-center justify-start">
            <button type="submit"
                class="px-4 py-2 rounded text-white text-sm bg-blue-600 hover:bg-blue-700 poppins">Update</button>
        </div>


    </form>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {

        const photoInput = $('#photo-input');
        const photoPreview = $('#photo-preview');
        const photoPlaceholder = photoPreview.find('p');

        photoInput.on('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                photoPreview.css('background-image', `url(${reader.result})`);

                if (photoPreview.css('background-image') !== 'none') {
                    photoPlaceholder.hide();
                }
            });

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    });

</script>
