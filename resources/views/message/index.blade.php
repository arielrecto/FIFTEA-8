<x-panel>

    <div class="flex flex-col space-y-4 p-4">
        <div class="py-2 px-2 border-b border-gray-300">
            <h1 class="font-semibold text-xl">Messages</h1>
        </div>

        <div class="flex flex-col space-y-2 ">

            @forelse ($conversations as $conversation)
                <a href="{{ route('admin.messages.show', ['conversation' => $conversation->id]) }}"
                    class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                    <div class="flex items-center space-x-3">
                        @if ($conversation->owner->profile->image)
                            <img src="{{ asset('storage/' . $conversation->owner->profile->image) }}"
                                class="w-14 h-14 rounded-full" />
                        @else
                            @if ($conversation->owner->profile?->sex == 'Male')
                                <img
                                src="{{asset('images/male.png')}}" alt="Image"
                                class="w-14 h-14 rounded-full" />
                            @else
                                <img
                                src="{{asset('images/female.png')}}" alt="Image"
                                class="w-14 h-14 rounded-full" />
                            @endif
                        @endif
                        <div>
                            <h1 class="text-lg font-semibold">
                                {{ $conversation->owner->profile->first_name }}
                                {{ $conversation->owner->profile->last_name }}
                            </h1>

                            @foreach ($conversation->messages as $message)
                                <p class="text-sm {{$message->seen == false ? 'font-bold text-gray-800' : 'font-normal text-gray-500'}}">{{$message->content}}</p>
                            @endforeach

                        </div>
                    </div>
                    {{-- <span class="text-sm">{{date('h:i A' , strtotime($message->created_at))}}</span> --}}
                </a>

            @empty
                <a href="#" class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                    <div class="flex items-center space-x-3">
                        No Conversation
                    </div>
                </a>
            @endforelse


            {{--
            <a href="{{ route('admin.messages.show') }}"
                class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="" class="w-14 h-14 rounded-full">
                    <div>
                        <h1 class="text-lg font-semibold">John Doe</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam, voluptates.</p>
                    </div>
                </div>
                <span class="text-sm">12:00 PM</span>
            </a>

            <a href="{{ route('admin.messages.show') }}"
                class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="" class="w-14 h-14 rounded-full">
                    <div>
                        <h1 class="text-lg font-semibold">John Doe</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam, voluptates.</p>
                    </div>
                </div>
                <span class="text-sm">12:00 PM</span>
            </a>

            <a href="{{ route('admin.messages.show') }}"
                class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="" class="w-14 h-14 rounded-full">
                    <div>
                        <h1 class="text-lg font-semibold">John Doe</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam, voluptates.</p>
                    </div>
                </div>
                <span class="text-sm">12:00 PM</span>
            </a>

            <a href="{{ route('admin.messages.show') }}"
                class="flex items-center justify-between p-2 rounded-md border border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="" class="w-14 h-14 rounded-full">
                    <div>
                        <h1 class="text-lg font-semibold">John Doe</h1>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam, voluptates.</p>
                    </div>
                </div>
                <span class="text-sm">12:00 PM</span>
            </a> --}}
        </div>
    </div>


</x-panel>
