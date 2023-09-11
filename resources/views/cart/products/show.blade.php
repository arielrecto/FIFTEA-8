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
                    <img src="{{$product->image->url}}" alt="">
                </div>
                <div class="flex-grow p-2 flex flex-col gap-2">
                    <h1 class="text-3xl font-bold">
                        {{$product->name}}
                    </h1>
                    <p>
                        <span>Description : </span>
                       {!!$product->description!!}
                    </p>
                    <p>
                        <span>Size :</span>
                        {{$product->pivot->size}}
                    </p>
                    <p>
                        <span>Quantity</span>
                        {{$product->pivot->quantity}}
                    </p>

                    @php
                       $extras = json_decode($product->pivot->extras)
                    @endphp
                    <p>
                        <span>Extras : </span>
                        @foreach ($extras->data as $extra)
                            {{$extra->name}},
                        @endforeach
                    </p>
                    <p class="w-full flex flex-row-reverse">P {{$product->pivot->total}}</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
