@if (session()->has('message'))

    <div 
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    class="fixed top-5 left-1/2 bg-blue-700 transform -translate-x-1/2 z-50 rounded-md">
        <div class="flex space-x-4 items-center border-2 border-blue-400 bg-blue-200 px-4 py-2 rounded-md">
            <i class='bx bx-info-circle text-blue-600 text-4xl'></i>
            <p class="poppins text-sm text-blue-700">{{session('message')}}</p>
        </div>
    </div>

@elseif (session()->has('error'))

    <div 
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    class="fixed top-5 left-1/2 bg-red-700 transform -translate-x-1/2 z-50 rounded-md">
        <div class="flex space-x-4 items-center border-2 border-red-400 bg-red-100 px-4 py-2 rounded-md">
            <i class='bx bx-block text-red-500 text-4xl'></i>
            <p class="poppins text-sm text-red-700">{{session('error')}}</p>
        </div>
    </div>

@elseif (session()->has('success'))

    <div 
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    class="fixed top-5 left-1/2 bg-green-700 transform -translate-x-1/2 z-50 rounded-md">
        <div class="flex space-x-4 items-center border-2 border-green-400 bg-green-100 px-4 py-2 rounded-md">
            <i class='bx bx-check text-green-500 text-4xl'></i>
            <p class="poppins text-sm text-green-700">{{session('success')}}</p>
        </div>
    </div>

@elseif (session()->has('warning'))

    <div 
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    class="fixed top-5 left-1/2 bg-green-700 transform -translate-x-1/2 z-50 rounded-md">
        <div class="flex space-x-4 items-center border-2 border-orange-400 bg-orange-100 px-4 py-2 rounded-md">
            <i class='bx bx-error text-orange-500 text-4xl'></i>
            <p class="poppins text-sm text-orange-700">{{session('warning')}}</p>
        </div>
    </div>
    
@endif