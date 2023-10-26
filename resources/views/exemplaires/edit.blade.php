<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tightt">
            {{ __('Liste des exemplaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Informations de l'exemplaire de {{$livre_titre}}</h2>
                    @if(session('status'))
                    <p class="mt-1 text-sm text-gray-600">
                        {{ session('status') }}
                    </p>
                    @endif

                    <form action="{{ route('livre.exemplaires.update', [$livre_id, $exemplaire->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @php
                                $champs=array(
                                    "etat"=>"État,select,select,true", 
                                    "dispo"=>"Disponibilité,select,select,true", 
                                    "retour"=>"A rendre le,date,input,false" 
                                    );
                                foreach($champs as $champ => $details) {
                                    $detail=explode(",",$details);
                                    $nomchamp=$detail[0];
                                    $typechamp=$detail[1];
                                    $tag=$detail[2];
                                    $required=$detail[3];
                        @endphp
                        <div>
                            <label class="block front-medium text-sm text-gray-700" for="{{ $champ }}">{{ $nomchamp }}</label>
                            <{{$tag}} class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="{{ $champ }}" name="{{ $champ }}" type="{{ $typechamp }}" value="" 
                                @php 
                                if($required=="true"){
                                @endphp
                                     required="true";
                                @php
                                }
                                @endphp
                                autofocus="autofocus"
                                autocomplete="{{ $champ }}">
                                @php
                                if($champ=="etat"){
                                    @endphp
                                    <option value="1">Neuf</option>
                                    <option value="2">Bon état</option>
                                    <option value="3">À réparer</option>
                                    <option value="4">À remplacer</option>
                                    <option value="5">Retiré de la vente</option>
                                    </{{$tag}}
                                    @php
                                }
                                else if($champ=="dispo"){
                                    @endphp
                                    <option value="1">Disponible</option>
                                    <option value="2">Prêté</option>
                                    <option value="3">Réservé</option>
                                    </{{$tag}}
                                    @php
                                }
                                @endphp

                        </div>
                        @php
                            }
                        @endphp
                        <button type="submit"
                            class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                            Enregistrer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>