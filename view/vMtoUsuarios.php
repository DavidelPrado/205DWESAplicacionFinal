<header>
    <h1>Aplicación final</h1>
    <h3>Mantenimiento usuarios</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<form method="post">
    <fieldset>
        <fieldset>
            <label>Descripción:</label>
            <input  type='text' name='descripcion' id='desc'/>
            
            <input type='button' value='Buscar' id="buscar"/>
        </fieldset>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Contraseña</th>
                    <th>Descripción</th>
                    <th>Número de conexiones</th>
                    <th>Fecha y hora última conexión</th>
                    <th>Perfil</th>
                </tr> 
            </thead>
            <tbody id="usuarios">
                
            </tbody>
        </table>
        
        <script>
            var boton=document.getElementById("buscar");
            loadJSONDoc();
            boton.addEventListener("click", function(){loadJSONDoc();});
            
            function loadJSONDoc(){
                var descripcion=document.getElementById("desc").value;
               
                var xhttp=new XMLHttpRequest();
                
                xhttp.onload=function(){
                    if(this.readyState==4 && this.status==200){
                        var objetoJSON=JSON.parse(xhttp.responseText);
                        var tabla=document.getElementById("usuarios");
                        tabla.innerHTML="";
                        for(var i=0;i<objetoJSON.usuarios.length;i++){
                            var codigo=objetoJSON.usuarios[i].codUsuario;
                            var contrasena=objetoJSON.usuarios[i].password;
                            var descripcion=objetoJSON.usuarios[i].descUsuario;
                            var ultimaConexion=objetoJSON.usuarios[i].fechaHoraUltimaConexion;
                            var conexiones=objetoJSON.usuarios[i].numConexiones;
                            var perfil=objetoJSON.usuarios[i].perfil;
                            
                            
                            var linea=document.createElement("tr");
                            var tdCodigo=document.createElement("td");
                            var tdContrasena=document.createElement("td");
                            var tdDescripcion=document.createElement("td");
                            var tdConexiones=document.createElement("td");
                            var tdUltimaConexion=document.createElement("td");
                            var tdPerfil=document.createElement("td");

                            tdCodigo.innerHTML=codigo;
                            tdContrasena.innerHTML=contrasena;
                            tdDescripcion.innerHTML=descripcion;
                            tdConexiones.innerHTML=conexiones;
                            tdUltimaConexion.innerHTML=ultimaConexion;
                            tdPerfil.innerHTML=perfil;

                            linea.appendChild(tdCodigo);
                            linea.appendChild(tdContrasena);
                            linea.appendChild(tdDescripcion);
                            linea.appendChild(tdConexiones);
                            linea.appendChild(tdUltimaConexion);
                            linea.appendChild(tdPerfil);

                            tabla.appendChild(linea);
                        }
                    }
                }
                //Desarrollo
                xhttp.open("GET", ("http://daw205.sauces.local/205DWESAplicacionFinal/api/BuscarUsuarioPorDescripcion.php?descUsuario="+descripcion) ,true);
                
                //Explotacion
                //xhttp.open("GET", ("http://daw205.ieslossauces.es/205DWESAplicacionFinal/api/BuscarUsuarioPorDescripcion.php?descUsuario="+descripcion) ,true);
                
                xhttp.send();
            }
        </script>
    </fieldset>
</form>