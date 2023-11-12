# Historial Api

_Consumiendo esta api lo que se podra ver de la tabla historial los campos id, fecha_de_prestado, fecha_devuelto, id_item y a su vez podemos ver la tabla items los campos id_item, tipo_item, numero_item, en_uso, condicion, img, id_alumno_

## Endpoints

* localhost/tpe_web2/tpe-parte3/api/historial/ (GET)
* localhost/tpe_web2/tpe-parte3/api/historial/:ID (GET ID)
* localhost/tpe_web2/tpe-parte3/api/historial/ (POST)
* localhost/tpe_web2/tpe-parte3/api/historial/:ID (PUT)

## Servicios GET

### GET ALL
_Para poder acceder a todos los registros de la BBDD utilizamos el metodo GET_
```
localhost/tpe_web2/tpe-parte3/api/historial/
```
### GET BY ID
_Para poder acceder a un registro de la BBDD por ID tambien utilizamos el metodos GET_

* localhost/tpe_web2/tpe-parte3/api/historial/:ID
```
localhost/tpe_web2/tpe-parte3/api/historial/1
```

### SORT & ORDER
_utilizando las query params SORT & ORDER podemos establecer un orden ascendente 'ac' o descendente 'desc' a una clasificacion ingresada en 'sort'_
SORT:
* id (int 11)
* fecha_de_prestado (datetime)
* fecha_devuelto (datetime)
* id_item (int 11)
ORDER:
* asc
* desc
```
localhost/tpe_web2/tpe-parte3/api/historial?sort=id&order=asc
localhost/tpe_web2/tpe-parte3/api/historials?sort=id&order=desc
```

## Servicio POST (leer autorizacion)
_Para insertar un registro en la BBDD necesitamos poner nuestro endpoint con el metodo POST (localhost/tpe_web2/tpe-parte3/api/historial/)_
``` 
{
    "fecha_de_prestado": "2023-11-01 07:31:00",---->(datetime)
    "fecha_devuelto": "2023-11-01 19:00:00",------->(datetime)
    "id_item": 4,---------------------------------->(int 11)
}
```

## Servicio PUT (leer autorizacion)
_Para editar un registro en la BBDD necesitamos poner nuestro endpoint con el metodo PUT y saber el ID que vamos a editar (localhost/tpe_web2/tpe-parte3/api/historial/:ID)_
  ```
localhost/tpe_web2/tpe-parte3/api/historial/1
  ```  
_y luego debemos completar el siguiente json:_
```   
{
    "fecha_de_prestado": "2023-11-01 07:31:00",---->(datetime)
    "fecha_devuelto": "2023-11-01 19:00:00",------->(datetime)
    "id_item": 4,---------------------------------->(int 11)
}