@extends('layouts.app')

@section('content')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" >
            @forelse ( $products as $product )
                <x-store :product="$product" />
            @empty
                <p>Il n'y a pas de produits en base</p>
            @endforelse          
        </div>
@endsection
