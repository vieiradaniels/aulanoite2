<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Áreas</title>
    <link rel="stylesheet" href="./style5.css">
</head>

<body>
    <div class="container">
        <h1>Calculadora de Áreas</h1>
        <form action="calculadoraArea.php" method="POST">
            <label for="forma">Escolha a forma: </label>
            <select id="forma" name="forma" onchange="this.form.submit()" required>
                <option value="">Selecione...</option>
                <option value="retangulo" <?php if (isset($_POST['forma']) && $_POST['forma'] == 'retangulo') echo 'selected'; ?>>Retângulo</option>
                <option value="circulo" <?php if (isset($_POST['forma']) && $_POST['forma'] == 'circulo') echo 'selected'; ?>>Círculo</option>
                <option value="triangulo" <?php if (isset($_POST['forma']) && $_POST['forma'] == 'triangulo') echo 'selected'; ?>>Triângulo</option>
            </select>

            <?php if (isset($_POST['forma']) && $_POST['forma'] == 'retangulo'): ?>
                <div>
                    <label for="larguraRet">Largura: </label>
                    <input type="number" id="larguraRet" name="larguraRet" step="0.1"
                        value="<?php echo isset($_POST['larguraRet']) ? $_POST['larguraRet'] : ''; ?>" required>

                    <label for="alturaRet">Altura: </label>
                    <input type="number" id="alturaRet" name="alturaRet" step="0.1"
                        value="<?php echo isset($_POST['alturaRet']) ? $_POST['alturaRet'] : ''; ?>" required>
                </div>
            <?php endif; ?>

            <?php if (isset($_POST['forma']) && $_POST['forma'] == 'circulo'): ?>
                <div>
                    <label for="raio">Raio: </label>
                    <input type="number" id="raio" name="raio" step="0.1"
                        value="<?php echo isset($_POST['raio']) ? $_POST['raio'] : ''; ?>" required>
                </div>
            <?php endif; ?>

            <?php if (isset($_POST['forma']) && $_POST['forma'] == 'triangulo'): ?>
                <div>
                    <label for="base">Base: </label>
                    <input type="number" id="base" name="base" step="0.1"
                        value="<?php echo isset($_POST['base']) ? $_POST['base'] : ''; ?>" required>

                    <label for="alturaTri">Altura: </label>
                    <input type="number" id="alturaTri" name="alturaTri" step="0.1"
                        value="<?php echo isset($_POST['alturaTri']) ? $_POST['alturaTri'] : ''; ?>" required>
                </div>
            <?php endif; ?>

            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar" onclick="window.location.href='calculadoraArea.php';">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $forma = $_POST['forma'];
                $erro = '';

                if ($forma == 'retangulo') {
                    $largura = isset($_POST['larguraRet']) ? $_POST['larguraRet'] : null;
                    $altura = isset($_POST['alturaRet']) ? $_POST['alturaRet'] : null;
                    if (is_numeric($largura) || is_numeric($altura) || $largura > 0 || $altura > 0) {
                        $area = $largura * $altura;
                        echo "<p>A área do retângulo é: $area</p>";
                    } else {
                       // $erro = "Por favor, insira valores válidos para largura e altura.";
                       $erro="";
                    }
                } elseif ($forma == 'circulo') {
                    $raio = isset($_POST['raio']) ? $_POST['raio'] : null;
                    if (is_numeric($raio) && $raio > 0) {
                        $area = pi() * $raio * $raio;
                        echo "<p>A área do círculo é: " . number_format($area, 2) . "</p>";
                    } else {
                       // $erro = "Por favor, insira um valor válido para o raio.";
                       $erro="";
                    }
                } elseif ($forma == 'triangulo') {
                    $base = isset($_POST['base']) ? $_POST['base'] : null;
                    $alturaTri = isset($_POST['alturaTri']) ? $_POST['alturaTri'] : null;
                    if (is_numeric($base) && is_numeric($alturaTri) && $base > 0 && $alturaTri > 0) {
                        $area = ($base * $alturaTri) / 2;
                        echo "<p>A área do triângulo é: $area</p>";
                    } else {
                        //$erro = "Por favor, insira valores válidos para base e altura.";
                        $erro="";
                    }
                } else {
                    $erro = "Por favor, selecione uma forma válida.";
                }

                if ($erro) {
                    echo "<p class='erro'>$erro</p>";
                }
            }
            ?>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>
