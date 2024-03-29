<x-guest-layout>

    <div class="w-full h-full flex bg-white">

        <div class="w-full flex flex-col md:flex-row container mx-auto pt-10 px-4 md:p-32 pb-0 md:space-x-6">
            <div class="w-full md:w-1/2 h-full ">
                <div class="flex flex-col space-y-2">
                    <h1 class="text-xl font-semibold text-sbgreen">Welcome to FifTea-8</h1>
                    <p class="text-gray-500">Create your account in order to place orders.</p>
                </div>
                <div class="w-full p-8">
                    <img class="w-full h-full " src="{{ asset('images/signup.png') }}" alt="">
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col space-y-8 px-8">
                <div class="flex flex-col space-y-3">
                    <p class="text-sm text-gray-500">START HERE</p>
                    <h1 class="text-2xl font-bold">Sign up to FifTea-8</h1>
                    <div class="flex space-x-2">
                        <p class="text-base text-gray-500">Alreay have an account?</p>
                        <a href="{{ route('login') }}"
                            class="text-base text-blue-500 hover:underline cursor-pointer">Login</a>
                    </div>
                </div>

                <div class="w-full" x-data="register">

                    <template x-if="currentPhase === 'profile'">
                        <div id="_profile" class="flex flex-col space-y-10">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">Last Name </label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <input id="last_name" name="last_name" type="text" x-model="profileData.lastName"
                                        class="text-xm rounded-md border-gray-300" placeholder="last name">
                                    <span x-text="errors.lastName" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">First Name </label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <input id="first_name" name="first_name" type="text"
                                        x-model="profileData.firstName" class="text-xm rounded-md border-gray-300"
                                        placeholder="first name">
                                    <span x-text="errors.firstName" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="middle_name" class="text-sm ">Middle Name</label>
                                    <input id="middle_name" name="middle_name" type="text"
                                        x-model="profileData.middleName" class="text-xm rounded-md border-gray-300"
                                        placeholder="middle name">
                                </div>

                                <div
                                    class="w-full flex flex-col md:flex-row items-center md:justify-start md:space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <div class="flex items-start space-x-1">
                                            <label for="last_name" class="">Age</label>
                                            <span class="text-red-500"> *</span>
                                        </div>
                                        <input id="age" name="age" type="number" x-model="profileData.age"
                                            class="text-xm rounded-md border-gray-300" placeholder="age">
                                        <span x-text="errors.age" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <div class="flex items-start space-x-1">
                                            <label for="last_name" class="">Sex</label>
                                            <span class="text-red-500"> *</span>
                                        </div>
                                        <select name="sex" id="sex" x-model="profileData.sex"
                                            class="text-xm rounded-md border-gray-300">
                                            <option selected>Select Sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span x-text="errors.sex" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">Phone Number</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <input id="phone" name="phone" type="number" x-model="profileData.phone"
                                        class="text-xm rounded-md border-gray-300" placeholder="ex. 09123456789">
                                    <span x-text="errors.phone" class="text-red-500 text-xs capitalize"></span>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between">
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                    @click="addProfile()">Next</button>
                            </div>
                        </div>
                    </template>


                    <template x-if="currentPhase === 'address'">
                        <div id="_address">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col md:flex-row items-center md:space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <div class="flex items-start space-x-1">
                                            <label for="last_name" class="">Lot/Block/House No.</label>
                                            <span class="text-red-500"> *</span>
                                        </div>
                                        <input id="lot" name="lot" type="text"
                                            x-model="addressData.lot" class="text-xm rounded-md border-gray-300"
                                            placeholder="lot number">
                                        <span x-text="errors.lot" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex items-start flex-col md:flex-row md:space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <div class="flex items-start space-x-1">
                                            <label for="last_name" class="">Street</label>
                                            <span class="text-red-500"> *</span>
                                        </div>
                                        <input id="street" name="street" type="text"
                                            x-model="addressData.street" class="text-xm rounded-md border-gray-300"
                                            placeholder="street name">
                                        <span x-text="errors.street" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="subdivision" class="text-sm ">Subdivision</label>
                                        <input id="subdivision" name="subdivision" type="text"
                                            x-model="addressData.subdivision"
                                            class="text-xm rounded-md border-gray-300" placeholder="subdivision">
                                        <span x-text="errors.subdivision"
                                            class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">Baranggay</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <select id="barangay" name="barangay" x-model="addressData.barangay"
                                        class="text-xm rounded-md border-gray-300">
                                        <option value="Aniban I">Aniban I</option>
                                        <option value="Aniban II">Aniban II</option>
                                        <option value="Aniban III">Aniban III</option>
                                        <option value="Aniban IV">Aniban IV</option>
                                        <option value="Aniban V">Aniban V</option>
                                        <option value="Banalo">Banalo</option>
                                        <option value="Bayanan">Bayanan</option>
                                        <option value="Campo Santo">Campo Santo</option>
                                        <option value="Daang Bukid">Daang Bukid</option>
                                        <option value="Digman">Digman</option>
                                        <option value="Dulong Bayan">Dulong Bayan</option>
                                        <option value="Habay I">Habay I</option>
                                        <option value="Habay II">Habay II</option>
                                        <option value="Kaingin">Kaingin</option>
                                        <option value="Ligas I">Ligas I</option>
                                        <option value="Ligas II">Ligas II</option>
                                        <option value="Ligas III">Ligas III</option>
                                        <option value="Mabolo I">Mabolo I</option>
                                        <option value="Mabolo II">Mabolo II</option>
                                        <option value="Mabolo III">Mabolo III</option>
                                        <option value="Mliksi I">Mliksi I</option>
                                        <option value="Maliksi II">Maliksi II</option>
                                        <option value="Mambog I">Mambog I</option>
                                        <option value="Mambog II">Mambog II</option>
                                        <option value="Mambog III">Mambog III</option>
                                        <option value="Mambog IV">Mambog IV</option>
                                        <option value="Mambog V">Mambog V</option>
                                        <option value="Molino I">Molino I</option>
                                        <option value="Molino II">Molino II</option>
                                        <option value="Molino III">Molino III</option>
                                        <option value="Molino IV">Molino IV</option>
                                        <option value="Molino V">Molino V</option>
                                        <option value="Molino VI">Molino VI</option>
                                        <option value="Molino VII">Molino VII</option>
                                        <option value="Niog I">Niog I</option>
                                        <option value="Niog II">Niog II</option>
                                        <option value="Niog III">Niog III</option>
                                        <option value="P.F Espiritu I (Panapaan)">P.F Espiritu I (Panapaan)</option>
                                        <option value="P.F Espiritu II">P.F Espiritu II</option>
                                        <option value="P.F Espiritu III">P.F Espiritu III</option>
                                        <option value="P.F Espiritu IV">P.F Espiritu IV</option>
                                        <option value="P.F Espiritu V">P.F Espiritu V</option>
                                        <option value="P.F Espiritu VII">P.F Espiritu VII</option>
                                        <option value="P.F Espiritu VIII">P.F Espiritu VIII</option>
                                        <option value="Queens Row East">Queens Row East</option>
                                        <option value="Queens Row West">Queens Row West</option>
                                        <option value="Real I">Real I</option>
                                        <option value="Real II">Real II</option>
                                        <option value="Salinas I">Salinas I</option>
                                        <option value="Salinas II">Salinas II</option>
                                        <option value="Salinas III">Salinas III</option>
                                        <option value="Salinas IV">Salinas IV</option>
                                        <option value="San Nicolas I">San Nicolas I</option>
                                        <option value="San Nicolas II">San Nicolas II</option>
                                        <option value="San Nicolas III">San Nicolas III</option>
                                        <option value="Sineguelasan">Sineguelasan</option>
                                        <option value="Tabing Dagat">Tabing Dagat</option>
                                        <option value="Talaba I">Talaba I</option>
                                        <option value="Talaba II">Talaba II</option>
                                        <option value="Talaba III">Talaba III</option>
                                        <option value="Talaba IV">Talaba IV</option>
                                        <option value="Talaba V">Talaba V</option>
                                        <option value="Talaba VI">Talaba VI</option>
                                        <option value="Talaba VII">Talaba VII</option>
                                        <option value="Zapote I">Zapote I</option>
                                        <option value="Zapote II">Zapote II</option>
                                        <option value="Zapote III">Zapote III</option>
                                        <option value="Zapote IV">Zapote IV</option>
                                        <option value="Zapote V">Zapote V</option>
                                    </select>
                                    {{-- <input id="barangay" name="barangay" type="text"
                                        x-model="addressData.barangay" class="text-xm rounded-md border-gray-300"
                                        placeholder="barangay"> --}}
                                    <span x-text="errors.barangay" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">City/Municipality</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <input id="municipality" name="municipality" type="text"
                                        x-model="addressData.municipality" x-mode="addressData.municipality"
                                        class="text-xm rounded-md border-gray-300" value="Bacoor">
                                    <span x-text="errors.municipality" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                {{-- <div class="w-full flex flex-col md:flex-row items-center md:space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="region" class="text-sm ">Region</label>
                                        <input id="region" name="region" type="text"
                                            x-model="addressData.region" class="text-xm rounded-md border-gray-300"
                                            placeholder="region">
                                        <span x-text="errors.region" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="zip_code" class="text-sm ">Zip Code</label>
                                        <input id="zip_code" name="zip_code" type="text"
                                            x-model="addressData.zipCode" class="text-xm rounded-md border-gray-300"
                                            placeholder="zip code">
                                        <span x-text="errors.zipCode" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200"
                                    @click="setCurrentPhase('profile')">Back</button>
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                    @click="addAddress()">Next</button>
                            </div>
                        </div>
                    </template>

                    <template x-if="currentPhase === 'account'">
                        <div id="_account">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">Email</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <input id="email" name="email" type="email" x-model="accountData.email"
                                        class="text-xm rounded-md border-gray-300" placeholder="sample@email.com">
                                    <span x-text="errors.email" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="last_name" class="">Password</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <div class="flex items-center text-xm rounded-md border border-gray-300 pr-2">
                                        <input id="password" name="password" type="password"
                                            x-model="accountData.password"
                                            class="text-xm border-0 w-full rounded-md focus:border-none focus:outline-none focus:ring-0"
                                            placeholder="password">
                                        <i class='bx bx-low-vision text-lg text-gray-300 cursor-pointer'
                                            onclick="togglePasswordVisibility('password')"></i> {{-- eye icon --}}
                                    </div>
                                    <span x-text="errors.password" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <div class="flex items-start space-x-1">
                                        <label for="confirmPassword" class="">Confirm Password</label>
                                        <span class="text-red-500"> *</span>
                                    </div>
                                    <div class="flex items-center text-xm rounded-md border border-gray-300 pr-2">
                                        <input id="confirmPassword" name="confirmPassword" type="password"
                                            x-model="accountData.confirmPassword"
                                            class="text-xm border-0 w-full rounded-md focus:border-none focus:outline-none focus:ring-0"
                                            placeholder="confirm password" required>
                                        <i class='bx bx-low-vision text-lg text-gray-300 cursor-pointer'
                                            onclick="togglePasswordVisibility('confirmPassword')"></i>
                                        {{-- eye icon --}}
                                    </div>
                                    <span x-text="errors.confirmPassword"
                                        class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <script>
                                    function togglePasswordVisibility(inputId) {
                                        const passwordInput = document.getElementById(inputId);
                                        const eyeIcon = document.querySelector(`[for=${inputId}] i.bx-low-vision`);

                                        if (passwordInput.type === 'password') {
                                            passwordInput.type = 'text';
                                            eyeIcon.classList.remove('bx-low-vision');
                                            eyeIcon.classList.add('bx-show');
                                        } else {
                                            passwordInput.type = 'password';
                                            eyeIcon.classList.remove('bx-show');
                                            eyeIcon.classList.add('bx-low-vision');
                                        }
                                    }
                                </script>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200"
                                    @click="setCurrentPhase('address')">Back</button>
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                    @click="submitData()">Submit</button>
                            </div>
                        </div>
                    </template>

                </div>
            </div>
        </div>
    </div>
    <script>
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        };

        function isValidPassword(password) {
            const lengthRegex = /.{8,}/;
            const uppercaseRegex = /[A-Z]/;
            const specialCharacterRegex = /[!@#$%^&*(),.?":{}|<>]/;

            return lengthRegex.test(password) &&
                uppercaseRegex.test(password) &&
                specialCharacterRegex.test(password);
        }

        window.register = () => {
            return {
                currentPhase: 'profile',
                phases: ['profile', 'address', 'account'],
                profileData: {
                    lastName: '',
                    firstName: '',
                    middleName: '',
                    age: '',
                    sex: '',
                    phone: '',
                },
                addressData: {
                    lot: '',
                    street: '',
                    subdivision: '',
                    barangay: '',
                    municipality: '',
                },
                accountData: {
                    email: '',
                    password: '',
                    confirmPassword: '',
                },
                errors: {},


                setCurrentPhase(phase) {
                    this.currentPhase = phase;
                },


                validateProfileFields() {
                    this.errors = {};


                    if (!this.profileData.lastName) {
                        this.errors.lastName = 'Last name is required.';
                    }
                    if (!this.profileData.firstName) {
                        this.errors.firstName = 'First name is required.';
                    }
                    if (!this.profileData.age) {
                        this.errors.age = 'Please specify your age.';
                    }
                    if (!this.profileData.sex) {
                        this.errors.sex = 'Please specify your sex.';
                    }
                    if (!this.profileData.phone) {
                        this.errors.phone = 'Please inlcude you phone number.';
                    }

                    return Object.keys(this.errors).length === 0;
                },


                validateAddressFields() {
                    this.errors = {};


                    if (!this.addressData.lot) {
                        this.errors.lot = 'Lot/Block/House number is required.';
                    }
                    if (!this.addressData.municipality) {
                        this.errors.municipality = 'City/Municipality is required.';
                    }
                    if (!this.addressData.barangay) {
                        this.errors.barangay = 'Barangay is required.';
                    }
                    if (!this.addressData.street) {
                        this.errors.street = 'Street number is required.';
                    }

                    return Object.keys(this.errors).length === 0;
                },

                validateAccountFields() {
                    this.errors = {};

                    if (!this.accountData.email) {
                        this.errors.email = 'Email is required.';
                    } else if (!isValidEmail(this.accountData.email)) {
                        this.errors.email = 'Invalid email';
                    }

                    if (!this.accountData.password) {
                        this.errors.password = 'Password is required.';
                    } else if (!isValidPassword(this.accountData.password)) {
                        this.errors.password =
                            'Password must be at least 8 characters, with at least one uppercase letter, and at least one special character.';
                    }

                    if (!this.accountData.confirmPassword) {
                        this.errors.confirmPassword = 'This field is required';
                    } else if (this.accountData.password !== this.accountData.confirmPassword) {
                        this.errors.confirmPassword = 'Passwords must match.';
                    }

                    return Object.keys(this.errors).length === 0;
                },


                addProfile() {
                    if (this.validateProfileFields()) {
                        const currentIndex = this.phases.indexOf(this.currentPhase);
                        const nextPhase = this.phases[currentIndex + 1];
                        this.setCurrentPhase(nextPhase);
                        console.log(nextPhase);
                    }
                },


                addAddress() {
                    console.log('clicked');
                    if (this.validateAddressFields()) {
                        const currentIndex = this.phases.indexOf(this.currentPhase);
                        const nextPhase = this.phases[currentIndex + 1];
                        this.setCurrentPhase(nextPhase);
                    }
                },


                removeData(phase) {
                    if (phase === 'profile') {
                        this.profileData = {
                            lastName: '',
                            firstName: '',
                            middleName: '',
                            age: '',
                            sex: '',
                            phone: '',
                        };
                    } else if (phase === 'address') {
                        this.addressData = {
                            lot: '',
                            street: '',
                            subdivision: '',
                            barangay: '',
                            municipality: '',
                        };
                    }
                },


                async submitData() {
                    if (this.validateAccountFields()) {
                        try {
                            const data = {
                                profile: this.profileData,
                                address: this.addressData,
                                account: this.accountData,
                            }
                            const config = {
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            }
                            const response = await axios.post('/register', data, config)

                            console.log(response.data)

                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successfull',
                                text: 'You are now registered!',
                            })

                            setTimeout(() => {
                                window.location.href = '/login';
                            }, 3000);

                        } catch (error) {

                            console.log(error)

                            Swal.fire({
                                icon: 'info',
                                title: error.response.data.error,
                            });
                        }
                    }
                },

            };
        };
    </script>
</x-guest-layout>
