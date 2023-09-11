<x-app-layout>
    <section>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-admin-header />
        @else
            <x-header :cart="$cart" :subtotal="$subTotal" />
        @endif
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28 pt-24">
            <div class="w-full  bg-white rounded-lg shadow-sm flex p-5">
                <div class="w-1/5">
                    <img src="{{asset($c_product->product->image)}}" alt="">
                </div>
                <div class="flex-grow p-2 flex flex-col gap-2">
                    <h1 class="text-3xl font-bold">
                        {{$c_product->name}}
                    </h1>
                    <p>
                        <span>Description : </span>
                       {!!$c_product->description!!}
                    </p>
                    <p>
                        <span>Size :</span>
                        {{$c_product->size}}
                    </p>
                    <p>
                        <span>Quantity</span>
                        {{$c_product->quantity}}
                    </p>

                    @php
                       $extras = json_decode($c_product->extras)
                    @endphp
                    <p>
                        <span>Extras : </span>
                        @foreach ($extras->data as $extra)
                            {{$extra->name}},
                        @endforeach
                    </p>
                    <p class="w-full flex flex-row-reverse">P {{$c_product->total}}</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
