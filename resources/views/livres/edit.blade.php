<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tightt">
            {{ __('Liste des livres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Informations du livre</h2>
                    @if(session('status'))
                    <p class="mt-1 text-sm text-gray-600">
                        {{ session('status') }}
                    </p>
                    @endif

                    <form action="{{ route('livres.update',$livre->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        @php
                            $champs=array("image"=>"Couverture,file,$livre->image,false", "titre"=>"Titre,text,$livre->titre,true", "auteur"=>"Auteur,text,$livre->auteur,true", "pages"=>"Nombre de pages,number,$livre->pages,false", "prix"=>"Prix,numbe,$livre->prix,true", "date_publication"=>"Date de publication,date,$livre->date_publication,true", "editeur"=>"Éditeur,text,$livre->editeur,false", "isbn"=>"ISBN,text,$livre->isbn,true");
                            foreach($champs as $champ => $details) {
                                $detail=explode(",",$details);
                                $nomchamp=$detail[0];
                                $typechamp=$detail[1];
                                $value=$detail[2];
                                $required=$detail[3];
                        @endphp
                        <div>
                            <label class="block front-medium text-sm text-gray-700" for="{{ $nomchamp }}">{{ $nomchamp }}</label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="{{ $nomchamp }}" name="{{ $nomchamp }}" type="{{ $typechamp }}" value="{{ $value }}" required="{{$required}}" autofocus="autofocus"
                                autocomplete="{{ $nomchamp }}">
                        </div>
                        @php
                            }
                        @endphp
                        <button type="submit"
                            class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                            style="margin-top:20px;background-color:#3B71CA;">Enregistrer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>