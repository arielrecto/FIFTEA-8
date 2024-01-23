<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fif'tea-8</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Quill -->
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">


    <!-- flaticon -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans bg-white relative">
    <div class="overflow-x-hidden w-full h-auto min-h-screen bg-white">
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-flash-messages />

    @auth
        @if (auth()->user()->hasRole('customer'))
            <button id="openModal" data-modal-target="chat" data-modal-toggle="chat" type="button"
                class="absolute bottom-20 right-20 p-2 px-3 rounded-full bg-white hover:bg-pink-400 border-2 border-pink-400 group">
                <i class='bx bx-message-rounded-dots text-4xl text-pink-400 group-hover:text-white'></i>
            </button>

            <div id="chat-modal" class="hidden fixed top-0 right-0 z-50 p-4 w-full h-full bg-black bg-opacity-10 "
                x-data="conversation" x-init="getConversation({{ Auth::user()->id }})">
                <!-- Modal content -->
                <div class="absolute top-6 right-6 bg-white rounded-lg shadow-lg w-96">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-2 border-b rounded-t dark:border-gray-300">
                        <button id="closeModal" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="d-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <!-- component -->

                        <template x-if="convo !== null">
                            <div class="flex-1 p:2 justify-between flex flex-col h-[580px]">
                                <div class="flex sm:items-center border-b-2 border-gray-200">
                                    <div class="relative flex items-center space-x-4">
                                        <div class="flex flex-col leading-tight">
                                            <div class="text-xl flex items-center space-x-2 py-2">
                                                <img src="{{ asset('images/logo.png') }}" alt="" class="w-10 h-10">
                                                <span class="text-gray-700 mr-3">Fif'Tea-8</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="messages"
                                    class="flex flex-col-reverse space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">

                                    <template x-if="convo.messages.length !== 0">
                                        <template x-for="message in convo.messages" :key="message.id">
                                            <div class="chat-message">
                                                <div
                                                    :class="`${ message.sender_id == '{{ Auth::user()->id }}' ? 'flex items-end justify-end'  : 'flex items-start' }`">
                                                    <div
                                                        :class="`${ message.sender_id == '{{ Auth::user()->id }}' ? 'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end'  : 'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start' }`">
                                                        <div class="flex flex-col">
                                                            <span
                                                                :class="`${ message.sender_id == '{{ Auth::user()->id }}' ? 'px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white'  : 'px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600' }`"
                                                                x-text="message.content"></span>
                                                            <template
                                                                x-if="message.sender_id == '{{ Auth::user()->id }}' && message.seen === 1">
                                                                <span class="text-xs text-end">
                                                                    seen
                                                                </span>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                        </template>

                                        <div class="chat-message">
                                            <div class="flex items-end justify-end">
                                                <div
                                                    class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                                    <div><span
                                                            class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">Your
                                                            error message says permission denied, npm global installs
                                                            must
                                                            be
                                                            given root privileges.</span></div>
                                                </div>
                                                <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                                    alt="My profile" class="w-6 h-6 rounded-full order-2">
                                            </div>
                                        </div>
                                    </template>
                                    <template class="convo.messages === 0">
                                        <div class="w-full h-full justify-center items-center">
                                            <h1 class="text-gray-500">
                                                Start Conversation
                                            </h1>
                                        </div>
                                    </template>
                                </div>
                                <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                                    <div class="relative flex ">
                                        <input type="text" x-model="message" placeholder="Write your message!"
                                            class="w-full text-sm focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-4 bg-gray-200 rounded-md py-3">
                                        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                                            <button type="button" @click="sendMessage"
                                                class="inline-flex items-center justify-center rounded px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                                <span class="font-bold text-sm">Send</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-4 w-4 ml-2 transform rotate-90">
                                                    <path
                                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="convo === null">
                            <div class="flex items-center w-full justify-center">
                                <button class="btn btn-sm btn-accent" @click="createConversation">Message
                                    Admin</button>
                            </div>
                        </template>
                        <style>
                            .scrollbar-w-2::-webkit-scrollbar {
                                width: 0.25rem;
                                height: 0.25rem;
                            }

                            .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
                                --bg-opacity: 1;
                                background-color: #f7fafc;
                                background-color: rgba(247, 250, 252, var(--bg-opacity));
                            }

                            .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
                                --bg-opacity: 1;
                                background-color: #edf2f7;
                                background-color: rgba(237, 242, 247, var(--bg-opacity));
                            }

                            .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
                                border-radius: 0.25rem;
                            }
                        </style>

                        <script>
                            const el = document.getElementById('messages')
                            el.scrollTop = el.scrollHeight
                        </script>

                    </div>
                </div>
            </div>
        @endif
    @endauth

    <script>
        const modal = document.getElementById('chat-modal')
        const openModal = document.getElementById('openModal')
        const closeModal = document.getElementById('closeModal')

        openModal.addEventListener('click', () => {
            modal.classList.remove('hidden')
        })

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden')
        })
    </script>

    @push('js')
        <script>
            const conversation = () => ({
                convo: null,
                message: '',
                async getConversation() {
                    try {

                        const response = await axios.get(`/conversation`);

                        this.convo = {
                            ...response.data.conversation
                        }

                        setTimeout(() => {
                            this.getConversation()
                        }, 5000);

                    } catch (error) {
                        console.log(error.response);
                    }
                },
                async createConversation() {
                    try {

                        const config = {
                            header: {
                                accept: "application/json",
                                "content-type": "application/json",
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                        };

                        const response = await axios.post('conversation/create', config);


                        this.convo = {
                            ...response.data.conversation
                        }

                    } catch (error) {
                        console.log(error);
                    }
                },
                async sendMessage() {
                    try {

                        const config = {
                            header: {
                                accept: "application/json",
                                "content-type": "application/json",
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                        };

                        const data = {
                            message: this.message
                        }
                        console.log(this.message);
                        const response = await axios.post(`conversation/${this.convo.id}/message/send`, data,
                            config);

                        this.message = null

                    } catch (error) {
                        console.log(error);
                    }

                }
            });
        </script>
    @endpush


    @stack('js')
</body>

</html>
