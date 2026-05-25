<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palindromo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            max-width: 500px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .icono {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        h1 {
            font-size: 1.75rem;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.6rem;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            color: #1e293b;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-family: 'Segoe UI', sans-serif;
            resize: vertical;
            min-height: 80px;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        button {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 0.5rem;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .resultado {
            margin-top: 2rem;
            padding: 1.5rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .resultado.valido {
            background: linear-gradient(135deg, #f0fdf4 0%, #e0f5e0 100%);
            border: 2px solid #22c55e;
        }

        .resultado.invalido {
            background: linear-gradient(135deg, #fef2f2 0%, #fde8e8 100%);
            border: 2px solid #ef4444;
        }

        .resultado .icono-resultado {
            font-size: 2.5rem;
            flex-shrink: 0;
        }

        .resultado .texto {
            flex-grow: 1;
        }

        .resultado .texto strong {
            display: block;
            font-size: 1.1rem;
            color: #1e293b;
            margin-bottom: 0.3rem;
        }

        .resultado .texto span {
            font-size: 0.9rem;
            display: block;
            color: #64748b;
        }

        .resultado .texto .original {
            font-style: italic;
            color: #475569;
            margin-top: 0.5rem;
            word-break: break-word;
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #764ba2;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <div class="icono">🔄</div>
            <h1>Verificador de Palindromo</h1>
            <p class="subtitle">Verifica si una palabra o frase es un palindromo. Ignora espacios, acentos y puntuación.</p>
        </div>

        <form method="POST" action="{{ route('palindromo.verificar') }}">
            @csrf

            <div class="form-group">
                <label for="texto">Ingresa un texto:</label>
                <textarea
                    id="texto"
                    name="texto"
                    placeholder="Ejemplo: Anita lava la tina"
                    required
                    value="{{ old('texto', $texto ?? '') }}"
                >{{ old('texto', $texto ?? '') }}</textarea>
            </div>

            @error('texto')
                <p style="color: #ef4444; font-size: 0.85rem; margin-top: -1rem; margin-bottom: 1rem;">
                    {{ $message }}
                </p>
            @enderror

            <button type="submit">Verificar Palindromo</button>
        </form>

        @if(isset($verificado))
            <div class="resultado {{ $esPalindromo ? 'valido' : 'invalido' }}">
                <div class="icono-resultado">{{ $esPalindromo ? '✅' : '❌' }}</div>
                <div class="texto">
                    <strong>{{ $esPalindromo ? '¡Sí es un palindromo!' : 'No es un palindromo' }}</strong>
                    <span>{{ $esPalindromo ? 'Se lee igual en ambas direcciones.' : 'No se lee igual en ambas direcciones.' }}</span>
                    <span class="original"><strong>Texto:</strong> {{ $texto }}</span>
                </div>
            </div>
        @endif

        <a href="/" class="back-link">← Volver al menú principal</a>
    </div>
</body>
</html>
