<div class="container text-center">
    <form method="POST" action="agregarVoluntario">

        <legend>Agregar voluntario</legend>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Nombre</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Apellido</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="apellido" name="apellido">
        </div>
        <div class="mb-3">
            <label for="disabledSelect" class="form-label">Sede</label>
            <select id="disabledSelect" class="form-select" name="sede">
                <?php foreach ($sedes as $sede): ?>
                    <option value="<?= $sede->id_sede; ?>">
                        <?= $sede->pais; ?>
                    </option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
</div>