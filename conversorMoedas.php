<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="./style2.css">
</head>

<body>
    <h1>Conversor de Moedas</h1>
    <form action="conversorMoedas.php" method="POST">
        <label for="valor">Valor: </label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>

        <label for="moedaOrigem">Moeda de Origem: </label>
        <select id="moedaOrigem" name="moedaOrigem" required>
            <option value="USD">Dólar Americano (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="BRL">Real Brasileiro (BRL)</option>
        </select><br><br>

        <label for="moedaDestino">Moeda de Destino: </label>
        <select id="moedaDestino" name="moedaDestino" required>
            <option value="USD">Dólar Americano (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="BRL">Real Brasileiro (BRL)</option>
        </select><br><br>

        <input type="submit" value="Converter">
        <input type="reset" value="Limpar">
    </form>         
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = $_POST['valor'];
            $moedaOrigem = $_POST['moedaOrigem'];
            $moedaDestino = $_POST['moedaDestino'];

            $taxasDeCambio = [
                "USD" => ["USD" => 1, "EUR" => 0.85, "BRL" => 5.10],
                "EUR" => ["USD" => 1.18, "EUR" => 1, "BRL" => 6.00],
                "BRL" => ["USD" => 0.20, "EUR" => 0.17, "BRL" => 1],
            ];

            if (isset($taxasDeCambio[$moedaOrigem][$moedaDestino])) {
                $taxa = $taxasDeCambio[$moedaOrigem][$moedaDestino];
                $valorConvertido = $valor * $taxa;
                $valorConvertido = number_format($valorConvertido, 2);
                echo "<div class='resposta'><p>$valor $moedaOrigem equivale a $valorConvertido $moedaDestino</p>";
            } else {
                echo "<div class='resposta'><p class='erro'>Conversão não disponível para as moedas selecionadas.</p>";
            }
        }
        ?>
    </div>
</body>

</html>