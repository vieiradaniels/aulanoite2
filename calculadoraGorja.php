<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjetas</title>
    <link rel="stylesheet" href="./style3.css">
</head>

<body>
    <div>
        <h1>Calculadora de Gorjetas</h1>
        <form action="calculadoraGorja.php" method="POST">
            <label for="valorConta">Valor da Conta (R$): </label>
            <input type="number" id="valorConta" name="valorConta" step="0.01" required>
            
            <label for="porcentagemGorjeta">Porcentagem da Gorjeta (%): </label>
            <select id="porcentagemGorjeta" name="porcentagemGorjeta" required>
                <option value="10">10%</option>
                <option value="15">15%</option>
                <option value="20">20%</option>
                <option value="25">25%</option>
            </select>
            
            <input type="submit" value="Calcular Gorjeta">
            <input type="reset" value="Limpar">
        </form>
       
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<div class="resposta">';
            if (isset($_POST['valorConta']) && isset($_POST['porcentagemGorjeta'])) {
                $valorConta = $_POST['valorConta'];
                $porcentagemGorjeta = $_POST['porcentagemGorjeta'];

                $erro = empty($valorConta) ? "O valor da conta é obrigatório" : (!is_numeric($valorConta) || $valorConta <= 0 ? "Por favor, insira um valor válido para a conta" : "");
                
                if ($erro) {
                    echo "<p class='erro'>$erro</p>";
                } else {
                    $gorjeta = $valorConta * ($porcentagemGorjeta / 100);
                    $totalComGorjeta = $valorConta + $gorjeta;
                    
                    $gorjeta = number_format($gorjeta, 2, ',', '.');
                    $totalComGorjeta = number_format($totalComGorjeta, 2, ',', '.');

                    echo "<p>Valor da Conta: R$ " . number_format($valorConta, 2, ',', '.') . "</p>";
                    echo "<p>Porcentagem da Gorjeta: $porcentagemGorjeta%</p>";
                    echo "<p>Valor da Gorjeta: R$ $gorjeta</p>";
                    echo "<p>Total com Gorjeta: R$ $totalComGorjeta</p>";
                }
            } else {
                echo "<p class='erro'>Formulário não enviado corretamente.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>