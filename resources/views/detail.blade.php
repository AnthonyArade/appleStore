@extends('layouts.appPublic')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Product Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="md:flex">
                <!-- Product Image -->
                <div class="md:flex-shrink-0 md:w-1/2">
                    <div
                        class="h-80 md:h-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-8">
                        <img id="product-image" src="{{ $product->image }}" alt="{{ $product->name }}"
                            class="h-64 object-contain transition-all duration-300">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="p-8 md:w-1/2">
                    <!-- Product Name -->
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>

                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-gray-600">4.5 (128 reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        <span class="text-3xl font-bold text-indigo-700">{{ $product->price }}€</span>
                        {{-- <span class="ml-2 text-lg text-gray-500 line-through">$299.99</span>
                        <span class="ml-2 text-sm font-semibold bg-green-100 text-green-800 px-2 py-1 rounded">Save
                            $50</span> --}}
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                        <p class="text-gray-600">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Color Options -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-3">Color</h2>
                        <div class="flex space-x-4">
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
                                    'Indigo' => 'bg-indigo-500',
                                ];
                            @endphp
                            @foreach ($product->color as $name => $colorKey)
                                @if (isset($allowedColors[$name]))
                                    <div class="color-option relative">
                                        <input type="radio" id="color-black" name="color" class="sr-only" checked>
                                        <label for="color-black" class="flex flex-col items-center cursor-pointer">
                                            <div
                                                class="w-10 h-10 rounded-full {{ $allowedColors[$name] }} border-2 border-transparent checked:border-indigo-500 flex items-center justify-center">
                                                <i class="fas fa-check text-white text-xs opacity-0"></i>
                                            </div>
                                            <span class="mt-1 text-sm text-gray-600">{{ $name }}</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Quantity and Add to Cart -->
                    <div class="flex items-center mb-6">
                        <div class="mr-6">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <div class="flex border border-gray-300 rounded-md">
                                <button
                                    class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-l-md">-</button>
                                <input type="number" id="quantity" value="1" min="1"
                                    class="w-12 text-center border-0 focus:ring-0">
                                <button
                                    class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-r-md">+</button>
                            </div>
                        </div>

                        <!-- Buy Button -->
                        <div class="flex-1">
                            <button id="buy-button"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex text-sm text-gray-600">
                            <div class="mr-6 flex items-center">
                                <i class="fas fa-shipping-fast text-indigo-500 mr-2"></i>
                                <span>Free shipping</span>
                            </div>
                            <div class="mr-6 flex items-center">
                                <i class="fas fa-undo-alt text-indigo-500 mr-2"></i>
                                <span>30-day returns</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt text-indigo-500 mr-2"></i>
                                <span>2-year warranty</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Color selection functionality
        document.querySelectorAll('input[name="color"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Update checkmarks
                document.querySelectorAll('.color-option .fa-check').forEach(check => {
                    check.classList.add('opacity-0');
                });

                const selectedLabel = this.nextElementSibling;
                const selectedCheck = selectedLabel.querySelector('.fa-check');
                selectedCheck.classList.remove('opacity-0');

                // Update borders
                document.querySelectorAll('.color-option div').forEach(div => {
                    div.classList.remove('border-indigo-500', 'border-2');
                });
                selectedLabel.querySelector('div').classList.add('border-indigo-500', 'border-2');

                // In a real application, you would update the product image based on color
                // For this demo, we'll just change the image slightly
                const productImage = document.getElementById('product-image');
                productImage.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    productImage.style.transform = 'scale(1)';
                }, 200);
            });
        });

        // Quantity adjustment
        document.querySelectorAll('#quantity').forEach(input => {
            const minusBtn = input.previousElementSibling;
            const plusBtn = input.nextElementSibling;

            minusBtn.addEventListener('click', () => {
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });

            plusBtn.addEventListener('click', () => {
                input.value = parseInt(input.value) + 1;
            });
        });

        // Buy button functionality
        document.getElementById('buy-button').addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check mr-2"></i>Added to Cart!';
            this.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            this.classList.add('bg-green-600');

            setTimeout(() => {
                this.innerHTML = originalText;
                this.classList.remove('bg-green-600');
                this.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
            }, 2000);
        });

        // Initialize first color as selected
        document.getElementById('color-black').checked = true;
        document.querySelector('label[for="color-black"] .fa-check').classList.remove('opacity-0');
        document.querySelector('label[for="color-black"] div').classList.add('border-indigo-500', 'border-2');
    </script>
@endsection
