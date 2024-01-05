<x-panel>
    <section class="p-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="flex flex-col gap-2 w-full">
                <div class="w-3/4 py-4 px-2">
                    <h1 class="text-xl font-bold">
                        feedback - {{ $feedback->user->name }}
                    </h1>
                </div>
                <div class="w-full h-auto p-5 rounded-lg border-2">
                    {{ $feedback->message }}
                </div>
                <div>

                    @if (!$feedback->is_display)
                        <a
                            href="{{ route('admin.feedbacks.show', ['feedback' => $feedback->id]) }}?display=1">
                            Display
                        </a>
                    @else
                        <a
                            href="{{ route('admin.feedbacks.show', ['feedback' => $feedback->id]) }}?display=0">
                            remove
                        </a>
                    @endif

                </div>
            </div>


            {{-- <div class="w-1/4 flex flex-col justify-center">
                <div class="p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg flex flex-col items-center">
                        <i class='bx bx-cart-alt text-sbgreen text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalOnline}}</h2>
                        <p class="leading-relaxed">Online Orders</p>
                    </div>
                </div>
                <div class="p-4 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg flex flex-col items-center">
                        <i class='bx bx-store text-sbgreen text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$totalWalkin}}</h2>
                        <p class="leading-relaxed">Walk-in Orders</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
</x-panel>
