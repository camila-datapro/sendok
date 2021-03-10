---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Bienvenido/a a la documentación interna de Sendok.


<!-- END_INFO -->

#AdminClienteController


<!-- START_0cbaa4ebe38ea695e7a08d88a013d4f8 -->
## index
Carga vista de administrador de cliente con precarga de consulta a base de datos de clientes , regiones y provincias

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin_cliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin_cliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin_cliente`


<!-- END_0cbaa4ebe38ea695e7a08d88a013d4f8 -->

#AdminDocumentoController


<!-- START_a36e1a582495f0a6a3f33eb5196d2fdd -->
## index
Carga vista de administrador de documento con precarga de consulta a base de datos de clientes , propuestas y productos

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin_documentos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin_documentos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin_documentos`


<!-- END_a36e1a582495f0a6a3f33eb5196d2fdd -->

#AdminProductoController


<!-- START_1a257262a65d1c19322a4424d5785fc4 -->
## index
Carga vista de administrador de documento con precarga de consulta a base de datos de productos

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin_producto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin_producto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin_producto`


<!-- END_1a257262a65d1c19322a4424d5785fc4 -->

#AdminUsuario


<!-- START_40675f9760cd57fa04c934f03d1a2072 -->
## index
Carga vista de administrador de usuarios con precarga de consulta a base de datos de plantillas de correo electronico

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin_usuario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin_usuario"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin_usuario`


<!-- END_40675f9760cd57fa04c934f03d1a2072 -->

<!-- START_02c5011d04c06484cb773b9345a878de -->
## editarUsuario

> Example request:

```bash
curl -X POST \
    "http://localhost/editarUsuario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/editarUsuario"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "array": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST editarUsuario`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `array` | Request |  optional  | datos recibidos por post en formulario de administrador de usuarios, se envia por parámetro el id del usuario para que la función en el modelo pueda identificar a que usuario actualizar.
    
<!-- END_02c5011d04c06484cb773b9345a878de -->

<!-- START_7d8f68d0f2287174ee7547ade681eca6 -->
## crearPlantilla

> Example request:

```bash
curl -X POST \
    "http://localhost/crearPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/crearPlantilla"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST crearPlantilla`


<!-- END_7d8f68d0f2287174ee7547ade681eca6 -->

<!-- START_a26b177b9ecaa172955a39c1b424e04c -->
## editarPlantilla

> Example request:

```bash
curl -X POST \
    "http://localhost/editarPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/editarPlantilla"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST editarPlantilla`


<!-- END_a26b177b9ecaa172955a39c1b424e04c -->

<!-- START_766abc9c6bfa0bc3edb5fa0db43b8671 -->
## eliminarPlantilla

> Example request:

```bash
curl -X POST \
    "http://localhost/eliminarPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/eliminarPlantilla"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST eliminarPlantilla`


<!-- END_766abc9c6bfa0bc3edb5fa0db43b8671 -->

<!-- START_71657f24b72f6edb9eb453f3e7b87c64 -->
## guardarHTML

> Example request:

```bash
curl -X POST \
    "http://localhost/guardarHTML" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/guardarHTML"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST guardarHTML`


<!-- END_71657f24b72f6edb9eb453f3e7b87c64 -->

<!-- START_94d29c8dbd73bcb5cf48c44658ac7cac -->
## obtenerHTML

> Example request:

```bash
curl -X POST \
    "http://localhost/obtenerHTML" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/obtenerHTML"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST obtenerHTML`


<!-- END_94d29c8dbd73bcb5cf48c44658ac7cac -->

#ClienteController


<!-- START_e805c275840cde2fcd30613645581cd2 -->
## index
Carga vista de creacion de cliente con precarga de consulta a base de datos de regiones, provincias y comunas.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/cliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/cliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET cliente`


<!-- END_e805c275840cde2fcd30613645581cd2 -->

<!-- START_e0c300a19f3a19a38f4995e9920d7063 -->
## setCliente
Permite crear un nuevo cliente en base de datos

> Example request:

```bash
curl -X POST \
    "http://localhost/crearCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/crearCliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST crearCliente`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | datos de cliente obtenidos por formulario de creacion de cliente.
    
<!-- END_e0c300a19f3a19a38f4995e9920d7063 -->

<!-- START_0115f659fefd81692daeff20407dd133 -->
## editarCliente
Permite editar un cliente por medio de los datos ingresados en administrador de clientes.

> Example request:

```bash
curl -X POST \
    "http://localhost/editarCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/editarCliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST editarCliente`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | datos de cliente.
    
<!-- END_0115f659fefd81692daeff20407dd133 -->

<!-- START_7cf0fd5d03fdd24b6010cbdeb5d9d4c4 -->
## removeCliente
Permite eliminar un cliente a partir de su identificador unico

> Example request:

```bash
curl -X POST \
    "http://localhost/eliminarCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/eliminarCliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST eliminarCliente`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | identificador de cliente
    
