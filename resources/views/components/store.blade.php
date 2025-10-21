@foreach ($products as $product)
    <div class="border-b border-r border-gray-300 text-center p-4">

        <div class="aspect-square">
            <img src="{{$product->image}}" alt="" class="w-full h-full object-center object-cover">
        </div>

        <div class="pt-10 pb-4 px-10">
            <p class="text-xs font-light text-orange-500 mb-2">
                Nouveau
            </p>

            <h3 class="text-md font-light text-gray-700">
                {{ $product->nom }}
            </h3>
            <p class="text-base text-gray-900 mt-3">{{ $product->prix }}€</p>
            <div class="flex justify-center space-x-2 mt-4">
                @php
                    $allowedColors = [
                        'Black' => 'bg-gray-900',
                        'Blue' => 'bg-blue-500',
                        'Pink' => 'bg-pink-300',
                        'Green' => 'bg-green-400',
                        'Yellow' => 'bg-yellow-400',
                        'Silver' => 'bg-gray-300',
                        'Graphite' => 'bg-gray-700',
                        'Space Gray' => 'bg-gray-800',
                        'Purple' => 'bg-purple-400',
                        'Starlight' => 'bg-yellow-100',
                        'Red' => 'bg-red-500',
                        'White' => 'bg-white',
                        'Midnight' => 'bg-gray-900',
                    ];
                @endphp
                @foreach ($product->color as $name => $colorKey)
                    @if (isset($allowedColors[$name]))
                        <span title="{{ $name }}"
                            class="inline-block rounded-full {{ $allowedColors[$name] }} w-4 h-4 shadow-inner mr-1"></span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endforeach
