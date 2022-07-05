<?php

echo '<h1>' . $titulo . '</h1>';

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>PESO</th>
            <th>ESTATURA</th>
            <th>IMC</th>
            <th>FECHA</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($registros as $row) {
        ?>
            <tr>
                <td> <?= $row['id'] ?> </td>
                <td> <?= $row['peso'] ?> </td>
                <td> <?= $row['estatura'] ?> </td>
                <td> <?= $row['imc'] ?> </td>
                <td> <?= $row['fecha'] ?> </td>
            </tr>
        <?php
        }
        ?>

    </tbody>

    <style>
        td,
        th {
            text-align: center;
            font-family: 'Red Hat Display', sans-serif;

        }

        h1 {
            text-align: center;
            font-family: 'Red Hat Display', sans-serif;

            padding: 40px;
        }

        #btn {
            margin-bottom: 20px;
            margin-left: 500px;
        }
    </style>
</table>
<div>
    <a id="btn" class="btn btn-success" href="historicopdf/" target="__blank">Reporte PDF</a>
</div>