<!-- END_7cf0fd5d03fdd24b6010cbdeb5d9d4c4 -->

<!-- START_0b07a81f082a4ccdda4d8e005398e39b -->
## getCliente
Permite obtener los datos de un cliente a partir de su identificador unico

> Example request:

```bash
curl -X POST \
    "http://localhost/getCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/getCliente"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST getCliente`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | id de cliente
    
<!-- END_0b07a81f082a4ccdda4d8e005398e39b -->

#ComunaController


<!-- START_f61bc85edf58d13839c95f863ff64c50 -->
## getComunas
Permite obtener todas las columnas asociadas a un identificador de provincia

> Example request:

```bash
curl -X POST \
    "http://localhost/obtenerComunas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/obtenerComunas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST obtenerComunas`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | identificador de provincia
    
<!-- END_f61bc85edf58d13839c95f863ff64c50 -->

#ConfirmsPasswords


<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## showConfirmForm
Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## confirm
Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

#DocumentoController


<!-- START_381d4f6ddd96071509d7d1e22b758ac1 -->
## index
Carga vista de creacion de documento con precarga de consulta a base de datos de clientes, productos , regiones y plantillas

> Example request:

```bash
curl -X GET \
    -G "http://localhost/documento" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/documento"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET documento`


<!-- END_381d4f6ddd96071509d7d1e22b758ac1 -->

<!-- START_f89b819b76a842ee583159e02bb0a9cd -->
## enviarPropuesta
Permite enviar un email al cliente con la propuesta creada, además de adjuntar los documentos asociados al proceso.

> Example request:

```bash
curl -X POST \
    "http://localhost/enviarPropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/enviarPropuesta"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST enviarPropuesta`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | datos de destinatario, nombre documento, contenido, folletos y asunto
    
<!-- END_f89b819b76a842ee583159e02bb0a9cd -->

<!-- START_58e57b8c050c50ac05a3f7b071b02a23 -->
## guardarPDF
Permite guardar el documento PDF de la creacion de propuesta en la carpeta .

./public/documentos/

> Example request:

```bash
curl -X POST \
    "http://localhost/guardarPDF" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/guardarPDF"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST guardarPDF`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | con nombre único de documento
    
<!-- END_58e57b8c050c50ac05a3f7b071b02a23 -->

<!-- START_659598f7b4363c9da1860f8c23b7465b -->
## guardarPDF
Permite guardar el documento PDF de la ficha tecnica de un producto en la carpeta .

./public/productos/

> Example request:

```bash
curl -X POST \
    "http://localhost/guardarPDFProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/guardarPDFProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST guardarPDFProducto`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | con nombre único de ficha tecnica
    
<!-- END_659598f7b4363c9da1860f8c23b7465b -->

#HomeController


<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## index
Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

#IngresoMasivoController


<!-- START_c622e38ed4b796d6c784c0c36ab5a778 -->
## index
Carga vista de creacion de ingreso masivo de productos

> Example request:

```bash
curl -X GET \
    -G "http://localhost/ingreso_masivo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ingreso_masivo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ingreso_masivo`


<!-- END_c622e38ed4b796d6c784c0c36ab5a778 -->

#ProductoController


<!-- START_eabe21f3e41e5879be978bd5046bc0e5 -->
## index
Carga vista de creacion de producto

> Example request:

```bash
curl -X GET \
    -G "http://localhost/producto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/producto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET producto`


<!-- END_eabe21f3e41e5879be978bd5046bc0e5 -->

<!-- START_b9d221f4ee1bb64a71f0fba993478d14 -->
## setProducto
Permite crear un nuevo producto en base de datos, primero le da formato a un json de entrada y posteriormente llama a la funcion del Modelo.

> Example request:

```bash
curl -X POST \
    "http://localhost/crearProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/crearProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST crearProducto`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | datos de producto obtenidos por formulario.
    
<!-- END_b9d221f4ee1bb64a71f0fba993478d14 -->

<!-- START_68ee74084d3b010ededfda3aea0885eb -->
## editarProducto
Permite editar los datos de un producto, mediante la obtencion del identificador unico.

> Example request:

```bash
curl -X POST \
    "http://localhost/editarProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":[]}'

```

```javascript
const url = new URL(
    "http://localhost/editarProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "array": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST editarProducto`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `array` | array |  optional  | Array con datos de producto a actualizar
    
<!-- END_68ee74084d3b010ededfda3aea0885eb -->

<!-- START_f8ce42b3254e973f428ac5fc40027d88 -->
## removeProducto
Permite eliminar un producto mediante su identificador unico

> Example request:

```bash
curl -X POST \
    "http://localhost/eliminarProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/eliminarProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST eliminarProducto`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | con identificador unico de producto
    
<!-- END_f8ce42b3254e973f428ac5fc40027d88 -->

<!-- START_2e8cace9a39f1e31fbf819fef5674587 -->
## getProducto
Permite obtener los datos de un producto mediante su identificador unico

