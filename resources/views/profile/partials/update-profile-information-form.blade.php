<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex items-center justify-center">
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
                            class="hidden w-w-72 h-full rounded-full" />
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
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="firstName" class="poppins text-sm font-medium text-gray-700">First Name
                        <span class="text-red-500">*</span></label>
                    @error('firstName')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') ?? $user->profile->first_name }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="First Name">
            </div>

            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="lastName" class="poppins text-sm font-medium text-gray-700">Last Name
                        <span class="text-red-500">*</span></label>
                    @error('lastName')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') ?? $user->profile->last_name }}"
                class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Last Name">
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="middleName" class="poppins text-sm font-medium text-gray-700">Middle
                        Name</label>
                    @error('middleName')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') ?? $user->profile->middle_name }}"
                class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Middle Name">
            </div>

            <div class="w-full flex items-center space-x-4">
                <div class="w-full flex flex-col ">
                    <div class="flex items-baseline space-x-2">
                        <label for="suffix"
                            class="poppins text-sm font-medium text-gray-700">Age</label>
                        @error('age')
                            <span class="text-xs font-light text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" name="age" id="age" value="{{ old('age') ?? $user->profile->age }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                        placeholder="Suffix">
                </div>

                <div class="w-full flex flex-col ">
                    <div class="flex items-baseline space-x-2">
                        <label for="sex"
                            class="poppins text-sm font-medium text-gray-700">Sex</label>
                        @error('sex')
                            <span class="text-xs font-light text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <select name="sex" id="sex"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full">
                        <option value="Male"
                        {{ old('sex') == 'Male' || $user->profile->sex == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>
                    <option value="Female"
                        {{ old('sex') == 'Female' || $user->profile->sex == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-4 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="contactNumber"
                        class="poppins text-sm font-medium text-gray-700">Phone Number</label>
                    @error('phone')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="phone" id="phone"
                    value="{{ old('phone') ?? $user->profile->phone }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Contact Number">
            </div>

            <div class="w-full">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class=" block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
