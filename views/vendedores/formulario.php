<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input 
    type="text" 
    id="nombre" 
    name="vendedor[nombre]" 
    placeholder="Nombre Vendedor(a)" 
    value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input 
    type="text" 
    id="apellido" 
    name="vendedor[apellido]" 
    placeholder="Apellido Vendedor(a)" 
    value="<?php echo s($vendedor->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Telefono:</label>
    <input 
    type="number" 
    id="telefono" 
    name="vendedor[telefono]" 
    placeholder="Telefono Vendedor(a)" 
    value="<?php echo s($vendedor->telefono); ?>">

    <label for="imagen">Imagen:</label>
    <input 
    type="file" 
    id="imagen" 
    accept="image/jpeg, image/png" 
    name="vendedor[imagen]">

    <?php if($vendedor->imagen) : ?>
        <img src="/imagenes/<?php echo $vendedor->imagen ?>" class="imagen-small">
    <?php endif; ?>
    
</fieldset>