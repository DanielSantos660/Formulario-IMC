<?php
$nome = $_POST['nome'];
$h = str_replace(',', '.', $_POST['altura']);
$p = str_replace(',', '.', $_POST['peso']);

$IMC = $p / ($h * $h);
$ar = round($IMC, 2);

$abaixo = ""; 
$ideal = "";
$sobrepeso = "";
$obesidade1 = "";
$obesidade2 = "";
$obesidade3 = "";

$t1 = "-"; $t2 = "-"; $t3 = "-"; $t4 = "-"; $t5 = "-"; $t6 = "-";


if ($IMC < 18.5) {
    $result = "Olá $nome, você está abaixo do peso!";
    $t1 = $ar;
    $abaixo = "background-color: #ff6171;";
} elseif ($IMC >= 18.5 && $IMC <= 24.9) {
    $result = "Olá $nome, você está no peso ideal!";
    $t2 = $ar;
    $ideal = "background-color: #4CAF50;";
} elseif ($IMC >= 25.0 && $IMC <= 29.9) {
    $result = "Olá $nome, você está com sobrepeso!";
    $t3 = $ar;
    $sobrepeso = "background-color: #ff9800;";
} elseif ($IMC >= 30.0 && $IMC <= 34.9) {
    $result = "Olá $nome, você está com Obesidade Grau I!";
    $t4 = $ar;
    $obesidade1 = "background-color: #ff5722;";
} elseif ($IMC >= 35.0 && $IMC <= 39.9) {
    $result = "Olá $nome, você está com Obesidade Grau II!";
    $t5 = $ar;
    $obesidade2 = "background-color: #f44336;";
} else {
    $result = "Olá $nome, você está com Obesidade Grau III(Mórbida)!";
    $t6 = $ar;
    $obesidade3 = "background-color: #ff1302;";
}

echo "<h1 style='text-align: center; margin-top: 100px;'>$result</h1>";


?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>IMC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="form.css">
</head>

<body style="background-color: #e2edfa;">
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container mt-5 justify-content-center">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center rounded">
                    <h2 class="h2">Seu IMC:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table text-center table-bordered table-striped" style="border: 1px solid #bbbfc4; border-radius: 10px; overflow: hidden;">
                        <thead class="table-light">
                            <tr>
                                <th>Seu IMC</th>
                                <th>Reta numérica</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="<?php echo $abaixo?>"><?php echo $t1; ?></td>
                                <td style="<?php echo $abaixo?>">IMC < 18.5</td>
                                <td style="<?php echo $abaixo?>">Abaixo do peso</td>
                            </tr>
                            <tr>
                                <td style="<?php echo $ideal?>"><?php echo $t2; ?></td>
                                <td style="<?php echo $ideal?>">18.5 ≤ IMC ≤ 24.9</td>
                                <td style="<?php echo $ideal?>">Peso ideal</td>
                            </tr>
                            <tr>
                                <td style="<?php echo $sobrepeso?>"><?php echo $t3; ?></td>
                                <td style="<?php echo $sobrepeso?>">25.0 ≤ IMC ≤ 29.9</td>
                                <td style="<?php echo $sobrepeso?>">Sobrepeso</td>
                            </tr>
                            <tr>
                                <td style="<?php echo $obesidade1?>"><?php echo $t4; ?></td>
                                <td style="<?php echo $obesidade1?>">30.0 ≤ IMC ≤ 34.9</td>
                                <td style="<?php echo $obesidade1?>">Obesidade Grau I</td>       
                            </tr>
                            <tr>
                                <td style="<?php echo $obesidade2?>"><?php echo $t5; ?></td>
                                <td style="<?php echo $obesidade2?>">35.0 ≤ IMC ≤ 39.9</td>
                                <td style="<?php echo $obesidade2?>">Obesidade Grau II</td>
                            </tr>
                            <tr>
                                <td style="<?php echo $obesidade3?>"><?php echo $t6; ?></td>
                                <td style="<?php echo $obesidade3?>">IMC ≥ 40.0</td>
                                <td style="<?php echo $obesidade3?>">Obesidade Grau III</td>
                            </tr>
                        </tbody>
                       
                    </table>
                </div>
            </div>

        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>