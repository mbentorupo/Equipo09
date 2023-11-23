# Documentación Ej3

## Crear una nueva etiqueta:
git tag -a 1et -m "crear etiqueta"

## Borrar una etiqueta:
git tag -d 1et

### Listar etiquetas:
git tag

### Imagen del git bash:
![Caprura de crear, borrar y listar]("../capturasEj3/crear_borrar_listar_etiqueta.png")

## Commit:
git tag -a 1et 4c197f854d78e95233c62bf2f0f0476a0e15c5e9 -m "etiqueta 1"

### Imagen commit y push:
![Commit y push]("../capturasEj3/commit_push_etiqueta.png")

## Acceso al release:
git fetch --tag

### Imagen acceso release:
![acceso release]("../capturasEj3/acceso_release.png")

## Utilidad del release:
- Las releases en GitHub proporcionan una manera estructurada y fácil de distribuir versiones específicas de su proyecto.
- Permiten adjuntar archivos binarios, notas de lanzamiento y otros recursos útiles para los usuarios.
- Facilitan la documentación de cambios importantes y mejoras en cada versión.
- Las releases son especialmente útiles para que los usuarios finales descarguen versiones estables de su software.

## Función de las etiquetas:
- Las etiquetas en Git son punteros estáticos a puntos específicos en la historia de su repositorio.
Son útiles para marcar versiones específicas o hitos importantes.
- Ayudan a los desarrolladores y colaboradores a identificar y regresar fácilmente a versiones anteriores del código.
- Las etiquetas son inmutables y no cambian con el tiempo, lo que las hace ideales para referenciar versiones específicas en la historia del proyecto.

### Antes:
![antes de crear la etiqueta]("../capturasEj3/etiquetaNoCreada.png")
![antesde crear el release]("../capturasEj3/releaseNoCreado.png")

### Después:
![después de crear la etiquea]("../capturasEj3/etiquetaCreada.png")
![después de crear el release]("../capturasEj3/releaseCreado.png")s