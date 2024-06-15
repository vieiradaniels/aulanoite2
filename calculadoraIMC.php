<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="./style1.css">
</head>

<body>
    <h1> Calcular IMC</h1>
    <form action="calculadoraIMC.php" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="peso">Peso(kg): </label>
        <input type="number" id="peso" name="peso" step="0.1" required><br><br>
        <label for="altura">Altura(m): </label>
        <input type="number" name="altura" id="altura" step="0.01" required><br><br>
        <label for="anoNasc">Ano Nascimento: </label>
        <input type="number" name="anoNasc" id="anoNasc" required><br><br>
        <input type="submit" value="Calcula IMC">
        <input type="reset" value="Limpar">
    </form>
   
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['anoNasc'])) {
                $nome = $_POST['nome'];
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];
                $anoNasc = $_POST['anoNasc'];
                $idade = date("Y") - $anoNasc;

                $erro = empty($nome) || empty($peso) || empty($altura) || empty($anoNasc) ? "Todos os campos são obrigatórios" : ((!is_numeric($altura) || $peso <= 0 || $altura <= 0) ? "Por favor, insira valores válidos" : ($idade < 0 ? "Por favor, insira um ano de nascimento válido." : ""));
                if ($erro) {
                    echo " <div class='resposta'> <p class='erro'>$erro</p>";
                } else {
                    $imc = $peso / ($altura * $altura);
                    $imc = number_format($imc, 2);
                    $classificacao = ($imc < 18.5) ? "Abaixo do peso" :
                        (($imc < 24.9) ? "Peso Normal" :
                            (($imc < 29.9) ? "Sobrepeso" : "Obesidade"));
                    echo "<div class='resposta'><p>Nome: $nome</p>";
                    echo "<p>Idade: $idade anos</p>";
                    echo "<p>Seu IMC é: $imc</p>";
                    echo "<p>Classificação: $classificacao</p>";
                }
            } else {
                echo " <div class='resposta'><p class='erro'>Formulário não enviado corretamente.</p>";
            }
        } ?>
    </div>
</body>

</html>