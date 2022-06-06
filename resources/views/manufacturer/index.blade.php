@extends('index')

@section('content')


    @include('manufacturer.create_form')


    <x-table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th class="w-20">Id</x-table.th>
                <x-table.th>manufacturer</x-table.th>
                <x-table.th>link</x-table.th>
                <x-table.th>Options</x-table.th>
            </x-table.tr>
        </x-table.thead>

        <x-table.tbody>
            @foreach ($manufacturers as $manufacturer)
                <x-table.tr>
                    <x-table.td>{{ $manufacturer->id }}</x-table.td>
                    <x-table.td>{{ $manufacturer->title }}</x-table.td>
                    <x-table.td class="w-1/4">
                        <a href="{{ $manufacturer->link }}"> {{ $manufacturer->link }}</a>
                    </x-table.td>
                    <x-table.td>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('manufacturer.show', $manufacturer->id) }}">
                                <x-button class="bg-amber-500 hover:bg-amber-700 focus:ring-amber-500"
                                    formaction='google.com'>show </x-button>
                            </a>
                            <a href="{{ route('manufacturer.edit', $manufacturer->id) }}">
                                <x-button class="bg-cyan-500 hover:bg-cyan-700 focus:ring-cyan-500">update</x-button>
                            </a>
                            <form id="button_delete" method="POST"
                                action="{{ route('manufacturer.destroy', $manufacturer->id) }}" style="display: inline">
                                @method('DELETE')
                                @csrf
                                @if ($manufacturer->medical_product->first())
                                    <x-button class="bg-slate-500" disabled>delete</x-button>
                                @else
                                    <x-button class="bg-red-500 hover:bg-red-700 focus:ring-red-500">delete</x-button>
                                @endif

                            </form>

                        </div>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    {{ $manufacturers->links('vendor.pagination.tailwind') }}
@endsection
