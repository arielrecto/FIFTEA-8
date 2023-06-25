<x-panel>
    <div class="p-4">
        <div class="w-full border-2 rounded-lg flex flex-col space-y-5">
            <h1 class="w-full flex justify-center capitalize text-xl p-5">
                create employee account
            </h1>
            @if(Session::has('message'))
            <div class="alert alert-success shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{Session::get('message')}}</span>
                </div>
              </div>
            @endif
            <div class="h-[36rem] p-4">
              <form action="{{route('admin.employee.store')}}" method="post" class="flex flex-col space-y-5">
                @csrf
                <div class="w-full flex flex-col gap-2">
                    <label for="">name</label>
                    <input type="text" placeholder="Name" name="name" class="input w-full" />
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label for="">Email</label>
                    <input type="email" placeholder="Email" name="email" class="input w-full" />
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label for="">password</label>
                    <input type="password" placeholder="Password" name="password" class="input w-full" />
                </div>
                <div class="w-full flex flex-row-reverse">
                    <button class="btn">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-panel>
