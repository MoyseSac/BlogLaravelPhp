<x-forum.layouts.app>
  <div class="flex items-center gap-2 w-full my-8">
    <div class="w-full">
      <h2 class="text-2xl font-bold md:text-3xl">
        Nueva pregunta
      </h2>

      {{-- Errores globales --}}
      @if ($errors->any())
        <div class="mt-3 mb-2 rounded-lg border border-red-300/70 bg-red-50 text-red-800 p-3">
          <ul class="list-disc ml-5 text-sm">
            @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('questions.store') }}" method="POST" class="mt-6 space-y-5">
        @csrf

        {{-- Título --}}
        <div>
          <label for="title" class="block text-sm font-semibold text-gray-300">Título</label>
          <input id="title" name="title" type="text" required
                 value="{{ old('title') }}"
                 placeholder="Ej.: ¿Cómo funciona la herencia en PHP?"
                 class="w-full p-2 rounded-md border border-gray-700 bg-transparent text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
          @error('title') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        {{-- Contenido --}}
        <div>
          <label for="content" class="block text-sm font-semibold text-gray-300">Contenido</label>
          <textarea id="content" name="content" rows="6" required
                    placeholder="Describe tu duda aquí…"
                    class="w-full p-2 rounded-md border border-gray-700 bg-transparent text-gray-100 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('content') }}</textarea>
          @error('content') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        {{-- Categoría --}}
        <div>
          <label for="category_id" class="block text-sm font-semibold text-gray-300">Categoría</label>
          <select id="category_id" name="category_id" required
                  class="w-full p-2 rounded-md border border-gray-700 bg-gray-900 text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">— Selecciona una categoría —</option>
            @foreach($categories as $c)
              <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
            @endforeach
          </select>
          @error('category_id') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3">
          <button type="submit"
                  class="rounded-md bg-indigo-600 hover:bg-indigo-500 px-4 py-2 text-white font-semibold">
            Publicar
          </button>
          <a href="{{ url()->previous() }}"
             class="rounded-md border border-gray-700 px-4 py-2 text-gray-200 hover:bg-gray-800">
            Cancelar
          </a>
        </div>
      </form>
    </div>
  </div>
</x-forum.layouts.app>
