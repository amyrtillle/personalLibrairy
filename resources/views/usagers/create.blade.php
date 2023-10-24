<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usagers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Nouvel usager</h2>
                    @if(session('status'))
                    <p class="mt-1 text-sm text-gray-600">
                        {{ session('status') }}
                    </p>
                    @endif

                    <form action="{{ route('usagers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="nom">
                                Nom
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="nom" name="nom" type="text" value="" required="required" autofocus="autofocus"
                                autocomplete="nom">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="prenom">
                                prenom
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="prenom" name="prenom" type="text" value="" required="required" autofocus="autofocus"
                                autocomplete="prenom">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="identifiant">
                                identifiant
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="identifiant" name="identifiant" type="text" value="" required="required"
                                autofocus="autofocus" autocomplete="identifiant">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Adresse mail
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="email" name="email" type="email" value="" required="required" autofocus="autofocus"
                                autocomplete="email">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="passe">
                                Mot de passe
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                id="passe" name="passe" type="password" value="" required="required"
                                autofocus="autofocus" autocomplete="passe">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="blocage">
                                Utilsateur bloqué
                            </label>
                            <fieldset id="blocage">
                                Oui
                                <input type="radio" value="1" name="blocage">
                                Non
                                <input type="radio" value="0" name="blocage">
                            </fieldset>
                        </div>
                        @error('email')
                        <p><strong>{{ $message }}</strong></p>
                        @enderror
                        @error('identifiant')
                        <p><strong>{{ $message }}</strong></p>
                        @enderror
                        @error('passe')
                        <p><strong>{{ $message }}</strong></p>
                        @enderror
                        @error('nom')
                        <p><strong>{{ $message }}</strong></p>
                        @enderror
                        @error('prenom')
                        <p><strong>{{ $message }}</strong></p>
                        @enderror

                        <button type="submit"
                            class="inline-flex items-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                            style="margin-top:20px;background-color:#3B71CA;">Enregistrer</button>
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