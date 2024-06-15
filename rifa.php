<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa - Canhoto</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <?php
        $premio = "Rádio JBL";
        $valor = 5.00;
        $quantNum = 100;
        ?>
        <?php for ($i = 1; $i <= $quantNum; $i++) { ?>
            <div class="ticket">
                <div class="left-side">
                    <div class="ticket-info">
                        <p class="ticket-number">N° <?php echo $i; ?></p>
                        <p>Nome: <input type="text" name="name<?php echo $i; ?>" placeholder=""></p>
                        <p>Telefone: <input type="text" name="phone<?php echo $i; ?>" placeholder=""></p>
                        <p>Email: <input type="email" name="email<?php echo $i; ?>" placeholder=""></p>
                    </div>
                </div>
                <div class="dashed-divider"></div>
                <div class="right-side">
                    <h2>Ação entre Amigos - CSL</h2>
                    <div class="info">
                        <p>Prêmio: <?php echo htmlspecialchars($premio); ?></p>
                        <p>Valor: R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
                        <p>N°: <?php echo $i; ?></p>
                    </div>
                    <img src="premio.jpeg" alt="Prêmio" class="premio-img">
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