> Example request:

```bash
curl -X POST \
    "http://localhost/getProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/getProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST getProducto`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | con identificador unico de producto
    
<!-- END_2e8cace9a39f1e31fbf819fef5674587 -->

<!-- START_bdee4558f98b0f289dba8d92694b6416 -->
## listProductos
Permite obtener el listado de todos los productos existentes en base de datos

> Example request:

```bash
curl -X POST \
    "http://localhost/listProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/listProductos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST listProductos`


<!-- END_bdee4558f98b0f289dba8d92694b6416 -->

<!-- START_6abc569cfb20549ae98f634ac5ed5a64 -->
## listProductos
Permite obtener el listado de todos los productos existentes en base de datos, mediante el ingreso de filtros

> Example request:

```bash
curl -X POST \
    "http://localhost/filtrarProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":[]}'

```

```javascript
const url = new URL(
    "http://localhost/filtrarProductos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "array": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST filtrarProductos`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `array` | array |  optional  | Array que contiene filtros ingresados por el usuario.
    
<!-- END_6abc569cfb20549ae98f634ac5ed5a64 -->

<!-- START_320173bc53a76ba52a95da2df3878924 -->
## listProductosOptimized
Funcion creada para pruebas:: permite obtener listado de todos los productos pero a través de JSON, lo que hace mas eficiente su carga.

> Example request:

```bash
curl -X POST \
    "http://localhost/listProductosOptimized" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/listProductosOptimized"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST listProductosOptimized`


<!-- END_320173bc53a76ba52a95da2df3878924 -->

<!-- START_31548ef293cfeb9652b9b8f6947c2e97 -->
## insertarProductos
Permite crear masivamente un listado de productos previamente formateados en excel a través del ingreso masivo

> Example request:

```bash
curl -X POST \
    "http://localhost/insertarProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'

```

```javascript
const url = new URL(
    "http://localhost/insertarProductos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "request": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST insertarProductos`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `request` | array |  optional  | datos de productos obtenidos por formulario.
    
<!-- END_31548ef293cfeb9652b9b8f6947c2e97 -->

#general


<!-- START_66e08d3cc8222573018fed49e121e96d -->
## showLoginForm
Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## login
Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## logout
Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## showRegistrationForm
Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## register
Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## showLinkRequestForm
Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## sendResetLinkEmail
Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## showResetForm
Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## reset
Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_f4bd8405349785155398b8293c772f60 -->
## documentacion
> Example request:

```bash
curl -X GET \
    -G "http://localhost/documentacion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/documentacion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET documentacion`


<!-- END_f4bd8405349785155398b8293c772f60 -->

<!-- START_2a1827e1a539118fe47bc2a78b290066 -->
## obtenerRegiones
> Example request:

```bash
curl -X GET \
    -G "http://localhost/obtenerRegiones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/obtenerRegiones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET obtenerRegiones`


<!-- END_2a1827e1a539118fe47bc2a78b290066 -->

<!-- START_4960fd3cb6742ec54c3f6893e530bb16 -->
## obtenerProvincias
> Example request:

```bash
curl -X POST \
    "http://localhost/obtenerProvincias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/obtenerProvincias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST obtenerProvincias`


<!-- END_4960fd3cb6742ec54c3f6893e530bb16 -->

<!-- START_9331f6916f3f6b6009bc2e4c2e6c539c -->
## obtenerTiposDeProducto
> Example request:

```bash
curl -X GET \
    -G "http://localhost/obtenerTiposDeProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/obtenerTiposDeProducto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET obtenerTiposDeProducto`


<!-- END_9331f6916f3f6b6009bc2e4c2e6c539c -->

<!-- START_583653251be9f44a6ae2f267bd3deb49 -->
## setPropuesta
> Example request:

```bash
curl -X POST \
    "http://localhost/setPropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/setPropuesta"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST setPropuesta`


<!-- END_583653251be9f44a6ae2f267bd3deb49 -->

<!-- START_cf1788bbae98f963dc9fb31c18b9c1e1 -->
## updatePropuesta
> Example request:

```bash
curl -X POST \
    "http://localhost/updatePropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/updatePropuesta"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST updatePropuesta`


<!-- END_cf1788bbae98f963dc9fb31c18b9c1e1 -->

<!-- START_f55a6358b03b78db39fe7e4d0e7c7e5d -->
## setEstadoEnviado
> Example request:

```bash
curl -X POST \
    "http://localhost/setEstadoEnviado" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/setEstadoEnviado"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST setEstadoEnviado`


<!-- END_f55a6358b03b78db39fe7e4d0e7c7e5d -->

<!-- START_3143b93222f97a8def7af2af22c1a4f6 -->
## propuestaLastId
> Example request:

```bash
curl -X POST \
    "http://localhost/propuestaLastId" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/propuestaLastId"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST propuestaLastId`


<!-- END_3143b93222f97a8def7af2af22c1a4f6 -->


