<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-center justify-center space-x-4">
            <div class="w-fit flex flex-col">
                <div class="py-4 flex justify-between">
                    <h1 class="text-xl font-semibold">
                        Current Gcash QR Code
                    </h1>
                  <a href="{{route('admin.gcash.edit', ['gcash' => $gcash->id])}}" class="px-4 py-2 text-sm text-white bg-blue-700 rounded">Edit</a>
                </div>
                <div class="w-full h-full flex items-center ">
                        <img src="{{route('media.gcash', ['name' => $gcash->image])}}" alt="" srcset="" class="h-96 w-auto object object-center">
                </div>
            </div>
        </div>
    </section>


</x-panel>
