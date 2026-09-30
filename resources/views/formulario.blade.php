<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con XAMPP y Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-xl mx-auto space-y-8">

        <!-- FORMULARIO -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Formulario con XAMPP</h1>

            @if(session('exito'))
                <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm font-medium">
                    {{ session('exito') }}
                </div>
            @endif

            <form action="/guardar" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" required placeholder="Tu nombre"
                           class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                    <textarea name="mensaje" required rows="3" placeholder="Escribe tu mensaje..."
                              class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition-colors">
                    Guardar en Base de Datos
                </button>
            </form>
        </div>

        <!-- RESULTADOS ABAJO -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Resultados guardados en MySQL</h2>

            @forelse($mensajes as $item)
                <div class="border-b border-gray-100 py-3 last:border-b-0">
                    <p class="font-semibold text-gray-800">{{ $item->nombre }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $item->mensaje }}</p>
                    <span class="text-xs text-gray-400">{{ $item->created_at->format('d/m/Y H:i') }}</span>
                </div>
            @empty
                <p class="text-gray-500 text-sm italic text-center py-4">No hay datos aún. ¡Envía el primero!</p>
            @endforelse
        </div>

    </div>
</body>
</html>