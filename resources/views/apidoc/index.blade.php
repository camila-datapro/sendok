<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="./img/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="./img/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Bienvenido/a a la documentación interna de Sendok.</p>
<!-- END_INFO -->
<h1>AdminClienteController</h1>
<!-- START_0cbaa4ebe38ea695e7a08d88a013d4f8 -->
<h2>index</h2>
<p>Carga vista de administrador de cliente con precarga de consulta a base de datos de clientes , regiones y provincias</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin_cliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET admin_cliente</code></p>
<!-- END_0cbaa4ebe38ea695e7a08d88a013d4f8 -->
<h1>AdminDocumentoController</h1>
<!-- START_a36e1a582495f0a6a3f33eb5196d2fdd -->
<h2>index</h2>
<p>Carga vista de administrador de documento con precarga de consulta a base de datos de clientes , propuestas y productos</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin_documentos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET admin_documentos</code></p>
<!-- END_a36e1a582495f0a6a3f33eb5196d2fdd -->
<h1>AdminProductoController</h1>
<!-- START_1a257262a65d1c19322a4424d5785fc4 -->
<h2>index</h2>
<p>Carga vista de administrador de documento con precarga de consulta a base de datos de productos</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin_producto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET admin_producto</code></p>
<!-- END_1a257262a65d1c19322a4424d5785fc4 -->
<h1>AdminUsuario</h1>
<!-- START_40675f9760cd57fa04c934f03d1a2072 -->
<h2>index</h2>
<p>Carga vista de administrador de usuarios con precarga de consulta a base de datos de plantillas de correo electronico</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin_usuario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET admin_usuario</code></p>
<!-- END_40675f9760cd57fa04c934f03d1a2072 -->
<!-- START_02c5011d04c06484cb773b9345a878de -->
<h2>editarUsuario</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/editarUsuario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST editarUsuario</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>array</code></td>
<td>Request</td>
<td>optional</td>
<td>datos recibidos por post en formulario de administrador de usuarios, se envia por parámetro el id del usuario para que la función en el modelo pueda identificar a que usuario actualizar.</td>
</tr>
</tbody>
</table>
<!-- END_02c5011d04c06484cb773b9345a878de -->
<!-- START_7d8f68d0f2287174ee7547ade681eca6 -->
<h2>crearPlantilla</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/crearPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST crearPlantilla</code></p>
<!-- END_7d8f68d0f2287174ee7547ade681eca6 -->
<!-- START_a26b177b9ecaa172955a39c1b424e04c -->
<h2>editarPlantilla</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/editarPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST editarPlantilla</code></p>
<!-- END_a26b177b9ecaa172955a39c1b424e04c -->
<!-- START_766abc9c6bfa0bc3edb5fa0db43b8671 -->
<h2>eliminarPlantilla</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/eliminarPlantilla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST eliminarPlantilla</code></p>
<!-- END_766abc9c6bfa0bc3edb5fa0db43b8671 -->
<!-- START_71657f24b72f6edb9eb453f3e7b87c64 -->
<h2>guardarHTML</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/guardarHTML" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST guardarHTML</code></p>
<!-- END_71657f24b72f6edb9eb453f3e7b87c64 -->
<!-- START_94d29c8dbd73bcb5cf48c44658ac7cac -->
<h2>obtenerHTML</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/obtenerHTML" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST obtenerHTML</code></p>
<!-- END_94d29c8dbd73bcb5cf48c44658ac7cac -->
<h1>ClienteController</h1>
<!-- START_e805c275840cde2fcd30613645581cd2 -->
<h2>index</h2>
<p>Carga vista de creacion de cliente con precarga de consulta a base de datos de regiones, provincias y comunas.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/cliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET cliente</code></p>
<!-- END_e805c275840cde2fcd30613645581cd2 -->
<!-- START_e0c300a19f3a19a38f4995e9920d7063 -->
<h2>setCliente</h2>
<p>Permite crear un nuevo cliente en base de datos</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/crearCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST crearCliente</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>datos de cliente obtenidos por formulario de creacion de cliente.</td>
</tr>
</tbody>
</table>
<!-- END_e0c300a19f3a19a38f4995e9920d7063 -->
<!-- START_0115f659fefd81692daeff20407dd133 -->
<h2>editarCliente</h2>
<p>Permite editar un cliente por medio de los datos ingresados en administrador de clientes.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/editarCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST editarCliente</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>datos de cliente.</td>
</tr>
</tbody>
</table>
<!-- END_0115f659fefd81692daeff20407dd133 -->
<!-- START_7cf0fd5d03fdd24b6010cbdeb5d9d4c4 -->
<h2>removeCliente</h2>
<p>Permite eliminar un cliente a partir de su identificador unico</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/eliminarCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST eliminarCliente</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>identificador de cliente</td>
</tr>
</tbody>
</table>
<!-- END_7cf0fd5d03fdd24b6010cbdeb5d9d4c4 -->
<!-- START_0b07a81f082a4ccdda4d8e005398e39b -->
<h2>getCliente</h2>
<p>Permite obtener los datos de un cliente a partir de su identificador unico</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/getCliente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST getCliente</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>id de cliente</td>
</tr>
</tbody>
</table>
<!-- END_0b07a81f082a4ccdda4d8e005398e39b -->
<h1>ComunaController</h1>
<!-- START_f61bc85edf58d13839c95f863ff64c50 -->
<h2>getComunas</h2>
<p>Permite obtener todas las columnas asociadas a un identificador de provincia</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/obtenerComunas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST obtenerComunas</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>identificador de provincia</td>
</tr>
</tbody>
</table>
<!-- END_f61bc85edf58d13839c95f863ff64c50 -->
<h1>ConfirmsPasswords</h1>
<!-- START_b77aedc454e9471a35dcb175278ec997 -->
<h2>showConfirmForm</h2>
<p>Display the password confirmation view.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/confirm</code></p>
<!-- END_b77aedc454e9471a35dcb175278ec997 -->
<!-- START_54462d3613f2262e741142161c0e6fea -->
<h2>confirm</h2>
<p>Confirm the given user&#039;s password.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/confirm</code></p>
<!-- END_54462d3613f2262e741142161c0e6fea -->
<h1>DocumentoController</h1>
<!-- START_381d4f6ddd96071509d7d1e22b758ac1 -->
<h2>index</h2>
<p>Carga vista de creacion de documento con precarga de consulta a base de datos de clientes, productos , regiones y plantillas</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/documento" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET documento</code></p>
<!-- END_381d4f6ddd96071509d7d1e22b758ac1 -->
<!-- START_f89b819b76a842ee583159e02bb0a9cd -->
<h2>enviarPropuesta</h2>
<p>Permite enviar un email al cliente con la propuesta creada, además de adjuntar los documentos asociados al proceso.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/enviarPropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST enviarPropuesta</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>datos de destinatario, nombre documento, contenido, folletos y asunto</td>
</tr>
</tbody>
</table>
<!-- END_f89b819b76a842ee583159e02bb0a9cd -->
<!-- START_58e57b8c050c50ac05a3f7b071b02a23 -->
<h2>guardarPDF</h2>
<p>Permite guardar el documento PDF de la creacion de propuesta en la carpeta .</p>
<p>./public/documentos/</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/guardarPDF" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST guardarPDF</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>con nombre único de documento</td>
</tr>
</tbody>
</table>
<!-- END_58e57b8c050c50ac05a3f7b071b02a23 -->
<!-- START_659598f7b4363c9da1860f8c23b7465b -->
<h2>guardarPDF</h2>
<p>Permite guardar el documento PDF de la ficha tecnica de un producto en la carpeta .</p>
<p>./public/productos/</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/guardarPDFProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST guardarPDFProducto</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>con nombre único de ficha tecnica</td>
</tr>
</tbody>
</table>
<!-- END_659598f7b4363c9da1860f8c23b7465b -->
<h1>HomeController</h1>
<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
<h2>index</h2>
<p>Show the application dashboard.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET home</code></p>
<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->
<h1>IngresoMasivoController</h1>
<!-- START_c622e38ed4b796d6c784c0c36ab5a778 -->
<h2>index</h2>
<p>Carga vista de creacion de ingreso masivo de productos</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/ingreso_masivo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET ingreso_masivo</code></p>
<!-- END_c622e38ed4b796d6c784c0c36ab5a778 -->
<h1>ProductoController</h1>
<!-- START_eabe21f3e41e5879be978bd5046bc0e5 -->
<h2>index</h2>
<p>Carga vista de creacion de producto</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/producto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET producto</code></p>
<!-- END_eabe21f3e41e5879be978bd5046bc0e5 -->
<!-- START_b9d221f4ee1bb64a71f0fba993478d14 -->
<h2>setProducto</h2>
<p>Permite crear un nuevo producto en base de datos, primero le da formato a un json de entrada y posteriormente llama a la funcion del Modelo.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/crearProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST crearProducto</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>datos de producto obtenidos por formulario.</td>
</tr>
</tbody>
</table>
<!-- END_b9d221f4ee1bb64a71f0fba993478d14 -->
<!-- START_68ee74084d3b010ededfda3aea0885eb -->
<h2>editarProducto</h2>
<p>Permite editar los datos de un producto, mediante la obtencion del identificador unico.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/editarProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST editarProducto</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>array</code></td>
<td>array</td>
<td>optional</td>
<td>Array con datos de producto a actualizar</td>
</tr>
</tbody>
</table>
<!-- END_68ee74084d3b010ededfda3aea0885eb -->
<!-- START_f8ce42b3254e973f428ac5fc40027d88 -->
<h2>removeProducto</h2>
<p>Permite eliminar un producto mediante su identificador unico</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/eliminarProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST eliminarProducto</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>con identificador unico de producto</td>
</tr>
</tbody>
</table>
<!-- END_f8ce42b3254e973f428ac5fc40027d88 -->
<!-- START_2e8cace9a39f1e31fbf819fef5674587 -->
<h2>getProducto</h2>
<p>Permite obtener los datos de un producto mediante su identificador unico</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/getProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST getProducto</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>con identificador unico de producto</td>
</tr>
</tbody>
</table>
<!-- END_2e8cace9a39f1e31fbf819fef5674587 -->
<!-- START_bdee4558f98b0f289dba8d92694b6416 -->
<h2>listProductos</h2>
<p>Permite obtener el listado de todos los productos existentes en base de datos</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/listProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST listProductos</code></p>
<!-- END_bdee4558f98b0f289dba8d92694b6416 -->
<!-- START_6abc569cfb20549ae98f634ac5ed5a64 -->
<h2>listProductos</h2>
<p>Permite obtener el listado de todos los productos existentes en base de datos, mediante el ingreso de filtros</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/filtrarProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"array":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST filtrarProductos</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>array</code></td>
<td>array</td>
<td>optional</td>
<td>Array que contiene filtros ingresados por el usuario.</td>
</tr>
</tbody>
</table>
<!-- END_6abc569cfb20549ae98f634ac5ed5a64 -->
<!-- START_320173bc53a76ba52a95da2df3878924 -->
<h2>listProductosOptimized</h2>
<p>Funcion creada para pruebas:: permite obtener listado de todos los productos pero a través de JSON, lo que hace mas eficiente su carga.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/listProductosOptimized" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST listProductosOptimized</code></p>
<!-- END_320173bc53a76ba52a95da2df3878924 -->
<!-- START_31548ef293cfeb9652b9b8f6947c2e97 -->
<h2>insertarProductos</h2>
<p>Permite crear masivamente un listado de productos previamente formateados en excel a través del ingreso masivo</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/insertarProductos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"request":[]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST insertarProductos</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>request</code></td>
<td>array</td>
<td>optional</td>
<td>datos de productos obtenidos por formulario.</td>
</tr>
</tbody>
</table>
<!-- END_31548ef293cfeb9652b9b8f6947c2e97 -->
<h1>general</h1>
<!-- START_66e08d3cc8222573018fed49e121e96d -->
<h2>showLoginForm</h2>
<p>Show the application&#039;s login form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET login</code></p>
<!-- END_66e08d3cc8222573018fed49e121e96d -->
<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
<h2>login</h2>
<p>Handle a login request to the application.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST login</code></p>
<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->
<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
<h2>logout</h2>
<p>Log the user out of the application.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST logout</code></p>
<!-- END_e65925f23b9bc6b93d9356895f29f80c -->
<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
<h2>showRegistrationForm</h2>
<p>Show the application registration form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET register</code></p>
<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
<!-- START_d7aad7b5ac127700500280d511a3db01 -->
<h2>register</h2>
<p>Handle a registration request for the application.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST register</code></p>
<!-- END_d7aad7b5ac127700500280d511a3db01 -->
<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
<h2>showLinkRequestForm</h2>
<p>Display the form to request a password reset link.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset</code></p>
<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->
<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
<h2>sendResetLinkEmail</h2>
<p>Send a reset link to the given user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/email</code></p>
<!-- END_feb40f06a93c80d742181b6ffb6b734e -->
<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
<h2>showResetForm</h2>
<p>Display the password reset view for the given token.</p>
<p>If no token is present, display the link request form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset/{token}</code></p>
<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->
<!-- START_cafb407b7a846b31491f97719bb15aef -->
<h2>reset</h2>
<p>Reset the given user&#039;s password.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/reset</code></p>
<!-- END_cafb407b7a846b31491f97719bb15aef -->
<!-- START_f4bd8405349785155398b8293c772f60 -->
<h2>documentacion</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/documentacion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET documentacion</code></p>
<!-- END_f4bd8405349785155398b8293c772f60 -->
<!-- START_2a1827e1a539118fe47bc2a78b290066 -->
<h2>obtenerRegiones</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/obtenerRegiones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET obtenerRegiones</code></p>
<!-- END_2a1827e1a539118fe47bc2a78b290066 -->
<!-- START_4960fd3cb6742ec54c3f6893e530bb16 -->
<h2>obtenerProvincias</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/obtenerProvincias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST obtenerProvincias</code></p>
<!-- END_4960fd3cb6742ec54c3f6893e530bb16 -->
<!-- START_9331f6916f3f6b6009bc2e4c2e6c539c -->
<h2>obtenerTiposDeProducto</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/obtenerTiposDeProducto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET obtenerTiposDeProducto</code></p>
<!-- END_9331f6916f3f6b6009bc2e4c2e6c539c -->
<!-- START_583653251be9f44a6ae2f267bd3deb49 -->
<h2>setPropuesta</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/setPropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST setPropuesta</code></p>
<!-- END_583653251be9f44a6ae2f267bd3deb49 -->
<!-- START_cf1788bbae98f963dc9fb31c18b9c1e1 -->
<h2>updatePropuesta</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/updatePropuesta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST updatePropuesta</code></p>
<!-- END_cf1788bbae98f963dc9fb31c18b9c1e1 -->
<!-- START_f55a6358b03b78db39fe7e4d0e7c7e5d -->
<h2>setEstadoEnviado</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/setEstadoEnviado" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST setEstadoEnviado</code></p>
<!-- END_f55a6358b03b78db39fe7e4d0e7c7e5d -->
<!-- START_3143b93222f97a8def7af2af22c1a4f6 -->
<h2>propuestaLastId</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/propuestaLastId" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST propuestaLastId</code></p>
<!-- END_3143b93222f97a8def7af2af22c1a4f6 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>