<div
    class="border rounded-xl bg-white shadow-md overflow-hidden hover:shadow-xl border-gray-300 text-center p-4 transition">
    <div class="h-64 bg-gray-300 flex items-center justify-center">
        <img src="{{ $product->image }}" alt="" class="h-64 object-center object-cover">
    </div>
    <div class="p-4 text-left">
        <span class="semi-bold text-xs font-light text-orange-500 mb-2">
            Nouveau - {{ $product->category->name }}
        </span>

        <h3 class="text-lg bold mt-2 mb-2 font-light text-gray-800">
            {{ $product->name }}
        </h3>

        <p class="text-sm mb-4 font-light text-gray-600">
            {{ $product->description }}
        </p>
        <div class="flex flex-start space-x-2 mt-4">
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
        <div class="flex justify-between items-center ">
            <span class="text-2xl font-bold text-blue-600">{{ $product->price }}€</span>
            <a href="{{route('store.show',$product->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Voir
            </a>
        </div>
    </div>
</div>
