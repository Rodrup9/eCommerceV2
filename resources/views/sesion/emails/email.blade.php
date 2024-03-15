<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reestablece tu contraseña</title>
</head>
<body>

    <?php 
        function generarCodigo() {
            $longitud = 10;
            $input = '0123456789abcdfghijklmnñopqrstwxyzABCDEFGHIJKLMNÑOPQRSTWXYZ';
            $longitud_input = strlen($input);
            $codigo = '';
            for ($i = 0; $i < $longitud; $i++) {
                $aleatorio = $input[mt_rand(0, $longitud_input - 1)];
                $codigo .= $aleatorio;
            }
            return $codigo;
        }
    ?>
    <h1>Example email for practice</h1>

    <p>This email will be for send code</p>

    <br>

    <p><?php echo generarCodigo() ?></p>
</body>
</html>