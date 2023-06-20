<x-panel>
    <div class="p-4">

        @if (Session::has('message'))
            <p>{{Session::get('message')}}</p>
        @endif

        <form action="{{ route('admin.supply.store') }}" method="post">

            @csrf
            <input type="text" name="name" placeholder="name">
            @error('name')
                <div class="error text-xs text-red-600">{{ $message }}</div>
            @enderror
            <input type="text" name="unit_value" placeholder="unit value">
            @error('unit_value')
                <div class="error text-xs text-red-600">{{ $message }}</div>
            @enderror
            <input type="text" name="unit" placeholder="unit">
            @error('unit')
                <div class="error text-xs text-red-600">{{ $message }}</div>
            @enderror
            <input type="text" name="quantity" placeholder="quantity">
            @error('quantity')
                <div class="error text-xs text-red-600">{{ $message }}</div>
            @enderror
            <button>Add</button>
        </form>
    </div>
</x-panel>
