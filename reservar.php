<!-- contiene el formulario de login -->

<!DOCTYPE html>
<html lang ="es">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>reservar</title>
</head>
<body>
    <main>
        <article>
            <h1>Reserva</h1>

            <form action="procesarReserva.php" method="post">
                <!-- hay que crear las bases de datos -->

                <label for="casa">Casa:</label>
                <select name="casa" id="casa">
                    <option value="">Selecciona una casa</option>
                    <option value="1">Casa 1</option>
                    <option value="2">Casa 2</option>
                    <option value="3">Casa 3</option>
                    <!-- agregar más opciones aquí -->
                </select>

                <label for="fecha_entrada">Fecha de entrada:</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" required>

                <label for="fecha_salida">Fecha de salida:</label>
                <input type="date" name="fecha_salida" id="fecha_salida" required>

                <input type="submit" value="Reservar">

            </form>
        </article>
    </main>
</body>
</html> 

