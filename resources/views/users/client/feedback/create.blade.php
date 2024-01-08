@php
    use App\Enums\OrderStatus;
@endphp

<x-app-layout>

    <x-user-header />

    <section class="bg-gray-100 h-auto min-h-screen">
        <div class="max-w-[1300px] mx-auto px-4 pt-24 pb-4">
            <div class="flex items-start justify-between space-x-6">
                <div class="w-full flex flex-col">

                    <h1 class="text-3xl font-bold tracking-widest">
                        Add Feedback
                    </h1>

                    <form action="{{ route('client.feedbacks.store') }}" method="post" class="flex flex-col gap-2 w-full">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-sm text-gray-700">Type your message</label>
                            <textarea class="w-full h-64 border border-gray-300" name="message" placeholder="message">

                            </textarea>
                            {{-- @if (errors->has('message'))
                            <p>{{errors->first('message')}}</p>
                            @endif --}}
                        </div>
                        <button class="mt-2 px-4 py-2 rounded bg-blue-700 text-white">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
