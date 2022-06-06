@extends('index')

@section('content')

    @include('product.create_form')

    <x-table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th class="w-20">Id</x-table.th>
                <x-table.th>Product</x-table.th>
                <x-table.th>Substance</x-table.th>
                <x-table.th>Manufacturer</x-table.th>
                <x-table.th>Cost</x-table.th>
                <x-table.th>Options</x-table.th>
            </x-table.tr>
        </x-table.thead>

        <x-table.tbody>
            @foreach ($products as $product)
                <x-table.tr>
                    <x-table.td>{{ $product->id }}</x-table.td>
                    <x-table.td>{{ $product->title }}</x-table.td>
                    <x-table.td>{{ $product->substance->title }}</x-table.td>
                    <x-table.td>{{ $product->manufacturer->title }}</x-table.td>
                    <x-table.td>{{ $product->cost }}</x-table.td>
                    <x-table.td>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('product.show', $product->id) }}">
                                <x-button class="bg-amber-500 hover:bg-amber-700 focus:ring-amber-500"
                                    formaction='google.com'>show </x-button>
                            </a>
                            <a href="{{ route('product.edit', $product->id) }}">
                                <x-button class="bg-cyan-500 hover:bg-cyan-700 focus:ring-cyan-500">update</x-button>
                            </a>
                            <form id="button_delete" method="POST" action="{{ route('product.destroy', $product->id) }}"
                                style="display: inline">
                                @method('DELETE')
                                @csrf

                                <x-button class="bg-red-500 hover:bg-red-700 focus:ring-red-500">delete</x-button>

                            </form>
                        </div>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    {{ $products->links('vendor.pagination.tailwind') }}
@endsection
