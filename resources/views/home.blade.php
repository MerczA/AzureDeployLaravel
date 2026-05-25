<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzureDeployLaravel</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
            padding: 3rem 2rem;
        }

        header {
            text-align: center;
            margin-bottom: 3rem;
        }

        header h1 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        header p {
            color: #64748b;
            font-size: 1rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(0,0,0,0.12);
        }

        .card .icono {
            font-size: 2.5rem;
        }

        .card h2 {
            font-size: 1.1rem;
            color: #1e293b;
        }

        .card p {
            font-size: 0.875rem;
            color: #64748b;
            line-height: 1.5;
            flex-grow: 1;
        }

        .card .autor {
            font-size: 0.75rem;
            color: #94a3b8;
            font-style: italic;
        }

        .card a {
            margin-top: 0.5rem;
            display: inline-block;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: background 0.2s;
        }

        /* Color por operación */
        .card.porcentaje a { background: #f59e0b; }
        .card.porcentaje a:hover { background: #d97706; }

        .card.validador a { background: #6366f1; }
        .card.validador a:hover { background: #4f46e5; }

        .card.parimpar a { background: #22c55e; }
        .card.parimpar a:hover { background: #16a34a; }

        .card.temperatura a { background: #ef4444; }
        .card.temperatura a:hover { background: #dc2626; }

        .card.palindromo a { background: #667eea; }
        .card.palindromo a:hover { background: #5568d3; }
    </style>
</head>
<body>

    <header>
        <h1>⚙️ Menú de Operaciones</h1>
        <p>Selecciona una operación para comenzar</p>
    </header>

    <div class="grid">

        {{-- Geovanni --}}
        <div class="card porcentaje">
            <div class="icono">📊</div>
            <h2>Calculadora de Porcentaje</h2>
            <p>Calcula el porcentaje de cualquier monto de forma rápida e inmediata.</p>
            <span class="autor">Geovanni</span>
            <a href="{{ route('porcentaje.index') }}">Ir a la operación →</a>
        </div>

        {{-- Mariana --}}
        <div class="card validador">
            <div class="icono">🔐</div>
            <h2>Validador de Tarjeta</h2>
            <p>Verifica si un número de tarjeta es válido usando el algoritmo de Luhn.</p>
            <span class="autor">Mariana</span>
            <a href="{{ route('validador.index') }}">Ir a la operación →</a>
        </div>

        {{-- Rafa --}}
        <div class="card parimpar">
            <div class="icono">🔢</div>
            <h2>Par o Impar</h2>
            <p>Determina si un número ingresado es par o impar.</p>
            <span class="autor">Rafa</span>
            <a href="/par-impar">Ir a la operación →</a>
        </div>

        {{-- Charly --}}
        <div class="card temperatura">
            <div class="icono">🌡️</div>
            <h2>Convertidor de Temperatura</h2>
            <p>Convierte temperaturas entre grados Celsius y Fahrenheit de manera rápida.</p>
            <span class="autor">Charly</span>
            <a href="/temperatura">Ir a la operación →</a>
        </div>

        {{-- Verificador de Palindromo --}}
        <div class="card palindromo">
            <div class="icono">🔄</div>
            <h2>Verificador de Palindromo</h2>
            <p>Verifica si una palabra o frase es un palindromo. Ignora espacios, acentos y puntuación.</p>
            <span class="autor">Sistema</span>
            <a href="{{ route('palindromo.index') }}">Ir a la operación →</a>
        </div>

    </div>

</body>
</html>