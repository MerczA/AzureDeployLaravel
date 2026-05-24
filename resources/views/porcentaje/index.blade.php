<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Porcentaje</title>
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

        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 0.5rem; }

        p.subtitle { color: #64748b; font-size: 0.9rem; margin-bottom: 2rem; }

        label { display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; }

        input[type="number"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1.1rem;
            color: #1e293b;
            transition: border-color 0.2s;
            outline: none;
            margin-bottom: 1.25rem;
        }

        input[type="number"]:focus { border-color: #f59e0b; }

        .error-msg { color: #ef4444; font-size: 0.85rem; margin-top: -1rem; margin-bottom: 1rem; }

        button {
            width: 100%;
            padding: 0.85rem;
            background: #f59e0b;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover { background: #d97706; }

        .resultado {
            margin-top: 1.75rem;
            padding: 1.5rem;
            border-radius: 12px;
            background: #fffbeb;
            border: 2px solid #f59e0b;
            text-align: center;
        }

        .resultado .formula {
            font-size: 0.9rem;
            color: #92400e;
            margin-bottom: 0.5rem;
        }

        .resultado .monto-resultado {
            font-size: 2.5rem;
            font-weight: 700;
            color: #b45309;
        }

        .resultado .etiqueta {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>📊 Calculadora de Porcentaje</h1>
        <p class="subtitle">Calcula el porcentaje de cualquier monto de forma rápida.</p>

        <form method="POST" action="{{ route('porcentaje.calcular') }}">
            @csrf

            <label for="monto">Monto base ($)</label>
            <input
                type="number"
                id="monto"
                name="monto"
                placeholder="Ej: 1500"
                value="{{ old('monto', $monto ?? '') }}"
                step="0.01"
                min="0"
            >
            @error('monto')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <label for="porcentaje">Porcentaje (%)</label>
            <input
                type="number"
                id="porcentaje"
                name="porcentaje"
                placeholder="Ej: 16"
                value="{{ old('porcentaje', $porcentaje ?? '') }}"
                step="0.01"
                min="0"
                max="100"
            >
            @error('porcentaje')
                <p class="error-msg">{{ $message }}</p>
            @enderror

            <button type="submit">Calcular</button>
        </form>

        @if(isset($calculado))
            <div class="resultado">
                <p class="formula">
                    ${{ number_format($monto, 2) }} × {{ $porcentaje }}% =
                </p>
                <p class="monto-resultado">
                    ${{ number_format($resultado, 2) }}
                </p>
                <p class="etiqueta">Resultado del porcentaje</p>
            </div>
        @endif
    </div>
</body>
</html>