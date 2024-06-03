<div id="create-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" 
            data-modal-hide="create-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <h3 class="mb-5 text-lg font-bold text-gray-500 dark:text-gray-400 text-left">Create Contact</h3>
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 text-left">Prenom</label>
                            <input type="text" name="prenom" id="prenom" 
                            class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('prenom') border-red-500 @enderror" 
                            value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 text-left">Nom</label>
                            <input type="text" name="nom" id="nom" 
                            class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('nom') border-red-500 @enderror" value="{{ old('nom') }}" required>
                            @error('nom')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="e_mail" class="block text-sm font-medium text-gray-700 text-left">Email</label>
                        <input type="email" name="e_mail" id="e_mail" 
                        class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('e_mail') border-red-500 @enderror" value="{{ old('e_mail') }}" required>
                        @error('e_mail')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="organisation_nom" class="block text-sm font-medium text-gray-700 text-left">Entreprise</label>
                        <input type="text" name="organisation_nom" id="organisation_nom" 
                        class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('organisation_nom') border-red-500 @enderror" value="{{ old('organisation_nom') }}" required>
                        @error('organisation_nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 text-left">Adresse</label>
                        <textarea name="adresse" id="adresse" rows="3" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('adresse') border-red-500 @enderror" required>{{ old('adresse') }}</textarea>
                        @error('adresse')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="code_postal" class="block text-sm font-medium text-gray-700 text-left">Code Postal</label>
                            <input type="text" name="code_postal" id="code_postal" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('code_postal') border-red-500 @enderror" value="{{ old('code_postal') }}" required>
                            @error('code_postal')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="ville" class="block text-sm font-medium text-gray-700 text-left">Ville</label>
                            <input type="text" name="ville" id="ville" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('ville') border-red-500 @enderror" value="{{ old('ville') }}" required>
                            @error('ville')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="statut" class="block text-sm font-medium text-gray-700 text-left">Statut</label>
                        <select name="statut" id="statut" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2  @error('statut') border-red-500 @enderror" required>
                            <option value="LEAD" {{ old('statut') == 'LEAD' ? 'selected' : '' }}>Lead</option>
                            <option value="CLIENT" {{ old('statut') == 'CLIENT' ? 'selected' : '' }}>Client</option>
                            <option value="PROSPECT" {{ old('statut') == 'PROSPECT' ? 'selected' : '' }}>Prospect</option>
                        </select>
                        @error('statut')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded mr-2" data-modal-hide="create-modal">Annuler</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
