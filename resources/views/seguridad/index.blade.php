<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Auditoría de Seguridad</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; margin: 40px; color: #333; }
        .card { background: white; padding: 30px; border-radius: 8px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #2c3e50; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; background: #e67e22; color: white; border: none; padding: 12px; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { background: #d35400; }
        .resultado { margin-top: 20px; padding: 15px; border-radius: 4px; border-left: 5px solid; }
        .safe { background: #e8f8f5; border-color: #2ecc71; color: #27ae60; }
        .warning { background: #fef9e7; border-color: #f1c40f; color: #d35400; }
        .critical { background: #f9ebea; border-color: #e74c3c; color: #c0392b; }
    </style>
</head>
<body>

<div class="card">
    <h2>🛡️ Analizador de Seguridad</h2>
    <p style="text-align: center; color: #7f8c8d;">Audita payloads contra ataques SQLi y XSS</p>

    <form action="{{ route('seguridad.calcular') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Origen del Envío (Source):</label>
            <input type="text" name="origen" value="{{ $origen ?? 'FormularioWeb' }}" required>
        </div>
        <div class="form-group">
            <label>Datos a Evaluar (Data):</label>
            <textarea name="datos" rows="4" required>{{ $datos ?? '' }}</textarea>
        </div>
        <button type="submit">Analizar Payload</button>
    </form>

    @if(isset($calculado))
        <div class="resultado {{ $status }}">
            <h3>Resultado del Análisis: {{ strtoupper($status) }}</h3>
            <p><strong>Puntuación de Riesgo:</strong> {{ $risk_score }} pts</p>
            <p><strong>Origen Sanitizado:</strong> {{ $origen }}</p>
            
            @if(!empty($flags))
                <p><strong>Alertas detectadas:</strong></p>
                <ul>
                    @foreach($flags as $flag)
                        <li>{{ $flag }}</li>
                    @endforeach
                </ul>
            @else
                <p>✓ No se detectaron patrones maliciosos conocidos.</p>
            @endif
            <small style="color: #7f8c8d;">Procesado el: {{ $processed_at }}</small>
        </div>
    @endif
</div>

</body>
</html>