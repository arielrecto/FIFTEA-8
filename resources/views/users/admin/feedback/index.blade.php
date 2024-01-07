<x-panel>
    <section class="md:p-5 py-5 flx flex-col space-y-5">
        <div class="flex items-start space-x-4">
            <div class="w-full py-4 md:px-2">
                <table class="min-w-full bg-white border border-gray-200">
                    <!-- Head -->
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 text-left">User</th>
                            <th class="px-4 py-2 bg-gray-100 text-left">Message</th>
                            <th class="px-4 py-2 bg-gray-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows -->
                        @forelse ($feedbacks as $feedback)
                            <tr>

                                <td class="px-4 text-sm py-2">{{ $feedback->user->name }}</td>
                                <td class="px-4 text-sm py-2">{{ $feedback->message }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.feedbacks.show', ['feedback' => $feedback->id]) }}"
                                        class="text-blue-500 hover:underline">
                                        <button class="px-2 py-1 bg-blue-200 hover:bg-blue-300 rounded">
                                            <i class="fi fi-rr-eye"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-red-600 text-center">No Item</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-panel>
