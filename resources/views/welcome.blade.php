<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SFT-Console | Production Matrix</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-primary: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --accent: #2563eb;
            --accent-success: #10b981;
            --border-color: #e2e8f0;
            --code-bg: #f1f5f9;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-primary: #090d16;
                --bg-card: #111827;
                --text-main: #f8fafc;
                --text-muted: #94a3b8;
                --accent: #3b82f6;
                --accent-success: #34d399;
                --border-color: #1f2937;
                --code-bg: #1e293b;
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            transition: background-color 0.3s ease;
        }

        .container {
            width: 100%;
            max-width: 650px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
        }

        .badge {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent-success);
            padding: 0.4rem 0.8rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .badge::before {
            content: '';
            width: 8px;
            height: 8px;
            background-color: var(--accent-success);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px var(--accent-success);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }

        p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .meta-box {
            background-color: var(--code-bg);
            border-radius: 8px;
            padding: 1rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            border-left: 3px solid var(--accent);
        }

        .meta-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.25rem;
        }

        .meta-line:last-child {
            margin-bottom: 0;
        }

        .meta-value {
            color: var(--text-main);
            font-weight: 500;
        }

        .actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary {
            background-color: var(--accent);
            color: #ffffff;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: var(--code-bg);
        }

        footer {
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: var(--text-muted);
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="badge">Stable Build</div>
        @if (Route::has('login'))
        <div style="display: flex; gap: 1rem; font-size: 0.85rem;">
            @auth
            <a href="{{ url('/dashboard') }}" style="color: var(--accent); text-decoration: none; font-weight: 500;">Dashboard</a>
            @else
            <a href="{{ route('login') }}" style="color: var(--text-muted); text-decoration: none;">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" style="color: var(--accent); text-decoration: none; font-weight: 500;">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <main>
        <h1>Environment Operational</h1>
        <p>La arquitectura de integración y despliegue continuo (CI/CD) se encuentra activa. Las tareas de análisis de calidad de código, validación de pruebas estáticas y sincronización de infraestructura se ejecutan bajo demandas automatizadas.</p>

        <div class="meta-box">
            <div class="meta-line">
                <span>Active Gateway:</span>
                <span class="meta-value">GitHub Actions Engine</span>
            </div>
            <div class="meta-line">
                <span>Host Status:</span>
                <span class="meta-value" style="color: var(--accent-success);">Online (Persistent Container)</span>
            </div>
            <div class="meta-line">
                <span>Target Target:</span>
                <span class="meta-value">Production Environment</span>
            </div>
        </div>

        <div class="actions">
            <a href="https://laravel.com/docs" target="_blank" class="btn btn-primary">Core Documentation</a>
            <a href="https://laracasts.com" target="_blank" class="btn btn-secondary">Platform Tutorials</a>
        </div>
    </main>
</div>

<footer>
    System v{{ app()->version() }} // Stack PHP {{ phpversion() }}
</footer>

</body>
</html>
