<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par o Impar</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4338ca;
        }

        .resultado {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Verificador Par o Impar</h1>

    <form method="POST" action="/par-impar">
        @csrf

        <input
            type="number"
            name="numero"
            placeholder="Ingresa un número"
            required
        >

        <button type="submit">
            Verificar
        </button>
    </form>

    @isset($verificado)
        <div class="resultado">
            {{ $resultado }}
        </div>
    @endisset
</div>

</body>
</html>