@foreach($contacts as $contact)
<div id="view-modal-{{ $contact->id }}" tabindex="-1"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="background-color: #f0f8ff;">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-modal-{{ $contact->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <h3 class="mb-5 text-lg font-bold text-gray-500 dark:text-gray-400 text-left">Détails du contact</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 text-left">Prenom</label>
                        <input type="text" value="{{ $contact->prenom }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                    </div>
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 text-left">Nom</label>
                        <input type="text" value="{{ $contact->nom }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="e_mail" class="block text-sm font-medium text-gray-700 text-left">Email</label>
                    <input type="email" value="{{ $contact->e_mail }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                </div>
                <div class="mt-4">
                    <label for="organisation_nom" class="block text-sm font-medium text-gray-700 text-left">Entreprise</label>
                    <input type="text" value="{{ $contact->organisation->nom }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                </div>
                <div class="mt-4">
                    <label for="adresse" class="block text-sm font-medium text-gray-700 text-left">Adresse</label>
                    <textarea rows="3" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>{{ $contact->organisation->adresse }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="code_postal" class="block text-sm font-medium text-gray-700 text-left">Code Postal</label>
                        <input type="text" value="{{ $contact->organisation->code_postal }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                    </div>
                    <div>
                        <label for="ville" class="block text-sm font-medium text-gray-700 text-left">Ville</label>
                        <input type="text" value="{{ $contact->organisation->ville }}" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="statut" class="block text-sm font-medium text-gray-700 text-left">Statut</label>
                    <select name="statut" id="statut" class="mt-1 block w-full  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 " disabled>
                        <option value="LEAD" {{ $contact->organisation->statut == 'LEAD' ? 'selected' : '' }}>Lead</option>
                        <option value="CLIENT" {{ $contact->organisation->statut == 'CLIENT' ? 'selected' : '' }}>Client</option>
                        <option value="PROSPECT" {{ $contact->organisation->statut == 'PROSPECT' ? 'selected' : '' }}>Prospect</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach