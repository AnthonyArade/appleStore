@foreach ($products as $product)
    <div class="border-b border-r border-gray-300 text-center p-4">

        <div class="aspect-square">
            <img src="{{ $product->image }}" alt="" class="w-full h-full object-center object-cover">
        </div>

        <div class="pt-10 pb-4 px-10">
            <p class="text-xs font-light text-orange-500 mb-2">
                Nouveau
            </p>

            <h3 class="text-md font-light text-gray-700">
                {{ $product->name }}
            </h3>
            <p class="text-base text-gray-900 mt-3">{{ $product->price }}€</p>
            <div class="flex justify-center space-x-2 mt-4">
                @php
                    $allowedColors = [
                        'Black' => 'bg-gray-900',
                        'Blue' => 'bg-blue-500',
                        'Silver' => 'bg-gray-300',
                        'Purple' => 'bg-purple-500',
                        'Gray' => 'bg-gray-500',
                        'White' => 'bg-white',
                        'Red' => 'bg-red-500',
                        'Green' => 'bg-green-400',
                        'Pink' => 'bg-pink-400',
                        'Beige' => 'bg-yellow-100',
                        'Brown' => 'bg-amber-800',
                        'Yellow' => 'bg-yellow-400',
                        'Amber' => 'bg-amber-400',
                        'Gold' => 'bg-yellow-500',
                        'Lime' => 'bg-lime-400',
                        'Blue Light' => 'bg-blue-300',
                        'Blue Dark' => 'bg-blue-600',
                        'Gray Light' => 'bg-gray-100',
                        'Gray Dark' => 'bg-gray-800',
                        'Green Light' => 'bg-green-300',
                        'Purple Light' => 'bg-purple-400',
                        'Amber Dark' => 'bg-amber-700',
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
