<div class="bg-gray-100 border-t border-gray-300">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl py-10">Coques et protections</h1>
    </div>
</div>

<div class="h-14 border-t border-b border-gray-300 text-gray-400 text-xs sticky top-0 bg-white">
    <div class="max-w-7xl mx-auto h-full flex justify-between items-center">
        <div class="flex items-center space-x-1">
            <i class="fa-solid fa-filter"></i>
            <span>Filtre</span>
        </div>

        <!-- Search bar -->
        <form action="{{ route('store.search') }}" method="POST" class="flex items-center space-x-2">
            @csrf
            <input
                type="text"
                name="q"
                placeholder="Rechercher un produit..."
                class="border border-gray-300 rounded-lg px-3 py-1.5 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400"
                value="{{ old('q') }}" 
            />
            <button type="submit" class="text-gray-600 hover:text-black">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>