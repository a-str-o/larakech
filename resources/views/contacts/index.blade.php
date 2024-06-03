@extends('layouts.app')

@section('title', 'List des contacts')

@section('content')
    <h1 class="text-2xl font-bold mb-8">List des contacts</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            @foreach ($errors->all() as $error)
                <span class="block sm:inline">{{ $error }}</span>
            @endforeach
        </div>
    @endif

    <div class="flex justify-between mb-4">
        <form action="{{ url('/contacts') }}" method="GET" class="flex w-2/3" id="searchForm">
            <input type="text" name="search" id="search" placeholder="Search" value="{{ $search ?? '' }}" class="border p-2 rounded w-full mr-4" oninput="submitSearchForm()">
        </form>
        <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="bg-blue-500 text-white px-4 py-2 rounded">+ Ajouter</button>
    </div>

    @include('components.contact-table')

    <div class="mt-4 flex justify-between items-center">
        <div>
            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} results
        </div>
        <div>
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

    @include('components.modals.create')
    @include('components.modals.view')
    @include('components.modals.edit')
    @include('components.modals.delete')
    @include('components.alert')
@endsection

