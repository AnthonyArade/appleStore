@extends('layouts.app')

@section('boutique')
        <div class="grid grid-cols-3 border-l border-gray-300">
            <x-store :products="$products" />
        </div>
@endsection
