
<fieldset>
<legend>Información General</legend>

<label for="titulo">Titulo:</label>
<input 
type="text" 
id="titulo" 
name="blog[titulo]" 
placeholder="Titulo" 
value="<?php echo s($blog->titulo); ?>">

<label for="nombre">Autor(a):</label>
<input 
type="text" 
id="nombre" 
name="blog[nombre]" 
placeholder="Autor(a)" 
value="<?php echo s($blog->nombre); ?>">

<label for="descripcion">Descripción:</label>
<textarea 
id="descripcion"
name="blog[descripcion]" 
cols="30" 
rows="10"><?php echo s($blog->descripcion); ?></textarea>

</fieldset>

<fieldset>
<legend>Información Extra</legend>

<label for="imagen">Imagen:</label>
<input 
type="file" 
id="imagen" 
accept="image/jpeg, image/png" 
name="blog[imagen]">

<?php if($blog->imagen) : ?>
    <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-small">
<?php endif; ?>

</fieldset>