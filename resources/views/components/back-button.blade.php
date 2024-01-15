
@if (Auth::user()->roles->first()->name === 'customer')
    <a href="{{ route('client.dashboard.index') }}" class="rounded border border-gray-200 hover:bg-gray-200 px-4 py-1 flex items-center w-fit text-gray-700 text-sm">
        <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
        back
    </a>
@elseif (Auth::user()->roles->first()->name === 'employee')
    <a href="{{ route('employee.order.index') }}" class="rounded border border-gray-200  hover:bg-gray-200 px-4 py-1 flex items-center w-fit text-gray-700 text-sm">
        <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
        back
    </a>
@elseif (Auth::user()->roles->first()->name === 'admin')
    <a href="{{ route('admin.dashboard.index') }}" class="rounded border border-gray-200  hover:bg-gray-200 px-4 py-1 flex items-center w-fit text-gray-700 text-sm">
        <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
        back
    </a>
@endif
