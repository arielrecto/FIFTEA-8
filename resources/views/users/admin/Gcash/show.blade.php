<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="flex flex-col gap-2 w-full">
                <div class="w-3/4 py-4 px-2 flex justify-between">
                    <h1 class="text-xl font-bold">
                        Gcash
                    </h1>
                  <a href="{{route('admin.gcash.edit', ['gcash' => $gcash->id])}}" class="btn btn-accent btn-xs">Edit</a>
                </div>
               <div class="w-full h-full flex items-center ">
                    <img src="{{route('media.gcash', ['name' => $gcash->image])}}" alt="" srcset="" class="h-96 w-auto object object-center">
               </div>
            </div>



        </div>
    </section>


</x-panel>
