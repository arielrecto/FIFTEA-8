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

            <div class="w-1/2 flex flex-col space-y-8 px-8" x-data="register">
                <div class="flex flex-col space-y-3">
                    <p class="text-sm text-gray-500">START HERE</p>
                    <h1 class="text-2xl font-bold">Sign up to FifTea-8</h1>
                    <div class="flex space-x-2">
                        <p class="text-base text-gray-500">Alreay have an account?</p>
                        <a href="{{ route('login') }}"
                            class="text-base text-blue-500 hover:underline cursor-pointer">Login</a>
                    </div>
                </div>

                <div class="w-full">

                    <template x-if="address === null && profile === null">
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
                                <button class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                    @click="addProfile()">Next</button>
                            </div>
                        </div>
                    </template>


                    <template x-if="profile !== null && address === null">
                        <div id="_address">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="lot" class="text-sm ">Lot</label>
                                        <input id="lot" name="lot" type="text" x-model="addressData.lot"
                                            class="text-xm rounded-md border-gray-300" placeholder="lot number">
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="block" class="text-sm ">Block</label>
                                        <input id="block" name="block" type="text"
                                            x-model="addressData.block" class="text-xm rounded-md border-gray-300"
                                            placeholder="block number">
                                    </div>

                                </div>

                                <div class="w-full flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="street" class="text-sm ">Street</label>
                                        <input id="street" name="street" type="text"
                                            x-model="addressData.street" class="text-xm rounded-md border-gray-300"
                                            placeholder="street name">
                                    </div>

                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="subdivision" class="text-sm ">Subdivision</label>
                                        <input id="subdivision" name="subdivision" type="text"
                                            x-model="addressData.subdivision"
                                            class="text-xm rounded-md border-gray-300" placeholder="subdivision">
                                    </div>
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="barangay" class="text-sm ">Barangay</label>
                                    <input id="barangay" name="barangay" type="text"
                                        x-model="addressData.barangay" class="text-xm rounded-md border-gray-300"
                                        placeholder="barangay">
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="municipality" class="text-sm ">Municipality</label>
                                    <input id="municipality" name="municipality" type="text"
                                        x-model="addressData.municipality" x-mode="addressData.municipality"
                                        class="text-xm rounded-md border-gray-300" placeholder="municipality">
                                </div>

                                <div class="flex items-center space-x-6">
                                    <div class="w-full flex flex-col space-y-1">
                                        <label for="region" class="text-sm ">Region</label>
                                        <input id="region" name="region" type="text"
                                            x-model="addressData.region" class="text-xm rounded-md border-gray-300"
                                            placeholder="region">
                                    </div>

                                    <div class="flex flex-col space-y-1">
                                        <label for="zip_code" class="text-sm ">Zip Code</label>
                                        <input id="zip_code" name="zip_code" type="text"
                                            x-model="addressData.zipCode" class="text-xm rounded-md border-gray-300"
                                            placeholder="zip code">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200"
                                    @click="removeData('profile')">Back</button>

                                <button id="submit-button" class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                    @click="addAddress()">next</button>
                            </div>
                        </div>

                    </template>



                    <template x-if="address !== null">
                        <div id="_account">
                            <div class="flex flex-col space-y-3">
                                <div class="w-full flex flex-col space-y-1">
                                    <label for="email" class="text-sm ">Email</label>
                                    <input id="email" name="email" type="email" x-model="accountData.email"
                                        class="text-xm rounded-md border-gray-300" placeholder="sample@email.com">
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="password" class="text-sm ">Password</label>
                                    <input id="password" name="password" type="password"
                                        x-model="accountData.password" class="text-xm rounded-md border-gray-300"
                                        placeholder="password">
                                </div>

                                <div class="w-full flex flex-col space-y-1">
                                    <label for="confirm_password" class="text-sm ">Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password"
                                        class="text-xm rounded-md border-gray-300" placeholder="confirm password">
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-between pt-10">
                                <button class="px-4 py-2 rounded-md bg-gray-200"
                                    @click="removeData('address')">Back</button>
                                <template x-if="address !== null">
                                    <button id="submit-button" class="px-4 py-2 rounded-md bg-sbgreen text-white"
                                        @click="submitData()">Submit</button>
                                </template>

                            </div>
                        </div>


                    </template>

                </div>
            </div>
        </div>

    </div>


    <script>
        function register() {
            const baseUrl = "http://localhost:8000";
            return {
                profileData: {
                    lastName: null,
                    middleName: null,
                    firstName: null,
                    age: null,
                    sex: null,
                    phone: null
                },
                profile: null,
                addressData: {
                    lot: null,
                    block: null,
                    street: null,
                    subdivision: null,
                    barangay: null,
                    municipality: null,
                    region: null,
                    zipCode: null,
                },
                address: null,
                accountData: {
                    email: null,
                    password: null
                },
                formData: null,
                valitdateData: null,
                account: null,
                errors: {},
                addProfile() {
                    if(this.profileValidate()){
                        return
                    }
                    this.profile = this.profileData
                },
                profileValidate(){
                    for(key in this.profileData) {
                        if(this.profileData[key] === null) {
                            this.errors[key] = `${key} Required`
                        }
                    }
                    if(Object.keys(this.errors).length !== 0){
                        return true
                    }
                    return false
                },
                addAddress() {
                    this.address = this.addressData
                },
                removeData(itemData) {
                    console.log('hello world')
                    switch (itemData) {
                        case 'profile':
                            this.profile = null
                            break;
                        case 'address':
                            this.address = null
                            break;
                    }
                },
                async submitData() {
                    try {
                        const data = {
                            ...this.accountData,
                            ...this.profile,
                            ...this.address
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
                            title: 'yehey Success',
                            text: response.data.message,
                        })

                        window.location.reload()
                    } catch (error) {

                        Swal.fire({
                            icon: 'error',
                            title: error.response.status,
                            text: error.response.data.message,
                        })
                    }
                }
            }
        }
    </script>

    {{-- <script>
            const nextButton = document.getElementById("next-button");
            const backButton = document.getElementById("back-button");
            const submitButton = document.getElementById("submit-button");
            const sections = [document.getElementById("profile"),
            document.getElementById("address"),
            document.getElementById(
                "account")];
            let currentSectionIndex = 0;

            nextButton.addEventListener("click", validateAndProceed);
            backButton.addEventListener("click", navigateBack);

            updateButtonVisibility();

            function validateAndProceed() {
                const currentSection = sections[currentSectionIndex];
                if (validateInputs(currentSection)) {
                    currentSection.style.display = "none";
                    currentSectionIndex++;
                    if (currentSectionIndex < sections.length) {
                        sections[currentSectionIndex].style.display = "block";
                    }
                    updateButtonVisibility();
                }
            }

            function navigateBack() {
                if (currentSectionIndex > 0) {
                    sections[currentSectionIndex].style.display = "none";
                    currentSectionIndex--;
                    sections[currentSectionIndex].style.display = "block";
                    updateButtonVisibility();
                }
            }

            function validateInputs(section) {
                const inputs = section.getElementsByTagName("input");
                let valid = true;
                for (let i = 0; i < inputs.length; i++) {
                    if (inputs[i].value.trim() === "") {
                        inputs[i].classList.add("border-red-500");
                        valid = false;
                    } else {
                        inputs[i].classList.remove("border-red-500");
                    }
                }
                return valid;
            }

            function updateButtonVisibility() {
                if (currentSectionIndex === 0) {
                    backButton.style.display = "none";
                } else {
                    backButton.style.display = "block";
                }

                if (currentSectionIndex === sections.length - 1) {
                    nextButton.style.display = "none";
                    if (isFormValid()) {
                        submitButton.style.display = "block";
                    } else {
                        submitButton.style.display = "none";
                    }
                } else {
                    nextButton.style.display = "block";
                    submitButton.style.display = "none";
                }
            }

            function isFormValid() {
                const inputs = document.getElementsByTagName("input");
                for (let i = 0; i < inputs.length; i++) {
                    if (inputs[i].value.trim() === "") {
                        return false;
                    }
                }
                return true;
            }

            const inputFields = document.querySelectorAll("input");
            inputFields.forEach((input) => {
                input.addEventListener("input", updateButtonVisibility);
            });
        </script> --}}

</x-guest-layout>
