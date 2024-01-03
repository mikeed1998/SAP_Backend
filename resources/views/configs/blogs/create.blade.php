<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <style>
        #contador-caracteres {
            color: #999;
            font-size: 12px;
        }
        .excedido {
            color: red;
        }
    </style>
</head>
<body style="background-color: #201E1F;">

    <div class="col-11 mx-auto">
        <div class="row mb-4 px-2">
            <a href="{{ route('config.seccion.show', ['slug' => 'blog']) }}" class="col mt-5 mb-5 col-md-2 btn btn-sm grey darken-2 text-dark bg-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-11 mb-5 mx-auto">
                <form id="miFormulario" method="post" action="{{ route('config.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="titulo" class="form-label h4 text-white">Titulo del post</label>
                    <input type="text" name="titulo" class="form-control py-2 mt-1 mb-3 text-white" id="titulo" style="background-color: #201E1F;" placeholder="Titulo">
                    <label for="descripcion" class="form-label h4 text-white">Descripción de la entrada</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="6" maxlength="1000" class="form-control text-white" style="background-color: #201E1F;" placeholder="Esta descripción se mostrará en la miniatura de este blog en la sección donde aparecen todos los blogs"></textarea>
                    <p id="contador-caracteres">Caracteres restantes: <span id="caracteres-restantes">1000</span></p>
                    <label for="portada" class="form-label h4 text-white mt-1">Portada de este post</label>
                    <input type="file" id="portada" name="portada" class="form-control" style="background-color: #201E1F;">
                    <small class="text-white">Portada del post, se mostrará en la sección de los blogs asi como al principio del post</small>
                    <hr class="mb-3">
                    <label for="colorPicker" class="form-label h4 text-white">Selecciona un color de fondo:</label>
                    <input type="color" id="colorPicker" name="colorPicker" value="#CCAEEC" onchange="actualizarColor()">
                    <hr class="mb-3">
                    <label for="summernote" class="form-label h4 text-white mt-1">Contenido del post</label>
                    <textarea id="summernote" name="contenido"></textarea>
                    <button class="btn-lg btn-success mt-2 w-100" type="submit">Guardar post</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Obtener elementos
        var textarea = document.getElementById('descripcion');
        var contadorCaracteres = document.getElementById('caracteres-restantes');

        // Establecer el evento de entrada para el textarea
        textarea.addEventListener('input', function() {
            // Obtener la longitud actual del contenido
            var longitudActual = textarea.value.length;

            // Obtener la longitud máxima permitida
            var longitudMaxima = parseInt(textarea.getAttribute('maxlength'));

            // Calcular caracteres restantes
            var caracteresRestantes = longitudMaxima - longitudActual;

            // Actualizar el contador de caracteres restantes
            contadorCaracteres.textContent = caracteresRestantes;

            // Agregar una clase si se excede la longitud máxima
            if (caracteresRestantes < 0) {
                contadorCaracteres.classList.add('excedido');
            } else {
                contadorCaracteres.classList.remove('excedido');
            }
        });
    </script>
    
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Aquí va el contenido principal del post (estilos, parrafos, imagenes, etc.)',
            tabsize: 2,
            height: 600,
            callbacks: {
                onImageUpload: function(files) {
                    // Enviar la imagen al servidor y manejar la respuesta
                    enviarImagen(files[0]);
                },
                onImageLinkInsert: function(url) {
                    // Puedes manejar la inserción de imágenes desde enlaces aquí
                }
            }
        });

        // Función para enviar la imagen al servidor
        function enviarImagen(file) {
            var formData = new FormData();
            formData.append('imagen', file);

            $.ajax({
                url: '/config/blog/guardar_imagen',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        // Parsear la respuesta JSON
                        var data = JSON.parse(response);

                        // Insertar la imagen en el editor
                        if (data.imagenURL) {
                            $('#summernote').summernote('insertImage', data.imagenURL);
                        } else {
                            console.error('Error al recibir la URL de la imagen.');
                        }
                    } catch (error) {
                        console.error('Error al parsear la respuesta JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
<script>
    function actualizarColor() {
   // Obtener el valor hexadecimal del color seleccionado
   var colorSeleccionado = document.getElementById('colorPicker').value;

   // Actualizar el contenido del span con el valor seleccionado
   document.getElementById('colorSeleccionado').innerText = colorSeleccionado;
 }
</script>
</body>
</html>