<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Tarjeta</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.1);
            padding: 2.5rem;
            max-width: 480px;
            width: 100%;
        }

        h1 {
            font-size: 1.5rem;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        p.subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1.1rem;
            letter-spacing: 0.1em;
            color: #1e293b;
            transition: border-color 0.2s;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #6366f1;
        }

        .error-msg {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.4rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.85rem;
            background: #6366f1;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover { background: #4f46e5; }

        .resultado {
            margin-top: 1.75rem;
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .resultado.valido {
            background: #f0fdf4;
            border: 2px solid #22c55e;
        }

        .resultado.invalido {
            background: #fef2f2;
            border: 2px solid #ef4444;
        }

        .resultado .icono {
            font-size: 2rem;
        }

        .resultado .texto strong {
            display: block;
            font-size: 1.1rem;
            color: #1e293b;
        }

        .resultado .texto span {
            font-size: 0.85rem;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>🔐 Validador de Tarjeta</h1>
        <p class="subtitle">Verifica si un número de tarjeta es válido usando el algoritmo de Luhn.</p>

        <form method="POST" action="{{ route('validador.validar') }}">
            @csrf
            <label for="numero">Número de tarjeta</label>
            <input
                type="text"
                id="numero"
                name="numero"
                placeholder="4539 1488 0343 6467"
                value="{{ old('numero', $numero ?? '') }}"
                maxlength="25"
                autocomplete="off"
            >

            @error('numero')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <button type="submit">Validar</button>
        </form>

        @if(isset($revisado))
            <div class="resultado {{ $valido ? 'valido' : 'invalido' }}">
                <div class="icono">{{ $valido ? '✅' : '❌' }}</div>
                <div class="texto">
                    <strong>{{ $valido ? 'Número válido' : 'Número inválido' }}</strong>
                    <span>
                        {{ $valido
                            ? 'Pasa el algoritmo de Luhn correctamente.'
                            : 'No cumple con el algoritmo de Luhn.' }}
                    </span>
                </div>
            </div>
        @endif
    </div>
</body>
</html>