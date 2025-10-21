@extends('layouts.app')

@section('boutique')
    <div class="max-w-7xl mx-auto flex">

        <ul class="block w-1/5 divide-y text-sm font-medium pr-8 pt-8 sticky top-14 bg-white self-start">
            <li class="py-3 pr-2 flex justify-between items-center">
                Type de produit
                <span class="text-gray-400">
                    <i class="fas fa-plus text-[10px] h-3 w-3"></i>
                </span>
            </li>
            <li class="py-3 pr-2 flex justify-between items-center">
                Compatibilité avec l'iPad
                <span class="text-gray-400"><i class="fas fa-plus text-[10px] h-3 w-3"></i></span>
            </li>
            <li class="py-3 pr-2 flex justify-between items-center">
                Compatibilité avec l'iPhone
                <span class="text-gray-400"><i class="fas fa-plus text-[10px] h-3 w-3"></i></span>
            </li>
        </ul>
        <div class="grid grid-cols-3 border-l border-gray-300">
            <x-store :products="$products" />
        </div>
    </div>
@endsection
