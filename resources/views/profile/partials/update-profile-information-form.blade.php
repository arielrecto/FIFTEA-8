<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="w-full flex items-center justify-center">
            <div class="w-full flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 ">
                <div class="w-full flex flex-col items-center justify-center relative py-4">
                    <label for="dropzone-file"
                        class="z-10 flex flex-col items-center justify-center w-72 h-72 border border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 ">
                        <div id="description" class="hidden flex flex-col items-center justify-center pt-5 pb-6">
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
                        <img id="image-preview" src="#" alt="Preview"
                            class="hidden w-72 h-full rounded-full object-cover object-center bg-white" />

                        @if ($user->profile->image)
                            <img id="db-cover-photo"
                            src="{{asset('storage/' . $user->profile->image)}}" alt="Image"
                            class="w-full h-full rounded-full object-cover object-center bg-white" />
                        @else
                            @if ($user->profile->sex == 'Male')
                                <img id="db-cover-photo"
                                src="{{asset('images/male.png')}}" alt="Image"
                                class="w-full h-full rounded-full object-cover object-center bg-white" />
                            @else
                                <img id="db-cover-photo"
                                src="{{asset('images/female.png')}}" alt="Image"
                                class="w-full h-full rounded-full object-cover object-center bg-white" />
                            @endif
                        @endif


                        <input id="dropzone-file" type="file" name="image" class="hidden"
                            accept="image/png, image/jpeg, image/gif" onchange="previewCoverPhoto(this)" />
                    </label>
                    <div class="h-2/3 w-full bg-gray-200 absolute top-0 left-0 rounded-t-md"></div>

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

        <div class="w-full flex flex-col items-center justify-center space-x-2">
            <h2 class="text-xl font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information.") }}
            </p>
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="first_name" class="poppins text-sm font-medium text-gray-700">First Name
                        <span class="text-red-500">*</span></label>
                    @error('first_name')
                        <span class="text-xs font-light text-red-600"></span>
                    @enderror
                </div>
                <input type="text" name="first_name" id="first_name"
                    value="{{ old('first_name') ?? $user->profile->first_name }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="First Name">
            </div>

            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="last_name" class="poppins text-sm font-medium text-gray-700">Last Name
                        <span class="text-red-500">*</span></label>
                    @error('last_name')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="last_name" id="last_name"
                    value="{{ old('last_name') ?? $user->profile->last_name }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Last Name">
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="middle_name" class="poppins text-sm font-medium text-gray-700">Middle
                        Name</label>
                    @error('middle_name')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="middle_name" id="middle_name"
                    value="{{ old('middle_name') ?? $user->profile->middle_name }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Middle Name">
            </div>

            <div class="w-full flex items-center space-x-4">
                <div class="w-full flex flex-col ">
                    <div class="flex items-baseline space-x-2">
                        <label for="age" class="poppins text-sm font-medium text-gray-700">Age</label>
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
                        <label for="sex" class="poppins text-sm font-medium text-gray-700">Sex</label>
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
                    <label for="phone" class="poppins text-sm font-medium text-gray-700">Phone Number</label>
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
                <x-text-input id="email" name="email" type="email" class=" block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

        <div class="w-full flex flex-col items-center justify-center space-x-2 py-2">
            <h2 class="text-xl font-medium text-gray-900">
                {{ __('Address') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Update your address.') }}
            </p>
        </div>

        <div class="w-full flex flex-col ">
            <div class="flex items-baseline space-x-2">
                <label for="lot" class="poppins text-sm font-medium text-gray-700">Lot/Blk/House Number</label>
                @error('lot')
                    <span class="text-xs font-light text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <input type="text" name="lot" id="lot" value="{{ old('lot') ?? $user->profile->lot }}"
                class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                placeholder="Lot">
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="street" class="poppins text-sm font-medium text-gray-700">Street
                        <span class="text-red-500">*</span></label>
                    @error('street')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="street" id="street"
                    value="{{ old('street') ?? $user->profile->street }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Street">
            </div>

            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="subdivision" class="poppins text-sm font-medium text-gray-700">Subdivision</label>
                    @error('subdivision')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="subdivision" id="subdivision"
                    value="{{ old('subdivision') ?? $user->profile->subdivision }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Subdivision">
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row items-start md:space-x-6 space-y-6 md:space-y-0">
            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="barangay" class="poppins text-sm font-medium text-gray-700">Barangay
                        <span class="text-red-500">*</span></label>
                    @error('barangay')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <select type="text" name="barangay" id="barangay"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full">
                    <option value="Aniban I"
                        {{ old('barangay') == 'Aniban I' || $user->profile->barangay == 'Aniban I' ? 'selected' : '' }}>
                        Aniban I</option>
                    <option value="Aniban II"
                        {{ old('barangay') == 'Aniban II' || $user->profile->barangay == 'Aniban II' ? 'selected' : '' }}>
                        Aniban II</option>
                    <option value="Aniban III"
                        {{ old('barangay') == 'Aniban III' || $user->profile->barangay == 'Aniban III' ? 'selected' : '' }}>
                        Aniban III</option>
                    <option value="Aniban IV"
                        {{ old('barangay') == 'Aniban IV' || $user->profile->barangay == 'Aniban IV' ? 'selected' : '' }}>
                        Aniban IV</option>
                    <option value="Aniban V"
                        {{ old('barangay') == 'Aniban V' || $user->profile->barangay == 'Aniban V' ? 'selected' : '' }}>
                        Aniban V</option>
                    <option value="Banalo"
                        {{ old('barangay') == 'Banalo' || $user->profile->barangay == 'Banalo' ? 'selected' : '' }}>
                        Banalo</option>
                    <option value="Bayanan"
                        {{ old('barangay') == 'Bayanan' || $user->profile->barangay == 'Bayanan' ? 'selected' : '' }}>
                        Bayanan</option>
                    <option value="Campo Santo"
                        {{ old('barangay') == 'Campo Santo' || $user->profile->barangay == 'Campo Santo' ? 'selected' : '' }}>
                        Campo Santo</option>
                    <option value="Daang Bukid"
                        {{ old('barangay') == 'Daang Bukid' || $user->profile->barangay == 'Daang Bukid' ? 'selected' : '' }}>
                        Daang Bukid</option>
                    <option value="Digman"
                        {{ old('barangay') == 'Digman' || $user->profile->barangay == 'Digman' ? 'selected' : '' }}>
                        Digman</option>
                    <option value="Dulong Bayan"
                        {{ old('barangay') == 'Dulong Bayan' || $user->profile->barangay == 'Dulong Bayan' ? 'selected' : '' }}>
                        Dulong Bayan</option>
                    <option value="Habay I"
                        {{ old('barangay') == 'Habay I' || $user->profile->barangay == 'Habay I' ? 'selected' : '' }}>
                        Habay I</option>
                    <option value="Habay II"
                        {{ old('barangay') == 'Habay II' || $user->profile->barangay == 'Habay II' ? 'selected' : '' }}>
                        Habay II</option>
                    <option value="Kaingin"
                        {{ old('barangay') == 'Kaingin' || $user->profile->barangay == 'Kaingin' ? 'selected' : '' }}>
                        Kaingin</option>
                    <option value="Ligas I"
                        {{ old('barangay') == 'Ligas I' || $user->profile->barangay == 'Ligas I' ? 'selected' : '' }}>
                        Ligas I</option>
                    <option value="Ligas II"
                        {{ old('barangay') == 'Ligas II' || $user->profile->barangay == 'Ligas II' ? 'selected' : '' }}>
                        Ligas II</option>
                    <option value="Ligas III"
                        {{ old('barangay') == 'Ligas III' || $user->profile->barangay == 'Ligas III' ? 'selected' : '' }}>
                        Ligas III</option>
                    <option value="Mabolo I"
                        {{ old('barangay') == 'Mabolo I' || $user->profile->barangay == 'Mabolo I' ? 'selected' : '' }}>
                        Mabolo I</option>
                    <option value="Mabolo II"
                        {{ old('barangay') == 'Mabolo II' || $user->profile->barangay == 'Mabolo II' ? 'selected' : '' }}>
                        Mabolo II</option>
                    <option value="Mabolo III"
                        {{ old('barangay') == 'Mabolo III' || $user->profile->barangay == 'Mabolo III' ? 'selected' : '' }}>
                        Mabolo III</option>
                    <option value="Mliksi I"
                        {{ old('barangay') == 'Mliksi I' || $user->profile->barangay == 'Mliksi I' ? 'selected' : '' }}>
                        Mliksi I</option>
                    <option value="Maliksi II"
                        {{ old('barangay') == 'Maliksi II' || $user->profile->barangay == 'Maliksi II' ? 'selected' : '' }}>
                        Maliksi II</option>
                    <option value="Mambog I"
                        {{ old('barangay') == 'Mambog I' || $user->profile->barangay == 'Mambog I' ? 'selected' : '' }}>
                        Mambog I</option>
                    <option value="Mambog II"
                        {{ old('barangay') == 'Mambog II' || $user->profile->barangay == 'Mambog II' ? 'selected' : '' }}>
                        Mambog II</option>
                    <option value="Mambog III"
                        {{ old('barangay') == 'Mambog III' || $user->profile->barangay == 'Mambog III' ? 'selected' : '' }}>
                        Mambog III</option>
                    <option value="Mambog IV"
                        {{ old('barangay') == 'Mambog IV' || $user->profile->barangay == 'Mambog IV' ? 'selected' : '' }}>
                        Mambog IV</option>
                    <option value="Mambog V"
                        {{ old('barangay') == 'Mambog V' || $user->profile->barangay == 'Mambog V' ? 'selected' : '' }}>
                        Mambog V</option>
                    <option value="Molino I"
                        {{ old('barangay') == 'Molino I' || $user->profile->barangay == 'Molino I' ? 'selected' : '' }}>
                        Molino I</option>
                    <option value="Molino II"
                        {{ old('barangay') == 'Molino II' || $user->profile->barangay == 'Molino II' ? 'selected' : '' }}>
                        Molino II</option>
                    <option value="Molino III"
                        {{ old('barangay') == 'Molino III' || $user->profile->barangay == 'Molino III' ? 'selected' : '' }}>
                        Molino III</option>
                    <option value="Molino IV"
                        {{ old('barangay') == 'Molino IV' || $user->profile->barangay == 'Molino IV' ? 'selected' : '' }}>
                        Molino IV</option>
                    <option value="Molino V"
                        {{ old('barangay') == 'Molino V' || $user->profile->barangay == 'Molino V' ? 'selected' : '' }}>
                        Molino V</option>
                    <option value="Molino VI"
                        {{ old('barangay') == 'Molino VI' || $user->profile->barangay == 'Molino VI' ? 'selected' : '' }}>
                        Molino VI</option>
                    <option value="Molino VII"
                        {{ old('barangay') == 'Molino VII' || $user->profile->barangay == 'Molino VII' ? 'selected' : '' }}>
                        Molino VII</option>
                    <option value="Niog I"
                        {{ old('barangay') == 'Niog I' || $user->profile->barangay == 'Niog I' ? 'selected' : '' }}>
                        Niog I</option>
                    <option value="Niog II"
                        {{ old('barangay') == 'Niog II' || $user->profile->barangay == 'Niog II' ? 'selected' : '' }}>
                        Niog II</option>
                    <option value="Niog III"
                        {{ old('barangay') == 'Niog III' || $user->profile->barangay == 'Niog III' ? 'selected' : '' }}>
                        Niog III</option>
                    <option value="P.F Espiritu I (Panapaan)"
                        {{ old('barangay') == 'P.F Espiritu I (Panapaan)' || $user->profile->barangay == 'P.F Espiritu I (Panapaan)' ? 'selected' : '' }}>
                        P.F Espiritu I (Panapaan)</option>
                    <option value="P.F Espiritu II"
                        {{ old('barangay') == 'P.F Espiritu II' || $user->profile->barangay == 'P.F Espiritu II' ? 'selected' : '' }}>
                        P.F Espiritu II</option>
                    <option value="P.F Espiritu III"
                        {{ old('barangay') == 'P.F Espiritu III' || $user->profile->barangay == 'P.F Espiritu III' ? 'selected' : '' }}>
                        P.F Espiritu III</option>
                    <option value="P.F Espiritu IV"
                        {{ old('barangay') == 'P.F Espiritu IV' || $user->profile->barangay == 'P.F Espiritu IV' ? 'selected' : '' }}>
                        P.F Espiritu IV</option>
                    <option value="P.F Espiritu V"
                        {{ old('barangay') == 'P.F Espiritu V' || $user->profile->barangay == 'P.F Espiritu V' ? 'selected' : '' }}>
                        P.F Espiritu V</option>
                    <option value="P.F Espiritu VII"
                        {{ old('barangay') == 'P.F Espiritu VII' || $user->profile->barangay == 'P.F Espiritu VII' ? 'selected' : '' }}>
                        P.F Espiritu VII</option>
                    <option value="P.F Espiritu VIII"
                        {{ old('barangay') == 'P.F Espiritu VIII' || $user->profile->barangay == 'P.F Espiritu VIII' ? 'selected' : '' }}>
                        P.F Espiritu VIII</option>
                    <option value="Queens Row East"
                        {{ old('barangay') == 'Queens Row East' || $user->profile->barangay == 'Queens Row East' ? 'selected' : '' }}>
                        Queens Row East</option>
                    <option value="Queens Row West"
                        {{ old('barangay') == 'Queens Row West' || $user->profile->barangay == 'Queens Row West' ? 'selected' : '' }}>
                        Queens Row West</option>
                    <option value="Real I"
                        {{ old('barangay') == 'Real I' || $user->profile->barangay == 'Real I' ? 'selected' : '' }}>
                        Real I</option>
                    <option value="Real II"
                        {{ old('barangay') == 'Real II' || $user->profile->barangay == 'Real II' ? 'selected' : '' }}>
                        Real II</option>
                    <option value="Salinas I"
                        {{ old('barangay') == 'Salinas I' || $user->profile->barangay == 'Salinas I' ? 'selected' : '' }}>
                        Salinas I</option>
                    <option value="Salinas II"
                        {{ old('barangay') == 'Salinas II' || $user->profile->barangay == 'Salinas II' ? 'selected' : '' }}>
                        Salinas II</option>
                    <option value="Salinas III"
                        {{ old('barangay') == 'Salinas III' || $user->profile->barangay == 'Salinas III' ? 'selected' : '' }}>
                        Salinas III</option>
                    <option value="Salinas IV"
                        {{ old('barangay') == 'Salinas IV' || $user->profile->barangay == 'Salinas IV' ? 'selected' : '' }}>
                        Salinas IV</option>
                    <option value="San Nicolas I"
                        {{ old('barangay') == 'San Nicolas I' || $user->profile->barangay == 'San Nicolas I' ? 'selected' : '' }}>
                        San Nicolas I</option>
                    <option value="San Nicolas II"
                        {{ old('barangay') == 'San Nicolas II' || $user->profile->barangay == 'San Nicolas II' ? 'selected' : '' }}>
                        San Nicolas II</option>
                    <option value="San Nicolas III"
                        {{ old('barangay') == 'San Nicolas III' || $user->profile->barangay == 'San Nicolas III' ? 'selected' : '' }}>
                        San Nicolas III</option>
                    <option value="Sineguelasan"
                        {{ old('barangay') == 'Sineguelasan' || $user->profile->barangay == 'Sineguelasan' ? 'selected' : '' }}>
                        Sineguelasan</option>
                    <option value="Tabing Dagat"
                        {{ old('barangay') == 'Tabing Dagat' || $user->profile->barangay == 'Tabing Dagat' ? 'selected' : '' }}>
                        Tabing Dagat</option>
                    <option value="Talaba I"
                        {{ old('barangay') == 'Talaba I' || $user->profile->barangay == 'Talaba I' ? 'selected' : '' }}>
                        Talaba I</option>
                    <option value="Talaba II"
                        {{ old('barangay') == 'Talaba II' || $user->profile->barangay == 'Talaba II' ? 'selected' : '' }}>
                        Talaba II</option>
                    <option value="Talaba III"
                        {{ old('barangay') == 'Talaba III' || $user->profile->barangay == 'Talaba III' ? 'selected' : '' }}>
                        Talaba III</option>
                    <option value="Talaba IV"
                        {{ old('barangay') == 'Talaba IV' || $user->profile->barangay == 'Talaba IV' ? 'selected' : '' }}>
                        Talaba IV</option>
                    <option value="Talaba V"
                        {{ old('barangay') == 'Talaba V' || $user->profile->barangay == 'Talaba V' ? 'selected' : '' }}>
                        Talaba V</option>
                    <option value="Talaba VI"
                        {{ old('barangay') == 'Talaba VI' || $user->profile->barangay == 'Talaba VI' ? 'selected' : '' }}>
                        Talaba VI</option>
                    <option value="Talaba VII"
                        {{ old('barangay') == 'Talaba VII' || $user->profile->barangay == 'Talaba VII' ? 'selected' : '' }}>
                        Talaba VII</option>
                    <option value="Zapote I"
                        {{ old('barangay') == 'Zapote I' || $user->profile->barangay == 'Zapote I' ? 'selected' : '' }}>
                        Zapote I</option>
                    <option value="Zapote II"
                        {{ old('barangay') == 'Zapote II' || $user->profile->barangay == 'Zapote II' ? 'selected' : '' }}>
                        Zapote II</option>
                    <option value="Zapote III"
                        {{ old('barangay') == 'Zapote III' || $user->profile->barangay == 'Zapote III' ? 'selected' : '' }}>
                        Zapote III</option>
                    <option value="Zapote IV"
                        {{ old('barangay') == 'Zapote IV' || $user->profile->barangay == 'Zapote IV' ? 'selected' : '' }}>
                        Zapote IV</option>
                    <option value="Zapote V"
                        {{ old('barangay') == 'Zapote V' || $user->profile->barangay == 'Zapote V' ? 'selected' : '' }}>
                        Zapote V</option>
                </select>
            </div>

            <div class="w-full flex flex-col ">
                <div class="flex items-baseline space-x-2">
                    <label for="municipality" class="poppins text-sm font-medium text-gray-700">Municipality</label>
                    @error('municipality')
                        <span class="text-xs font-light text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="municipality" id="municipality"
                    value="{{ old('municipality') ?? $user->profile->municipality }}"
                    class="poppins py-2 px-2 text-sm border-b border-0 border-gray-300 focus:outline-none focus:border-b focus:border-gray-500 focus:ring-0 w-full"
                    placeholder="Municipality">
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
