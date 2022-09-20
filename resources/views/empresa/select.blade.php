<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Token select triple-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>
        <!-- Carga el primer registro de la tabla categoria -->
        <select name="" id="_pais">
            @foreach ($paises as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
        <!-- Se llenan dinamicamente mediante la Api Fetch DE js-->
        <select name="" id="_departamento"></select>
        <select name="" id="_municipio"></select>
    </div>
<script>
    //Se necesita el token
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    //Detectar el cambio el select en categoria.
    document.getElementById('_pais').addEventListener('change',(e)=>{
        fetch('departamentos',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
            }
            document.getElementById("_departamento").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

    document.getElementById('_departamento').addEventListener('change',(e)=>{
        fetch('municipios',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
            }
            document.getElementById("_municipio").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

</script>   
</body>
</html>