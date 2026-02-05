<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mes Catégories</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border-l-4 border-blue-500">
                <form action="{{ route('categories.store') }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="text" name="name" placeholder="Nom de la catégorie (ex: Work, Home...)"
                        class="border-gray-300 rounded-md w-full" required>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition">Ajouter</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-100 h-fit">
                        <div class="flex justify-between items-center mb-4 pb-2 border-b">
                            <h3 class="font-bold text-lg text-gray-800">{{ $category->name }}</h3>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                onsubmit="return confirm('Sûr ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <form action="{{ route('tasks.store', $category) }}" method="POST" class="mb-4 flex gap-2">
                            @csrf
                            <input type="text" name="title" placeholder="Nouvelle tâche..."
                                class="border-gray-300 rounded-md text-sm w-full" required>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm transition">+</button>
                        </form>

                        <ul class="space-y-3">
                            @foreach ($category->tasks as $task)
                                <li
                                    class="flex items-center justify-between group bg-gray-50 p-2 rounded-md hover:bg-gray-100 transition">
                                    <div class="flex items-center gap-2 flex-grow">
                                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="checkbox" onChange="this.form.submit()"
                                                {{ $task->status === 'done' ? 'checked' : '' }}
                                                class="rounded text-blue-500 cursor-pointer">
                                        </form>

                                        <div class="flex-grow">
                                            <form action="{{ route('tasks.updateTitle', $task) }}" method="POST"
                                                class="flex items-center">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="title" value="{{ $task->title }}"
                                                    onblur="if(this.value != '{{ $task->title }}') this.form.submit()"
                                                    class="w-full bg-transparent border-none focus:ring-0 p-0 text-sm {{ $task->status === 'done' ? 'line-through text-gray-400' : 'text-gray-700' }}">
                                            </form>
                                        </div>
                                    </div>

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                        onsubmit="return confirm('Supprimer ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-gray-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition">
                                            🗑️
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function toggleEdit(taskId) {
        document.getElementById('task-text-' + taskId).classList.toggle('hidden');
        document.getElementById('edit-form-' + taskId).classList.toggle('hidden');

        let btn = document.getElementById('edit-btn-' + taskId);
        btn.innerText = btn.innerText === '✏️' ? '✅' : '✏️';

        if (btn.innerText === '✏️') {
            document.getElementById('edit-form-' + taskId).submit();
        }
    }
</script>
