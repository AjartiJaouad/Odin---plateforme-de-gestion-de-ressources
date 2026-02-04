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
                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                        onsubmit="return confirm('Sûr ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                    </form>
                    <form action="{{ route('tasks.store', $category) }}" method="POST" class="mt-2 flex gap-2">
                        @csrf
                        <input type="text" name="title" placeholder="Nouvelle tâche..."
                            class="border-gray-300 rounded-md text-sm" required>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md text-sm">
                            +
                        </button>
                    </form>

                    <ul class="mt-2 ml-4 list-disc">
                        @foreach ($category->tasks as $task)
                            <li class="text-gray-600 text-sm">{{ $task->title }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
