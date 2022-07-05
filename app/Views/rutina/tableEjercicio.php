<style>
    td,
    th {
        text-align: center;
    }
</style>
<?php

echo '<h1>' . $titulo . '</h1>';

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th>DIAS</th>
            <th>RUTINA</th>
            <th>EJERCICIO</th>
            <th>SERIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($registros as $row) {
        ?>
            <tr>
                <td> <?= $row['dias'] ?> </td>
                <td> <?= $row['rutina'] ?> </td>
                <td> <?= $row['ejercicio'] ?> </td>
                <td> <?= $row['serie'] ?> </td>
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

        padding: 20px;
    }

    #btn {
        margin-bottom: 20px;
        margin-left: 500px;
    }
</style>
<div>
    <a id="btn" class="btn btn-success" href="rutinapdf/" target="_blank">Reporte PDF</a>
</div>