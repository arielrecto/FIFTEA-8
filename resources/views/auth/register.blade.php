<x-guest-layout>

<div class="w-full h-full flex ">

    <div class="w-full flex container mx-auto p-32 pb-0 space-x-6">

        <div class="w-1/2 h-full ">
            <div class="flex flex-col space-y-2">
                <h1 class="text-xl font-semibold text-sbgreen">Welcome to FifTea-8</h1>
                <p class="text-gray-500">temporibus saepe assumenda, magnam rem perspiciatis distinctio eos repudiandae cupiditate eius aspernatur alias?</p>
            </div>
            <div class="w-full p-8">
                <img class="w-full h-full " src="{{asset('images/signup.png')}}" alt="">
            </div>
        </div>

        <div class="w-1/2 flex flex-col space-y-8 px-8">
            <div class="flex flex-col space-y-3">
                <p class="text-sm text-gray-500">START HERE</p>
                <h1 class="text-2xl font-bold">Sign up to FifTea-8</h1>
                <div class="flex space-x-2">
                    <p class="text-base text-gray-500">Alreay have an account?</p>
                    <a href="{{route('login')}}" class="text-base text-blue-500 hover:underline cursor-pointer">Login</a>
                </div>
            </div>

            <div class="w-full">
                <div id="profile" class="flex flex-col space-y-10">
                    <div class="flex flex-col space-y-3">
                        <div class="w-full flex flex-col space-y-1">
                            <label for="last_name" class="text-sm ">Last Name</label>
                            <input id="last_name" name="last_name" type="text" class="text-xm rounded-md border-gray-300" placeholder="last name">
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="first_name" class="text-sm " >First Name</label>
                            <input id="first_name" name="first_name" type="text" class="text-xm rounded-md border-gray-300" placeholder="first name">
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="middle_name" class="text-sm ">Middle Name</label>
                            <input id="middle_name" name="middle_name" type="text" class="text-xm rounded-md border-gray-300" placeholder="middle name">
                        </div>
    
                        <div class="w-full flex items-center justify-start space-x-6">
                            <div class="flex flex-col space-y-1">
                                <label for="age" class="text-sm ">Age</label>
                                <input id="age" name="age" type="number" class="text-xm rounded-md border-gray-300" placeholder="age">
                            </div>
        
                            <div class="flex flex-col space-y-1">
                                <label for="sex" class="text-sm ">Sex</label>
                                <select name="sex" id="sex" class="text-xm rounded-md border-gray-300" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="phone" class="text-sm ">Phone</label>
                            <input id="phone" name="phone" type="number" class="text-xm rounded-md border-gray-300" placeholder="ex. 09123456789">
                        </div>
                    </div>
                </div>
    
                <div id="address">
                    <div class="flex flex-col space-y-3">
                        <div class="w-full flex items-center space-x-6">
                            <div class="w-full flex flex-col space-y-1">
                                <label for="lot" class="text-sm ">Lot</label>
                                <input id="lot" name="lot" type="text" class="text-xm rounded-md border-gray-300" placeholder="lot number">
                            </div>
        
                            <div class="w-full flex flex-col space-y-1">
                                <label for="block" class="text-sm " >Block</label>
                                <input id="block" name="block" type="text" class="text-xm rounded-md border-gray-300" placeholder="block number">
                            </div>
    
                        </div>

                        <div class="w-full flex items-center space-x-6">
                            <div class="w-full flex flex-col space-y-1">
                                <label for="street" class="text-sm ">Street</label>
                                <input id="street" name="street" type="text" class="text-xm rounded-md border-gray-300" placeholder="street name">
                            </div>

                            <div class="w-full flex flex-col space-y-1">
                                <label for="subdivision" class="text-sm ">Subdivision</label>
                                <input id="subdivision" name="subdivision" type="text" class="text-xm rounded-md border-gray-300" placeholder="subdivision">
                            </div>
                        </div>

                        <div class="w-full flex flex-col space-y-1">
                            <label for="barangay" class="text-sm ">Barangay</label>
                            <input id="barangay" name="barangay" type="text" class="text-xm rounded-md border-gray-300" placeholder="barangay">
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="municipality" class="text-sm " >Municipality</label>
                            <input id="municipality" name="municipality" type="text" class="text-xm rounded-md border-gray-300" placeholder="municipality">
                        </div>

                        <div class="flex items-center space-x-6">
                            <div class="w-full flex flex-col space-y-1">
                                <label for="region" class="text-sm ">Region</label>
                                <input id="region" name="region" type="text" class="text-xm rounded-md border-gray-300" placeholder="region">
                            </div>

                            <div class="flex flex-col space-y-1">
                                <label for="zip_code" class="text-sm ">Zip Code</label>
                                <input id="zip_code" name="zip_code" type="text" class="text-xm rounded-md border-gray-300" placeholder="zip code">
                            </div>   
                        </div>
                    </div>
                </div>
    
                <div id="account">
                    <div class="flex flex-col space-y-3">
                        <div class="w-full flex flex-col space-y-1">
                            <label for="email" class="text-sm ">Email</label>
                            <input id="email" name="email" type="email" class="text-xm rounded-md border-gray-300" placeholder="sample@email.com">
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="password" class="text-sm " >Password</label>
                            <input id="password" name="password" type="password" class="text-xm rounded-md border-gray-300" placeholder="password">
                        </div>
    
                        <div class="w-full flex flex-col space-y-1">
                            <label for="confirm_password" class="text-sm ">Confirm Password</label>
                            <input id="confirm_password" name="confirm_password" type="password" class="text-xm rounded-md border-gray-300" placeholder="confirm password">
                        </div>
                    </div>
                </div>

                <div class="w-full flex items-center justify-between pt-10">
                    <button id="back-button" class="px-4 py-2 rounded-md bg-gray-200">Back</button>
                    <button id="next-button" class="px-4 py-2 rounded-md bg-sbgreen text-white">Next</button>
                    <button id="submit-button" class="px-4 py-2 rounded-md bg-sbgreen text-white">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>


</x-guest-layout>

{{-- <script>
    const nextButton = document.getElementById("next-button");
    const backButton = document.getElementById("back-button");
    const submitButton = document.getElementById("submit-button");
    const sections = [document.getElementById("profile"), document.getElementById("address"), document.getElementById("account")];
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
  </script>
   --}}
  




