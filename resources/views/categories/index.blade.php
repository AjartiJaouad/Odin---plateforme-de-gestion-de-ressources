<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mes Catégories</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nom de la catégorie"
                        class="border-gray-300 rounded-md" required>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter</button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($categories as $category)
                    <div class="flex justify-between border-b py-2">
                        <span>{{ $category->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
