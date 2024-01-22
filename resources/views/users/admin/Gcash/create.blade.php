<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="flex flex-col gap-2 w-full">
                <div class="w-3/4 py-4 px-2">
                    <h1 class="text-xl font-bold">
                        Gcash
                    </h1>
                </div>
               <div class="w-full h-full flex items-center ">
                    <form action="{{route('admin.gcash.store')}}" method="post" x-data="showImage" enctype="multipart/form-data">

                        @csrf
                        <template x-if="preview !== null">
                            <img :src="preview" alt="" srcset="" class="w-32 h-auto object object-center">
                        </template>

                        <input type="file" class="" name="image" @change="imageHandler($event)" />
                        @if($errors->has('image'))
                            <p class="text-xs text-error">{{$errors->first('image')}}</p>
                        @endif
                        <button class="px-4 py-2 rounded bg-teal-600 text-white font-semibold">Upload</button>
                    </form>

                    {{-- <div>
                        <img src="{{ asset('storage/gcash/' . $gcash->image) }}" alt="" class="w-96 h-96">
                   </div> --}}
               </div>
            </div>
        </div>
    </section>

    @push('js')
    <script>
        const showImage = () => ({
            preview : null,
            imageHandler(e){
                const {files} = e.target;

                const reader = new FileReader();
                reader.onload = function(){
                    this.preview = reader.result
                }.bind(this)

                reader.readAsDataURL(files[0]);
            }
        })
    </script>
    @endpush
</x-panel>
