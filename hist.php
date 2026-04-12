<!doctype html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <style>
        .modal.fade .modal-dialog {
            transform: scale(0.7);
            transition: transform 0.2s ease-out;
        }
        .modal.show .modal-dialog {
            transform: scale(1);
        }
    </style>
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
                    <h2 class="h2">Histórico de Cálculos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <table class="table text-center table-bordered table-striped"
                        style="border: 1px solid #bbbfc4; border-radius: 10px; overflow: hidden;">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Altura</th>
                                <th>Peso</th>
                                <th>IMC</th>
                                <th>Situação</th>
                                <th>Sexo</th>
                                <th>Data de cálculo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "conn.php";
                            $hist = $conn->query('SELECT * FROM calculo ORDER BY calc_id DESC');
                            while ($row = $hist->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['calc_nome'] . '</td>';
                                echo '<td>' . $row['calc_alt'] . '</td>';
                                echo '<td>' . $row['calc_peso'] . '</td>';

                                $cimc = $row['calc_imc'];
                                $csit = $row['calc_sit'];

                                if ($cimc < 18.5) {
                                    echo '<td style="color: #ff6171;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #ff6171;">'. $row['calc_sit'] . '</td>';
                                } else if ($cimc >= 18.5 && $cimc <= 24.9) {
                                    echo '<td style="color: #4CAF50;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #4CAF50;">'. $row['calc_sit'] . '</td>';
                                } else if ($cimc >= 25.0 && $cimc <= 29.9) {
                                    echo '<td style="color: #ff9800;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #ff9800;">'. $row['calc_sit'] . '</td>';
                                } else if ($cimc >= 30.0 && $cimc <= 34.9) {
                                    echo '<td style="color: #ff5722;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #ff5722;">'. $row['calc_sit'] . '</td>';
                                } else if ($cimc >= 35.0 && $cimc <= 39.9) {
                                    echo '<td style="color: #f44336;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #f44336;">'. $row['calc_sit'] . '</td>';
                                } else {
                                    echo '<td style="color: #ff1302;">' . $row['calc_imc'] . '</td>';
                                    echo '<td style="color: #ff1302;">'. $row['calc_sit'] . '</td>';
                                }

                            
                                echo '<td>' . $row['calc_sex'] . '</td>';
                                echo '<td>' . $row['calc_dat'] . '</td>';
                                echo '<td><button class="btn btn-sm btn-danger" onclick="confirmDelete(' . $row['calc_id'] . ')">Excluir</button></td>';
                                echo '</tr>';
                            }


                            ?>
                        </tbody>

                    </table>
                    <div class="col-md-12  d-flex justify-content-between align-items-center">
                        <button onclick="window.location.href='form.html'" class="btn btn-outline-primary">Novo cálculo</button>
                        <button onclick="confirmDeleteAll()" class="btn btn-outline-danger">Excluir Cálculos</button>

                    </div>
                </div>
            </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        let deleteUrl = '';

        function confirmDelete(id) {
            deleteUrl = 'delete.php?id=' + id;
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            document.getElementById('confirmMessage').innerText = 'Tem certeza que deseja excluir este cálculo?';
            modal.show();
        }

        function confirmDeleteAll() {
            deleteUrl = 'delete_all.php';
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            document.getElementById('confirmMessage').innerText = 'Tem certeza que deseja excluir TODOS os cálculos? Esta ação não pode ser desfeita.';
            modal.show();
        }

        function executeDelete() {
            if (deleteUrl) {
                window.location.href = deleteUrl;
            }
        }
    </script>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                    <br><br>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="executeDelete()">Excluir</button>
                    </div>
                </div>
               
                    
            </div>
        </div>
    </div>

</body>

</html>