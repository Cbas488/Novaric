<div class="ps-5 pe-5 pt-5 pb-5 my-container active-cont">
    <h3 class="display-6">Agregar/Actualizar formas de aspersión</h3>
    <form action="formas_aspersion.php?action=<?php echo($_GET['action'] == 'ver')?'actualizar':'guardar'; ?>" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
            <label class="form-label">Forma de aspersión</label>
            <input type="text" name="forma_aspersion[forma_aspersion]" value='<?php echo($_GET['action'] == 'ver')?$datos[0]['forma_aspersion']:''; ?>' class="form-control" id="txtFormaAspersion" required>
            <div class="invalid-feedback">
                Llenar este campo por favor.
            </div>
        </div>

        <div class="col-12">
            <input type="hidden" name='forma_aspersion[id_forma_aspersion]' value='<?php echo($_GET['action'] == 'ver')?$datos[0]['id_forma_aspersion']:''; ?>' />
            <button type="submit" name="enviar" class="btn btn-outline-success">
                <i class="fa fa-save p-1 icons"></i>
                Guardar
            </button>
        </div>
    </form>
</div>