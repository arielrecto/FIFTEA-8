<x-panel>
    <div class="w-full flex flex-col items-center justify-center py-4 md:p-4">

        <div class="w-full md:w-1/2 md:p-4 py-4 flex flex-col space-y-6">

            @if (Session::has('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                    <i class='bx bx-check-circle text-white text-xl'></i>
                    <p class="text-white text-sm text-center" >{{Session::get('message')}}</p>
                </div>
            @endif

            <div>
                <a href="{{route('admin.supply.create')}}" class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center w-fit">
                    <i class='bx bx-left-arrow-alt text-2xl text-gray-500 hover:text-gray-800'></i>
                </a>
            </div>

            <div class="flex flex-col border-b border-gray-400 pb-2">
                <h1 class="text-2xl font-semibold text-sbgreen">Edit Supply Type</h1>
                <p class="text-sm">This will be reflect to the list of supplies Type</p>
                <p class="text-sm">Note: input "addons" if the supply has a additional price in the produc to show the price input field in the add supply form
                </p>
            </div>

            <form action="{{ route('admin.supply.type.update', ['type' => $type->id]) }}" method="post" class="flex flex-col space-y-4">
                @method('put')
                @csrf
                <div class="flex flex-col space-y-2">
                    <div class="flex flex-col space-y-1">
                        <label for="name" class="text-sm">NAME <span class="text-red-500 text-base">*</span></label>
                        <input type="text" name="name" id="name" class="rounded px-4 border border-gray-300" placeholder="{{$type->name}}">
                        @error('name')
                            <div class="error text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div>
                    <button class="py-2 px-4 rounded text-white bg-sbgreen flex items-center">
                        <i class='bx bx-save mr-2'></i>
                        save
                    </button>
                </div>

            </form>
            {{-- <div class="overflow-x-auto">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

 @forelse ($types as $type)
                    <tr>
                        <th></th>
                        <td>{{$type->name}}</td>

                        <td>
                            <a href="http://">
                                <i class='bx bxs-edit-alt'></i>
                            </a>
                        </td>
                      </tr>
                    @empty
                    <tr>
                        <th>No Type</th>
                      </tr>
                    @endforelse



                  </tbody>
                </table>
              </div> --}}
        </div>

    </div>
</x-panel>
