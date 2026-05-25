<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Temperatura</title>

    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f3f4f6;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .card{
            background:white;
            padding:2rem;
            border-radius:20px;
            width:100%;
            max-width:450px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom:1rem;
            color:#1f2937;
        }

        label{
            display:block;
            margin-top:1rem;
            margin-bottom:0.4rem;
            font-weight:bold;
        }

        input, select{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:10px;
        }

        button{
            width:100%;
            margin-top:1.5rem;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#2563eb;
            color:white;
            font-size:16px;
            cursor:pointer;
        }

        .resultado{
            margin-top:1.5rem;
            background:#dbeafe;
            padding:1rem;
            border-radius:10px;
            color:#1e3a8a;
            text-align:center;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="card">

    <h1>🌡️ Convertidor de Temperatura</h1>

    <form method="POST" action="/temperatura">
        @csrf

        <label>Valor</label>
        <input type="number" step="any" name="valor" required>

        <label>Tipo de conversión</label>

        <select name="tipo">
            <option value="c">Celsius a Fahrenheit</option>
            <option value="f">Fahrenheit a Celsius</option>
        </select>

        <button type="submit">
            Convertir
        </button>
    </form>

    @if(isset($convertido))

        <div class="resultado">
            {{ $mensaje }}
        </div>

    @endif

</div>

</body>
</html>