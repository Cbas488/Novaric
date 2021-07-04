<div class="ps-5 pe-5 pb-5 my-container active-cont">
    <h3 class="display-6">Nueva compra</compra></h3>
    <form action="facturas_compra.php?action=guardar_factura" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label class="form-label">Producto</label>
            <select name="factura_compra[codigo_producto]" class="form-control" id="slctProducto" required>
                <?php
                echo "<option disabled selected value> -- Selecciona una opción --</option>";
                foreach($productos as $key => $producto):?>
                    <option value="<?php echo($producto['codigo_producto']); ?>"><?php echo($producto['producto']) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Selecciona una opción por favor.
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Cantidad</label>
            <input type="text" name="factura_compra[cantidad]" class="form-control" pattern="(0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*)" required>
            <div class="invalid-feedback">
                Llenar este campo por favor o poner el formato adecuado.
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label">RFC Proveedor</label>
            <select name="factura_compra[rfc]" class="form-control" id="slctRazonSocial" required>
                <?php
                echo "<option disabled selected value> -- Selecciona una opción --</option>";
                foreach($proveedores as $key => $proveedor):?>
                    <option value="<?php echo($proveedor['rfc']); ?>"><?php echo($proveedor['razon_social']) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                Selecciona una opción por favor.
            </div>
        </div>

        <div class="col-12">
            <button type="submit" name="enviar" class="btn btn-outline-success">
                <i class="fa fa-save p-1 icons"></i>
                Guardar
            </button>
        </div>
    </form>
</div>