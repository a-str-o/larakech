<table id="contactsTable" class="w-full border-collapse bg-white text-left text-sm text-gray-500 min-w-[800px]">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-2">NOM DU CONTACT</th>
            <th class="px-4 py-2">SOCIETE</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2">{{ $contact->nom }} {{ $contact->prenom }}</td>
                <td class="px-4 py-2">{{ $contact->organisation->nom }}</td>
                <td class="px-4 py-2 font-bold">
                    @if($contact->organisation->statut == 'LEAD')
                        <span class="text-blue-600 bg-blue-100 px-2 py-1 rounded">Lead</span>
                    @elseif($contact->organisation->statut == 'CLIENT')
                        <span class="text-green-600 bg-green-100 px-2 py-1 rounded">Client</span>
                    @elseif($contact->organisation->statut == 'PROSPECT')
                        <span class="text-orange-600 bg-orange-100 px-2 py-1 rounded">Prospect</span>
                    @endif
                </td>
                <td class="px-4 py-2 flex space-x-2">
                    <button data-modal-target="view-modal-{{ $contact->id }}" data-modal-toggle="view-modal-{{ $contact->id }}" class="text-gray-500 hover:text-gray-900">
                        <x-fas-eye class="w-4 h-4" />
                    </button>
                    <button data-modal-target="edit-modal-{{ $contact->id }}" data-modal-toggle="edit-modal-{{ $contact->id }}" class="text-gray-500 hover:text-gray-900">
                        <x-lineawesome-pen-solid class="w-4 h-4" />
                    </button>
                    <button data-modal-target="delete-modal-{{ $contact->id }}" data-modal-toggle="delete-modal-{{ $contact->id }}" class="text-red-500 hover:text-red-900">
                        <x-ri-delete-bin-line class="w-4 h-4" />
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>