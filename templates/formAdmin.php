<div class="container text-center">
    <form method="POST" action="agregarVoluntario">

        <legend>agregar voluntario</legend>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">nombre</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">apellido</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="apellido" name="apellido">
        </div>
        <div class="mb-3">
            <label for="disabledSelect" class="form-label">sede</label>
            <select id="disabledSelect" class="form-select" name="sede">
                <option>africa</option>
                <option value="">australia</option>
            </select>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>