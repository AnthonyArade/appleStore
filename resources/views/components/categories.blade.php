<section class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Nos Produits</h2>
</section>
<div class="flex flex-wrap justify-center gap-4 mb-12">
    <a href="" class="px-6 py-2 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">
        Tous
    </a>
    @foreach ($categories as $category)
        <form method="POST" action="{{ route('store.search') }}" class="inline">
            @csrf
            <input type="hidden" name="q" value="{{ $category->name }}">
            <button type="submit"
                class="px-6 py-2 bg-gray-600 text-white rounded-full font-semibold hover:bg-gray-300 transition">
                {{ $category->name }}
            </button>
        </form>
    @endforeach
</div>