### Reto Tecnico - Backend Developer


- [x] Primer paso fue descargar los datos (archivo CPdescarga.txt) desde el servicio público recomendado, 
en este caso se tomo el archico txt para la lectura del mismo, se creo consecutivo a esto commando de consola para procesarlo 
con `SplFileObject`(una interfaz orientada a objetos para tratar el archivo).
- [x] Este archivo se proceso de manera tal que se tomaron las mismas columnas que se encuentran en el txt, 
y se creo un tabla mediante una migracion con ellas, para asi poder insertar sin crear un array de datos y/o columnas customizadas.
- [x] En la migración o tabla creada, se tomo/asigno la columna del codigo como índice, 
estos en las tablas ayudan a indexar el contenido de diversas columnas para facilitar/mejorar la búsquedas de contenido de cuando se ejecutan.
- [x] Para la exposicion de los datos se creo un resource `ZipCodeCollection` que contiene una colección de datos con la estructura solicitada. 

