<div class="ps-5 pe-5 pt-3 my-container active-cont">
    <h3 class="display-3">Proveedores</h3>
    <div class="d-flex flex-row-reverse">
        <form action="proveedores.php" method="GET">
            <input class="input-group-text pe-1" style="display:inline-block;" type="text" name="busqueda">
            <button class="btn btn-outline-secondary" type="submit">
                Buscar
                <i class="fa fa-search p-1 icons"></i>
            </button>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">RFC</th>
            <th scope="col">Razón Social</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acción</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($datos as $key => $proveedor): ?>
            <tr>
                <td><?=$proveedor['rfc']?></td>
                <td><?=$proveedor['razon_social']?></td>
                <td><?=$proveedor['domicilio']?></td>
                <td><?=$proveedor['telefono']?></td>
                <td>
                    <a href="proveedores.php?action=ver&rfc=<?=$proveedor['rfc']?>" class="btn btn-primary">
                        <i class="fa fa-arrow-up p-1 icons"></i>
                    </a>
                    <a href="proveedores.php?action=eliminar&rfc=<?=$proveedor['rfc']?>" class="btn btn-danger">
                        <i class="fa fa-trash p-1 icons"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <?php for($i = 0, $k = 1; $i < $proveedores -> total(); $i+=5, $k++): ?>
                <li class="page-item"><a class="page-link" href="proveedores.php?<?php echo(isset($_GET['busqueda']))?'busqueda='.$_GET['busqueda'].'&':''; ?>&desde=<?php echo($i); ?>&limite=5"><?php echo ($k); ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php
        echo "Filtrando " . count($datos) . " de un total del " . $proveedores -> total() . " proveedores"
    ?>
</div>