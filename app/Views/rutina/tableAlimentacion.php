<?php

echo '<h1>' . $titulo . '</h1>';

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th>DIAS</th>
            <th>ALIMENTO</th>
            <th>DESCRIPCION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($registros as $row) {
        ?>
            <tr>
                <td> <?= $row['dias'] ?> </td>
                <td> <?= $row['alimento'] ?> </td>
                <td> <?= $row['descripcion'] ?> </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>
<style>
    td,
    th {
        text-align: center;

    }

    h1 {
        text-align: center;

        padding: 40px;
    }

    #btn {
        margin-bottom: 20px;
        margin-left: 500px;
    }
</style>
<div>
    <a id="btn" class="btn btn-success" href="alimentacionpdf/" target="_blank">Reporte PDF</a>
</div>