<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperaturas</title>
    <link rel="stylesheet" href="./style4.css">
</head>

<body class="<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['temperatura']) && isset($_POST['escala'])) {
            $temperatura = $_POST['temperatura'];
            $escala = $_POST['escala'];
            if ($escala == "celsius") {
                $temperaturaC = $temperatura;
            } else {
                $temperaturaC = ($temperatura - 32) * 5 / 9;
            }
            if ($temperaturaC >= 25) {
                echo 'quente';
            } elseif ($temperaturaC >= 1 && $temperaturaC < 25) {
                echo 'ameno';
            } else {
                echo 'frio';
            }
        }
    } else {
        echo 'frio';
    }
?>">
    <div>
        <h1>Conversor de Temperaturas</h1>
        <form action="conversorTemperatura.php" method="POST">
            <label for="temperatura">Temperatura: </label>
            <input type="number" id="temperatura" name="temperatura" step="0.1" required>
            
            <label for="escala">Escala: </label>
            <select id="escala" name="escala" required>
                <option value="celsius">Celsius (°C)</option>
                <option value="fahrenheit">Fahrenheit (°F)</option>
            </select>
            
            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
        </form>
       
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['temperatura']) && isset($_POST['escala'])) {
                $temperatura = $_POST['temperatura'];
                $escala = $_POST['escala'];

                $erro = !is_numeric($temperatura) ? "Por favor, insira uma temperatura válida" : "";
                
                if ($erro) {
                    echo "<div class='resposta'><p class='erro'>$erro</p>";
                } else {
                    if ($escala == "celsius") {
                        $temperaturaC = $temperatura;
                        $temperaturaF = ($temperatura * 9/5) + 32;
                    } else {
                        $temperaturaF = $temperatura;
                        $temperaturaC = ($temperatura - 32) * 5/9;
                    }
                    
                    $temperaturaC = number_format($temperaturaC, 1, ',', '.');
                    $temperaturaF = number_format($temperaturaF, 1, ',', '.');

                    echo "<div class='resposta'><p>Temperatura em Celsius: $temperaturaC °C</p>";
                    echo "<div class='resposta'><p>Temperatura em Fahrenheit: $temperaturaF °F</p>";
                }
            } else {
                echo "<div class='resposta'><p class='erro'>Formulário não enviado corretamente.</p>";
            }
        }
        ?>
    </div>
</body>

</html>
