<x-guest-layout>

    <div class="w-full h-full flex bg-white">

        <div class="w-full flex container mx-auto p-32 pb-0 space-x-6">
            <div class="w-1/2 h-full ">
                <div class="flex flex-col space-y-2">
                    <h1 class="text-xl font-semibold text-sbgreen">Welcome to FifTea-8</h1>
                    <p class="text-gray-500">temporibus saepe assumenda, magnam rem perspiciatis distinctio eos
                        repudiandae cupiditate eius aspernatur alias?</p>
                </div>
                <div class="w-full p-8">
                    <img class="w-full h-full " src="{{ asset('images/signup.png') }}" alt="">
                </div>
            </div>

            <div class="w-1/2 flex flex-col space-y-8 px-8">
                <div class="flex flex-col space-y-3">
                    <p class="text-sm text-gray-500">START HERE</p>
                    <h1 class="text-2xl font-bold">Sign up to FifTea-8</h1>
                    <div class="flex space-x-2">
                        <p class="text-base text-gray-500">Alreay have an account?</p>
                        <a href="{{ route('login') }}"
                            class="text-base text-blue-500 hover:underline cursor-pointer">Login</a>
                    </div>
                </div>

                <div class="w-full"  x-data="register">

                    <template x-if="currentPhase === 'profile'">
                        <div id="_profile" class="flex flex-col space-y-10">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col space-y-1">
                                    <label for="last_name" class="text-sm ">Last Name</label>
                                    <input id="last_name" name="last_name" type="text" x-model="profileData.lastName"
                                        class="text-xm rounded-md border-gray-300" placeholder="last name">
                                    <span x-text="errors.lastName" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="first_name" class="text-sm ">First Name</label>
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

                                <div class="w-full flex items-center justify-start space-x-6">
                                    <div class="flex flex-col space-y-1">
                                        <label for="age" class="text-sm ">Age</label>
                                        <input id="age" name="age" type="number" x-model="profileData.age"
                                            class="text-xm rounded-md border-gray-300" placeholder="age">
                                            <span x-text="errors.age" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="flex flex-col space-y-1">
                                        <label for="sex" class="text-sm ">Sex</label>
                                        <select name="sex" id="sex" x-model="profileData.sex"
                                            class="text-xm rounded-md border-gray-300">
                                            <option selected>Select Sex</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span x-text="errors.sex" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="phone" class="text-sm ">Phone</label>
                                    <input id="phone" name="phone" type="number" x-model="profileData.phone"
                                        class="text-xm rounded-md border-gray-300" placeholder="ex. 09123456789">
                                    <span x-text="errors.phone" class="text-red-500 text-xs capitalize"></span>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white" @click="addProfile()">Next</button>
                            </div>
                        </div>
                    </template>


                    <template x-if="currentPhase === 'address'">
                        <div id="_address">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="lot" class="text-sm ">Lot</label>
                                        <input id="lot" name="lot" type="text" x-model="addressData.lot" class="text-xm rounded-md border-gray-300" placeholder="lot number">
                                        <span x-text="errors.lot" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="block" class="text-sm ">Block</label>
                                        <input id="block" name="block" type="text" x-model="addressData.block" class="text-xm rounded-md border-gray-300" placeholder="block number">
                                        <span x-text="errors.block" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="street" class="text-sm ">Street</label>
                                        <input id="street" name="street" type="text" x-model="addressData.street" 
                                        class="text-xm rounded-md border-gray-300" placeholder="street name">
                                        <span x-text="errors.street" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="subdivision" class="text-sm ">Subdivision</label>
                                        <input id="subdivision" name="subdivision" type="text"  x-model="addressData.subdivision"
                                        class="text-xm rounded-md border-gray-300" placeholder="subdivision">
                                        <span x-text="errors.subdivision" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="barangay" class="text-sm ">Barangay</label>
                                    <input id="barangay" name="barangay" type="text" x-model="addressData.barangay" 
                                    class="text-xm rounded-md border-gray-300" placeholder="barangay">
                                    <span x-text="errors.barangay" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="municipality" class="text-sm ">Municipality</label>
                                    <input id="municipality" name="municipality" type="text" x-model="addressData.municipality" x-mode="addressData.municipality" 
                                    class="text-xm rounded-md border-gray-300" placeholder="municipality">
                                    <span x-text="errors.municipality" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="region" class="text-sm ">Region</label>
                                        <input id="region" name="region" type="text" x-model="addressData.region" 
                                        class="text-xm rounded-md border-gray-300" placeholder="region">
                                        <span x-text="errors.region" class="text-red-500 text-xs capitalize"></span>
                                    </div>

                                    <div class="flex flex-col space-y-1">
                                        <label for="zip_code" class="text-sm ">Zip Code</label>
                                        <input id="zip_code" name="zip_code" type="text" x-model="addressData.zipCode"
                                        class="text-xm rounded-md border-gray-300" placeholder="zip code">
                                        <span x-text="errors.zipCode" class="text-red-500 text-xs capitalize"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200" @click="setCurrentPhase('profile')">Back</button>
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white"  @click="addAddress()">Next</button>
                            </div>
                        </div>
                    </template>

                    <template x-if="currentPhase === 'account'">
                        <div id="_account">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col space-y-1">
                                    <label for="email" class="text-sm ">Email</label>
                                    <input id="email" name="email" type="email" x-model="accountData.email"
                                        class="text-xm rounded-md border-gray-300" placeholder="sample@email.com">
                                    <span x-text="errors.email" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="password" class="text-sm ">Password</label>
                                    <input id="password" name="password" type="password" x-model="accountData.password" 
                                    class="text-xm rounded-md border-gray-300" placeholder="password">
                                    <span x-text="errors.password" class="text-red-500 text-xs capitalize"></span>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="confirm_password" class="text-sm ">Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password"
                                    class="text-xm rounded-md border-gray-300" placeholder="confirm password" required>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200" @click="setCurrentPhase('address')">Back</button>
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white" @click="submitData()">Submit</button>
                            </div>
                        </div>
                    </template>

                </div>
            </div>
        </div>
    </div>
    <script>
        window.register = () => {
            const baseUrl = "http://localhost:8000";
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
                    block: '',
                    street: '',
                    subdivision: '',
                    barangay: '',
                    municipality: '',
                    region: '',
                    zipCode: '',
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
                        this.errors.lot = 'Lot number is required.';
                    }
                    if (!this.addressData.block) {
                        this.errors.block = 'Block number is required.';
                    }
                    if (!this.addressData.municipality) {
                        this.errors.municipality = 'Municipality is required.';
                    }
                    if (!this.addressData.barangay) {
                        this.errors.barangay = 'Barangay is required.';
                    }
                    if (!this.addressData.subdivision) {
                        this.errors.subdivision = 'Subdivision number is required.';
                    }
                    if (!this.addressData.street) {
                        this.errors.street = 'Street number is required.';
                    }
                    if (!this.addressData.region) {
                        this.errors.region = 'Region number is required.';
                    }
                    if (!this.addressData.zipCode) {
                        this.errors.zipCode = 'Zip Code number is required.';
                    }

                    return Object.keys(this.errors).length === 0;
                },
    
                validateAccountFields() {
                    this.errors = {};
    
                    if (!this.accountData.email) {
                        this.errors.email = 'Email is required.';
                    }
    
                    if (!this.accountData.password) {
                        this.errors.password = 'Password is required.';
                    }
    
                    // Perform other account field validations...
    
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
                            block: '',
                            street: '',
                            subdivision: '',
                            barangay: '',
                            municipality: '',
                            region: '',
                            zipCode: '',
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
                            const response = await axios.post(baseUrl + '/register', data, config)

                            console.log(response.data)

                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successfull',
                                text: 'You are now registered!',
                            })

                            window.location.href = '/login';

                        } catch (error) {

                            console.log(error)
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Something is wrong',
                                text: error.response.data.error,
                            });
                        }
                    }
                },

            };
        };
    </script>
</x-guest-layout>
