<?php

echo '<h1>' . $titulo . '</h1>';

?>

<button id="btn" type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modalNew" data-bs-whatever="@mdo">
    <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario
</button>
<div>
    <a id="btn" class="btn btn-success" href="adminpdf/" target="__blank">Reporte PDF</a>
</div>

<table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>CORREO</th>
            <th>CLAVE</th>
            <th>ROL</th>
            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($registros as $row) {
        ?>
            <tr>
                <td> <?= $row['id'] ?> </td>
                <td> <?= $row['nombres'] ?> </td>
                <td> <?= $row['correo'] ?> </td>
                <td> <?= $row['clave'] ?> </td>
                <td> <?= $row['rol'] ?> </td>
                <td>
                    <button type="button" class="btn btn-info" onclick="OpenModal(<?= $row['id']; ?>);">
                        <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px"></i>
                    </button>
                    <a href="<?= site_url('auth/eliminar/' . $row['id']); ?>" title="Eliminar" onclick="return confirm('¿Seguro que quieres eliminar?')">
                        <button type="button" class="btn btn-danger">
                            <i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px"></i>
                        </button>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>
<?php echo view('auth/edit'); ?>
<?php echo view('auth/add'); ?>

<style>
    td,
    th {
        text-align: center;
        font-family: 'Red Hat Display', sans-serif;

    }

    h1 {
        text-align: center;
        font-family: 'Red Hat Display', sans-serif;

        padding: 10px;
    }

    #btn {
        margin-bottom: 20px;
        margin-left: 450px;
        border-radius: 10px;
        width: 190px;
        padding: 4px;



    }
</style>