<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des exemplaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Exemplaires de {{ $livre_titre }}</h2>
                    @if ($message = Session::get('success'))
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $message }}
                    </p>
                    @endif
                    <table class="min-w-full text-left text-sm font-light" style="width:100%;margin-bottom:20px;">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Id</th>
                                <th scope="col" class="px-6 py-4">État</th>
                                <th scope="col" class="px-6 py-4">Disponibilité</th>
                                <th scope="col" class="px-6 py-4">Date de retour</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exemplaires as $exemplaire)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $exemplaire->id }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $exemplaire->etat }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $exemplaire->dispo }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $exemplaire->retour }}</td>
                                <td class="whitespace-nowrap px-6 py-4" style="text-align:center;">
                                    <form action="{{ route('livre.exemplaires.destroy',[$livre_id, $exemplaire->id]) }}" method="Post" style="display:flex;flex-direction:column;align-items:center;gap:10px">
                                        <a class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                            style="background-color:#3B71CA;"
                                            href="{{ route('livre.exemplaires.edit',[$livre_id, $exemplaire->id]) }}">Modifier</a>
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
                    {!! $exemplaires->links() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                href="{{ route('livre.exemplaires.create', $livre_id) }}">
                Nouvel exemplaire
            </a>
        </div>
    </div>
</x-app-layout>