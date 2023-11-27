@php
use App\Models\livres;
$post = request()->post('search');
$livres = livres::where('titre', 'like', '%' . $post . '%')->paginate(5);
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl">Bienvenue sur le centre de recherche de l'application.</p>
                    <p class="text-xl">Vous pouvez rechercher un article en cliquant sur le bouton ci-dessous.</p>
                    <hr>
                    <br>
                    <div class="bg-white dark:bg-gray-800 h-screen px-10 py-20 w-full">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" bg-white dark:bg-gray-800 max-w-xl">
                                <div class="flex space-x-4">
                                    <div class=" bg-white dark:bg-gray-800 flex rounded-md overflow-hidden w-full">
                                        <input type="text" name="search"
                                            class=" bg-white dark:bg-gray-800 w-full rounded-md rounded-r-none" />
                                        <button type="submit"
                                            class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                            rechercher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="min-w-full text-left text-sm font-light" style="width:100%;margin-bottom:20px;">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Id</th>
                                <th scope="col" class="px-6 py-4">Couverture</th>
                                <th scope="col" class="px-6 py-4">Titre</th>
                                <th scope="col" class="px-6 py-4">Auteur</th>
                                <th scope="col" class="px-6 py-4">Nombre de pages</th>
                                <th scope="col" class="px-6 py-4">Prix d'achat</th>
                                <th scope="col" class="px-6 py-4">Date de publication</th>
                                <th scope="col" class="px-6 py-4">Éditeur</th>
                                <th scope="col" class="px-6 py-4">n° ISBN</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livres as $livre)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->id }}</td>
                                <td class="whitespace-nowrap px-6 py-4"><img src='/images/{{$livre->image}}' /></td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->titre }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->auteur }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->pages }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->prix }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->date_publication }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->editeur }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $livre->isbn }}</td>
                                <td class="whitespace-nowrap px-6 py-4" style="text-align:center;">
                                    <form action="{{ route('livres.destroy',$livre->id) }}" method="Post"
                                        style="display:flex;flex-direction:column;align-items:center;gap:10px">
                                        <a class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                            style="background-color:#3B71CA;"
                                            href="{{ route('livres.edit',$livre->id) }}">Modifier</a>
                                        <a class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                            style="background-color:#37DA5A;"
                                            href="{{ route('livre.exemplaires.index',$livre->id) }}">Exemplaires</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                            style="background-color:#DC4C64;">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>