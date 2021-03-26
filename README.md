Pequeño Modelo Vista Controlador para la gestión de productos. <br>
Desarrollado con las tecnologías Laravel, Vue y Vuetify como material design. <br>
Gestión de productos con registro, edición, eliminación y listado. 
Validación y control de errores. <br>

<p> Componentes Vue:  resource/js/components <br>
    Se encuentran los componentes utilizados para generar las vistas. <br> Desde el componente Inicio.vue se importan el resto de componentes necesarios para la gestión de los productos. 
</p>
<p> Back: Modelo y Controlador del producto <br>
    En ProductoController se encuentran los métodos necesarios para la gestión del producto, registralo, editarlo, eliminarlo y listar. <br>
    En cada método se realiza una validación con control de errores que se mostrará en la vista correspondiente
</p>

## Inicio: 
<img src="imagesReadme/inicio.PNG"  height=600 width=800>
![Ver Imagen](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/imagesReadme/inicio.PNG "Imagen Inicio")
[Ver Código](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/resources/js/components/Inicio.vue "Código)

<br>

## Registro: 
<img src="imagesReadme/registro.PNG"  height=600 width=800>
![Ver Imagen](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/imagesReadme/registro.PNG "Imagen Registro")
[Ver Código](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/resources/js/components/Registro.vue "Código)
<br>

## Edicion: 
<img src="imagesReadme/edicion.PNG"  height=600 width=800>
![Ver Imagen](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/imagesReadme/edicion.PNG "Imagen Edicion")
[Ver Código](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/resources/js/components/Edicion.vue "Código)
<br>

## Eliminacion: 
<img src="imagesReadme/eliminacion.PNG"  height=600 width=800>
![Ver Imagen](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/imagesReadme/eliminacion.PNG "Imagen Eliminacion")
[Ver Código](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/resources/js/components/Borrar.vue "Código)

## Laravel: [Ver Código Php](https://github.com/SaraSat/MVC-Laravel-Vue/blob/master/app/Http/Controllers/ProductoController.php "Código Php)