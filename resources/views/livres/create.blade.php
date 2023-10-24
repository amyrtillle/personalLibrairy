<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des livres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Nouveau livre</h2>
                    @if(session('status'))
                    <p class="mt-1 text-sm text-gray-600">
                        {{ session('status') }}
                    </p>
                    @endif

                    <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @php
                            $champs=array("image"=>"Couverture,file,false", "titre"=>"Titre,text,true", "auteur"=>"Auteur,text,true", "pages"=>"Nombre de pages,number,false", "prix"=>"Prix,number,true", "date_publication"=>"Date de publication,date,true", "editeur"=>"Éditeur,text,false", "isbn"=>"ISBN,text,true");
                            foreach($champs as $champ => $details) {
                                $detail=explode(",",$details);
                                $nomchamp=$detail[0];
                                $typechamp=$detail[1];
                                $required=$detail[2];
                        @endphp
                        <div>
                            <label class="block front-medium text-sm text-gray-700" for="{{ $champ }}">{{ $nomchamp }}</label>
                        @php
                                if($required=="true"){
                                    @endphp
                                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="{{ $champ }}" name="{{ $champ }}" type="{{ $typechamp }}" value="" required="true" autofocus="autofocus"
                                autocomplete="{{ $champ }}">
                                    @php
                                }
                                else{
                                    @endphp
                                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="{{ $champ }}" name="{{ $champ }}" type="{{ $typechamp }}" value="" autofocus="autofocus" autocomplete="{{ $champ }}">
                                    @php
                                }
                                @endphp
                        </div>
                        @php
                            }
                        @endphp
                        <button type="submit"
                            class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                            Ajouter livre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                href="{{ route('usagers.index') }}">
                Retour
            </a>
        </div>
    </div>

</x-app-layout>