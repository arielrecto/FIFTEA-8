<x-app-layout>
    <x-user-header/>
    <section>
        <div class="max-w-[1300px] mx-auto px-4 pt-24">
            <a href="{{ route('products') }}" class="rounded bg-gray-200 hover:bg-gray-300 px-4 py-1 flex items-center w-fit">
                <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                back
            </a>
            <div class="flex items-center justify-between space-x-4 py-4">
                <img src="" alt=""
                class="w-[500px] h-[400px] rounded bg-gray-300">
                <div class="flex flex-col space-y-3">
                    <span class="text-base font-semibold text-gray-400">Milktea</span>
                    <h1 class="text-4xl font-bold ">White Caramel</h1>
                    <p class="text-base text-gray-600">Savor the exquisite blend of creamy white milk and sophisticated caramel in our White Caramel Milk Tea for a sip of pure delight and indulgence.</p>
                    <div class="flex items-center space-x-8">
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Sugar Level</label>
                            <select name="" id="" class="w-[150px] rounded px-4 py-2 text-sm border border-gray-300">
                                <option value="0">0%</option>
                                <option value="0.25">25%</option>
                                <option value="0.5">50%</option>
                                <option value="0.75">75%</option>
                                <option value="1">100%</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Extras</label>
                            <select name="" id="" class="w-[200px] rounded px-4 py-2 text-sm border border-gray-300">
                                <option value="Pearl">Pearl</option>
                                <option value="Nata De Coco">Nata De Coco</option>
                                <option value="Crushed Cookies">Crushed Cookies</option>
                                <option value="Cheesecake">Cheesecake</option>
                                <option value="Cream Puff">Cream Puff</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-start space-x-8">
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Size</label>
                            <select name="" id="" class="w-[150px] rounded px-4 py-2 text-sm border border-gray-300">
                                <option value="small">Small</option>
                                <option value="Regular">Regular</option>
                                <option value="large">Large</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <label for="" class="text-base font-semibold">Quatity</label>
                            <div class="flex items-center space-x-2">
                                <button class="py-1 px-2 hover:bg-gray-200 rounded">
                                    <i class='bx bx-minus text-lg'></i>
                                </button>
                                <p class="py-1 px-4 rounded border border-gray-300 bg-gradient-to-r from-green-400 to-blue-400 text-white">1</p>
                                <button class="py-1 px-2 hover:bg-gray-200 rounded">
                                    <i class='bx bx-plus text-lg'></i> 
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="w-full flex items-center justify-between border-t border-gray-200 py-3">
                            <p class="font-bold text-lg">&#8369;150</p>
                            <button class="px-4 py-2 rounded text-sm bg-gradient-to-r from-green-400 to-blue-400 text-white">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
