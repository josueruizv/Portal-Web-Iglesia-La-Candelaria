function oculta(id){
	if (id.value!=0){
		document.getElementById("otroministro").value='';
		document.getElementById("otroministro").style.display='none';
	}
	else{
		document.getElementById("otroministro").style.display='block';
		document.getElementById("otroministro").value='Otro...';
	}
}

function borracampo(){
	if(document.getElementById("otroministro").value == "Otro...")
   		document.getElementById("otroministro").value = "";
} 

function restauracampo(){
	if(document.getElementById("otroministro").value == "")
		document.getElementById("otroministro").value="Otro...";
}

function aparecer(id,opc){
	if (id.value=="LB")
	{	
		document.getElementById("otrolugar").style.display='none';
		document.getElementById("otrolugarbau").value="";
		document.getElementById("DatosPersonales").style.display='none';
		document.getElementById("BuscarPersona").style.display='block';
		document.getElementById("busquedaporced").style.display='none'
		document.getElementById("busquedapornom").style.display='none'
		document.getElementById("otrolugarbau").value='';
		document.getElementById("cedula").value='';
		document.getElementById("nombre").value='';
		document.getElementById("apellido").value='';
		document.getElementById("sex").checked = true;
		document.getElementById("fechanac").value='';
		if (opc.value==4)
		{
			document.getElementById("edad").value='';
			document.getElementById("lugarnac").value='';
			document.getElementById("estado").value='';
			document.getElementById("domicilio").value='';
		}
		document.getElementById("cedulapadre").value='';
		document.getElementById("cedulamadre").value='';
		document.getElementById("nombrepadre").value='';
		document.getElementById("nombremadre").value='';
		document.getElementById("apellidopadre").value='';
		document.getElementById("apellidomadre").value='';
		document.getElementById("filiacion").value='';

	}
	if (id.value=="O"){
		document.getElementById("otrolugar").style.display='block';
		document.getElementById("DatosPersonales").style.display='block';
		document.getElementById("BuscarPersona").style.display='none';

		document.getElementById("otrolugarbau").focus();	

		document.getElementById("tipobusqueda").value=0;
		document.getElementById("cedul").value='';

		document.getElementById("nombr").value='';
		document.getElementById("apelli").value='';
		document.getElementById("fenac").value='';

		document.getElementById("nuevocodigo").style.display='none';
		document.getElementById("nuevonombre").style.display='none';
		document.getElementById("nuevafechanac").style.display='none';
		document.getElementById("padre").style.display='none';
		document.getElementById("madre").style.display='none';
		document.getElementById("fili").style.display='none';
		
		document.getElementById("nuevo_codigo").value='';
		document.getElementById("nuevo_nombre").value='';
		document.getElementById("nuevo_apellido").value='';
		document.getElementById("nueva_fechanac").value='';
		document.getElementById("nuevo_padre").value='';
		document.getElementById("nueva_madre").value='';
		document.getElementById("nueva_filiacion").value='';

		document.getElementById("tabla").style.display='none';

		document.getElementById("cod").value='';
		document.getElementById("nueva_ced").value='';
		document.getElementById("nombre_nuevo").value='';
		document.getElementById("apellido_nuevo").value='';
		document.getElementById("fechanac_nueva").value='';
		document.getElementById("padre_nuevo").value='';
		document.getElementById("madre_nueva").value='';
		document.getElementById("filiacion_nueva").value='';

		document.getElementById("codigo").style.display='none';		
		document.getElementById("cedulanueva").style.display='none';
		document.getElementById("nombrenuevo").style.display='none';
		document.getElementById("fechanacnueva").style.display='none';
		document.getElementById("padrenuevo").style.display='none';
		document.getElementById("madrenueva").style.display='none';
		document.getElementById("filinueva").style.display='none';

		if (opc.value==4)
		{
			document.getElementById("edad_nueva").value='';
			document.getElementById("lugarnac_nuevo").value='';
			document.getElementById("estado_nuevo").value='';
			document.getElementById("domicilio_nuevo").value='';

			document.getElementById("edadnueva").style.display='none';
			document.getElementById("lugarnacnuevo").style.display='none';
			document.getElementById("domicilionuevo").style.display='none';

			document.getElementById("nuevaedad").style.display='none';
			document.getElementById("nuevolugarnac").style.display='none';
			document.getElementById("nuevodomicilio").style.display='none';

			document.getElementById("nueva_edad").value='';
			document.getElementById("nuevo_lugarnac").value='';
			document.getElementById("nuevo_estado").value='';
			document.getElementById("nuevo_domicilio").value='';
		}
	}
}

function tipo_busqueda(id,opc){
	if(id.value==0)
	{
		document.getElementById("busquedaporced").style.display='none';
		document.getElementById("busquedapornom").style.display='none';
		document.getElementById("cedul").value='';

		document.getElementById("nombr").value='';
		document.getElementById("apelli").value='';
		document.getElementById("fenac").value='';

		document.getElementById("cod").value='';
		document.getElementById("nueva_ced").value='';
		document.getElementById("codigo").style.display='none';
		document.getElementById("cedulanueva").style.display='none';

		document.getElementById("tabla").style.display='none';

		if(opc.value==4)
		{
			document.getElementById("edad_nueva").value='';
			document.getElementById("lugarnac_nuevo").value='';
			document.getElementById("estado_nuevo").value='';
			document.getElementById("domicilio_nuevo").value='';

			document.getElementById("edadnueva").style.display='none';
			document.getElementById("lugarnacnuevo").style.display='none';
			document.getElementById("domicilionuevo").style.display='none';

			document.getElementById("nueva_edad").value='';
			document.getElementById("nuevo_lugarnac").value='';
			document.getElementById("nuevo_estado").value='';
			document.getElementById("nuevo_domicilio").value='';

			document.getElementById("nuevaedad").style.display='none';
			document.getElementById("nuevolugarnac").style.display='none';
			document.getElementById("nuevodomicilio").style.display='none';
		}
		document.getElementById("cod").value='';
		document.getElementById("nueva_ced").value='';
		document.getElementById("nombre_nuevo").value='';
		document.getElementById("apellido_nuevo").value='';
		document.getElementById("fechanac_nueva").value='';
		document.getElementById("padre_nuevo").value='';
		document.getElementById("madre_nueva").value='';
		document.getElementById("filiacion_nueva").value='';

		document.getElementById("codigo").style.display='none';		
		document.getElementById("cedulanueva").style.display='none';
		document.getElementById("nombrenuevo").style.display='none';
		document.getElementById("fechanacnueva").style.display='none';
		document.getElementById("padrenuevo").style.display='none';
		document.getElementById("madrenueva").style.display='none';
		document.getElementById("filinueva").style.display='none';
		
		document.getElementById("nuevo_codigo").value='';
		document.getElementById("nuevo_nombre").value='';
		document.getElementById("nuevo_apellido").value='';
		document.getElementById("nueva_fechanac").value='';
		document.getElementById("nuevo_padre").value='';
		document.getElementById("nueva_madre").value='';
		document.getElementById("nueva_filiacion").value='';
		
		document.getElementById("nuevocodigo").style.display='none';
		document.getElementById("nuevonombre").style.display='none';
		document.getElementById("nuevafechanac").style.display='none';
		document.getElementById("padre").style.display='none';
		document.getElementById("madre").style.display='none';	
		document.getElementById("fili").style.display='none';		
	}
	if(id.value==1)
	{
		document.getElementById("busquedaporced").style.display='block';
		document.getElementById("busquedapornom").style.display='none';
		document.getElementById("nombr").value='';
		document.getElementById("apelli").value='';
		document.getElementById("fenac").value='';

		document.getElementById("cod").value='';
		document.getElementById("nueva_ced").value='';
		document.getElementById("codigo").style.display='none';
		document.getElementById("cedulanueva").style.display='none';

		document.getElementById("tabla").style.display='none';

		if(opc.value==4)
		{
			document.getElementById("edad_nueva").value='';
			document.getElementById("lugarnac_nuevo").value='';
			document.getElementById("estado_nuevo").value='';
			document.getElementById("domicilio_nuevo").value='';

			document.getElementById("edadnueva").style.display='none';
			document.getElementById("lugarnacnuevo").style.display='none';
			document.getElementById("domicilionuevo").style.display='none';
		}

		document.getElementById("cod").value='';
		document.getElementById("nueva_ced").value='';
		document.getElementById("nombre_nuevo").value='';
		document.getElementById("apellido_nuevo").value='';
		document.getElementById("fechanac_nueva").value='';
		document.getElementById("padre_nuevo").value='';
		document.getElementById("madre_nueva").value='';
		document.getElementById("filiacion_nueva").value='';

		document.getElementById("codigo").style.display='none';		
		document.getElementById("cedulanueva").style.display='none';
		document.getElementById("nombrenuevo").style.display='none';
		document.getElementById("fechanacnueva").style.display='none';	
		document.getElementById("padrenuevo").style.display='none';
		document.getElementById("madrenueva").style.display='none';
		document.getElementById("filinueva").style.display='none';
	}
	if(id.value==2)
	{
		document.getElementById("busquedaporced").style.display='none';
		document.getElementById("busquedapornom").style.display='block';
		document.getElementById("cedul").value='';
		if(opc.value==4)
		{
			document.getElementById("nueva_edad").value='';
			document.getElementById("nuevo_lugarnac").value='';
			document.getElementById("nuevo_estado").value='';
			document.getElementById("nuevo_domicilio").value='';

			document.getElementById("nuevaedad").style.display='none';
			document.getElementById("nuevolugarnac").style.display='none';
			document.getElementById("nuevodomicilio").style.display='none';
		}
		
		document.getElementById("nuevo_codigo").value='';
		document.getElementById("nuevo_nombre").value='';
		document.getElementById("nuevo_apellido").value='';
		document.getElementById("nueva_fechanac").value='';
		document.getElementById("nuevo_padre").value='';
		document.getElementById("nueva_madre").value='';
		document.getElementById("nueva_filiacion").value='';
		
		document.getElementById("nuevocodigo").style.display='none';
		document.getElementById("nuevonombre").style.display='none';
		document.getElementById("nuevafechanac").style.display='none';
		document.getElementById("padre").style.display='none';
		document.getElementById("madre").style.display='none';	
		document.getElementById("fili").style.display='none';				

		document.getElementById("tabla").style.display='block';
	}
}

cedul.onkeyup=function(){
	var botonBusqueda = document.getElementById('buscarporced');
	if(cedul.value !=""){
		botonBusqueda.disabled= false;
	}
	else{
		botonBusqueda.disabled=true;
	}
}

nombr.onkeyup=function(){
	verificarCampos();
}

apelli.onkeyup=function(){
	verificarCampos();
}

function verificarCampos() {
    var botonBuscar = document.getElementById('buscarpornom');
    
    if (nombr.value != "" && apelli.value != "") {
        botonBuscar.disabled = false;
    }
    else {
        botonBuscar.disabled = true;
    }
}

function mostrarInfo(n,a,f,opc)
{
	document.getElementById("codigo").style.display='none';		
	document.getElementById("cedulanueva").style.display='none';
	document.getElementById("nombrenuevo").style.display='none';
	document.getElementById("fechanacnueva").style.display='none';
	document.getElementById("padrenuevo").style.display='none';
	document.getElementById("madrenueva").style.display='none';
	document.getElementById("filinueva").style.display='none';
	if(opc.value==4)
	{
		document.getElementById("edadnueva").style.display='none';
		document.getElementById("lugarnacnuevo").style.display='none';
		document.getElementById("domicilionuevo").style.display='none';

		document.getElementById("edad_nueva").value='';
		document.getElementById("lugarnac_nuevo").value='';
		document.getElementById("estado_nuevo").value='';
		document.getElementById("domicilio_nuevo").value='';
	}
	document.getElementById("cod").value='';
	document.getElementById("nueva_ced").value='';
	document.getElementById("nombre_nuevo").value='';
	document.getElementById("apellido_nuevo").value='';
	document.getElementById("fechanac_nueva").value='';
	document.getElementById("padre_nuevo").value='';
	document.getElementById("madre_nueva").value='';
	document.getElementById("filiacion_nueva").value='';
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("datos").innerHTML=xmlhttp.responseText;
		}else{ 
		document.getElementById("datos").innerHTML='Cargando...';
		}
	}
	xmlhttp.open("POST","../php/consulta_nombyape.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send('nomb='+n+'&ape='+a+'&fechanac='+f+'&tipo='+0+'&op='+opc);
}

function llenar(i){

	document.getElementById("codigo").style.display='block';
	document.getElementById("cedulanueva").style.display='block';
	document.getElementById("nombrenuevo").style.display='block';
	document.getElementById("fechanacnueva").style.display='block';
	document.getElementById("padrenuevo").style.display='block';
	document.getElementById("madrenueva").style.display='block';
	document.getElementById("filinueva").style.display='block';


	var codigo = document.getElementById("codigoper"+i).innerHTML;
	var cedula = document.getElementById("cedulaper"+i).innerHTML;
	var nombre = document.getElementById("nombreper"+i).innerHTML;
	var apellido = document.getElementById("apellidoper"+i).innerHTML;
	var fechanac = document.getElementById("fechanacper"+i).innerHTML;
	var padre = document.getElementById("padreper"+i).innerHTML;
	var madre = document.getElementById("madreper"+i).innerHTML;
	var filiacion = document.getElementById("filiacionper"+i).innerHTML;

	document.getElementById("cod").value=codigo;
	document.getElementById("nueva_ced").value=cedula;
	document.getElementById("nombre_nuevo").value=nombre;
	document.getElementById("apellido_nuevo").value=apellido;
	document.getElementById("fechanac_nueva").value=fechanac;
	document.getElementById("padre_nuevo").value=padre;
	document.getElementById("madre_nueva").value=madre;
	document.getElementById("filiacion_nueva").value=filiacion;
}

function llenare(i){

	document.getElementById("codigo").style.display='block';
	document.getElementById("cedulanueva").style.display='block';
	document.getElementById("nombrenuevo").style.display='block';
	document.getElementById("fechanacnueva").style.display='block';
	document.getElementById("padrenuevo").style.display='block';
	document.getElementById("madrenueva").style.display='block';
	document.getElementById("filinueva").style.display='block';


	var codigo = document.getElementById("codigoper"+i).innerHTML;
	var cedula = document.getElementById("cedulaper"+i).innerHTML;
	var nombre = document.getElementById("nombreper"+i).innerHTML;
	var apellido = document.getElementById("apellidoper"+i).innerHTML;
	var fechanac = document.getElementById("fechanacper"+i).innerHTML;
	var padre = document.getElementById("padreper"+i).innerHTML;
	var madre = document.getElementById("madreper"+i).innerHTML;
	var filiacion = document.getElementById("filiacionper"+i).innerHTML;

	document.getElementById("cod").value=codigo;
	document.getElementById("nueva_ced").value=cedula;
	document.getElementById("nombre_nuevo").value=nombre;
	document.getElementById("apellido_nuevo").value=apellido;
	document.getElementById("fechanac_nueva").value=fechanac;
	document.getElementById("padre_nuevo").value=padre;
	document.getElementById("madre_nueva").value=madre;
	document.getElementById("filiacion_nueva").value=filiacion;

	document.getElementById("edadnueva").style.display='block';
	document.getElementById("lugarnacnuevo").style.display='block';
	document.getElementById("domicilionuevo").style.display='block';

	var edad = document.getElementById("edadper"+i).innerHTML;
	var lugarnac = document.getElementById("lugarnacper"+i).innerHTML;
	var estado = document.getElementById("estadoper"+i).innerHTML;
	var domicilio = document.getElementById("domicilioper"+i).innerHTML;

	document.getElementById("edad_nueva").value=edad;
	document.getElementById("lugarnac_nuevo").value=lugarnac;
	document.getElementById("estado_nuevo").value=estado;
	document.getElementById("domicilio_nuevo").value=domicilio;
}












function apareceresp(id){
	if (id.value=="LB")
	{	
		document.getElementById("otrolugaresp").style.display='none';
		document.getElementById("otrolugarbauesp").value="";
		document.getElementById("DatosPersonalesesp").style.display='none';
		document.getElementById("BuscarPersonaesp").style.display='block';
		document.getElementById("busquedaporcedesp").style.display='none'
		document.getElementById("busquedapornomesp").style.display='none'
		document.getElementById("otrolugarbauesp").value='';
		document.getElementById("cedulaesp").value='';
		document.getElementById("nombreesp").value='';
		document.getElementById("apellidoesp").value='';
		document.getElementById("sexesp").checked = true;
		document.getElementById("fechanacesp").value='';
		document.getElementById("edadesp").value='';
		document.getElementById("lugarnacesp").value='';
		document.getElementById("estadoesp").value='';
		document.getElementById("domicilioesp").value='';
		document.getElementById("cedulapadreesp").value='';
		document.getElementById("cedulamadreesp").value='';
		document.getElementById("nombrepadreesp").value='';
		document.getElementById("nombremadreesp").value='';
		document.getElementById("apellidopadreesp").value='';
		document.getElementById("apellidomadreesp").value='';
		document.getElementById("filiacionesp").value='';

	}
	if (id.value=="O"){
		document.getElementById("otrolugaresp").style.display='block';
		document.getElementById("DatosPersonalesesp").style.display='block';
		document.getElementById("BuscarPersonaesp").style.display='none';

		document.getElementById("otrolugarbauesp").focus();	

		document.getElementById("tipobusquedaesp").value=0;
		document.getElementById("cedulesp").value='';

		document.getElementById("nombresp").value='';
		document.getElementById("apelliesp").value='';
		document.getElementById("fenacesp").value='';

		
		document.getElementById("tablaesp").style.display='none';

		document.getElementById("codigoesp").style.display='none';		
		document.getElementById("cedulanuevaesp").style.display='none';
		document.getElementById("nombrenuevoesp").style.display='none';
		document.getElementById("fechanacnuevaesp").style.display='none';
		document.getElementById("edadnuevaesp").style.display='none';
		document.getElementById("lugarnacnuevoesp").style.display='none';
		document.getElementById("domicilionuevoesp").style.display='none';
		document.getElementById("padrenuevoesp").style.display='none';
		document.getElementById("madrenuevaesp").style.display='none';
		document.getElementById("filinuevaesp").style.display='none';

		document.getElementById("codesp").value='';
		document.getElementById("nueva_cedesp").value='';
		document.getElementById("nombre_nuevoesp").value='';
		document.getElementById("apellido_nuevoesp").value='';
		document.getElementById("fechanac_nuevaesp").value='';
		document.getElementById("nombre_nuevoesp").value='';
		document.getElementById("edad_nuevaesp").value='';
		document.getElementById("lugarnac_nuevoesp").value='';
		document.getElementById("estado_nuevoesp").value='';
		document.getElementById("domicilio_nuevoesp").value='';
		document.getElementById("padre_nuevoesp").value='';
		document.getElementById("madre_nuevaesp").value='';
		document.getElementById("filiacion_nuevaesp").value='';

		document.getElementById("nuevocodigoesp").style.display='none';
		document.getElementById("nuevonombreesp").style.display='none';
		document.getElementById("nuevafechanacesp").style.display='none';
		document.getElementById("nuevaedadesp").style.display='none';
		document.getElementById("nuevolugarnacesp").style.display='none';
		document.getElementById("nuevodomicilioesp").style.display='none';
		document.getElementById("padreesp").style.display='none';
		document.getElementById("madreesp").style.display='none';
		document.getElementById("filiesp").style.display='none';

		document.getElementById("nuevo_codigoesp").value='';
		document.getElementById("nuevo_nombreesp").value='';
		document.getElementById("nuevo_apellidoesp").value='';
		document.getElementById("nueva_fechanacesp").value='';
		document.getElementById("nueva_edadesp").value='';
		document.getElementById("nuevo_lugarnacesp").value='';
		document.getElementById("nuevo_estadoesp").value='';
		document.getElementById("nuevo_domicilioesp").value='';
		document.getElementById("nuevo_padreesp").value='';
		document.getElementById("nueva_madreesp").value='';
		document.getElementById("nueva_filiacionesp").value='';
	}
}

function tipo_busquedaesp(id){
	if(id.value==0)
	{
		document.getElementById("busquedaporcedesp").style.display='none';
		document.getElementById("busquedapornomesp").style.display='none';
		document.getElementById("ceduelsp").value='';

		document.getElementById("nombresp").value='';
		document.getElementById("apellisp").value='';
		document.getElementById("fenacesp").value='';

		document.getElementById("tablaesp").style.display='none';

		document.getElementById("codigoesp").style.display='none';		
		document.getElementById("cedulanuevaesp").style.display='none';
		document.getElementById("nombrenuevoesp").style.display='none';
		document.getElementById("fechanacnuevaesp").style.display='none';
		document.getElementById("edadnuevaesp").style.display='none';
		document.getElementById("lugarnacnuevoesp").style.display='none';
		document.getElementById("domicilionuevoesp").style.display='none';
		document.getElementById("padrenuevoesp").style.display='none';
		document.getElementById("madrenuevaesp").style.display='none';
		document.getElementById("filinuevaesp").style.display='none';

		document.getElementById("codesp").value='';
		document.getElementById("nueva_cedesp").value='';
		document.getElementById("nombre_nuevoesp").value='';
		document.getElementById("apellido_nuevoesp").value='';
		document.getElementById("fechanac_nuevaesp").value='';
		document.getElementById("edad_nuevaesp").value='';
		document.getElementById("lugarnac_nuevoesp").value='';
		document.getElementById("estado_nuevoesp").value='';
		document.getElementById("domicilio_nuevoesp").value='';
		document.getElementById("padre_nuevoesp").value='';
		document.getElementById("madre_nuevaesp").value='';
		document.getElementById("filiacion_nuevaesp").value='';

		document.getElementById("nuevocodigoesp").style.display='none';
		document.getElementById("nuevonombreesp").style.display='none';
		document.getElementById("nuevafechanacesp").style.display='none';
		document.getElementById("nuevaedadesp").style.display='none';
		document.getElementById("nuevolugarnacesp").style.display='none';
		document.getElementById("nuevodomicilioesp").style.display='none';
		document.getElementById("padreesp").style.display='none';
		document.getElementById("madreesp").style.display='none';
		document.getElementById("filiesp").style.display='none';

		document.getElementById("nuevo_codigoesp").value='';
		document.getElementById("nuevo_nombreesp").value='';
		document.getElementById("nuevo_apellidoesp").value='';
		document.getElementById("nueva_fechanacesp").value='';
		document.getElementById("nueva_edadesp").value='';
		document.getElementById("nuevo_lugarnacesp").value='';
		document.getElementById("nuevo_estadoesp").value='';
		document.getElementById("nuevo_domicilioesp").value='';
		document.getElementById("nuevo_padreesp").value='';
		document.getElementById("nueva_madreesp").value='';
		document.getElementById("nueva_filiacionesp").value='';
	}
	if(id.value==1)
	{
		document.getElementById("busquedaporcedesp").style.display='block';
		document.getElementById("busquedapornomesp").style.display='none';
		document.getElementById("nombresp").value='';
		document.getElementById("apelliesp").value='';
		document.getElementById("fenacesp").value='';

		document.getElementById("tablaesp").style.display='none';

		document.getElementById("codigoesp").style.display='none';		
		document.getElementById("cedulanuevaesp").style.display='none';
		document.getElementById("nombrenuevoesp").style.display='none';
		document.getElementById("fechanacnuevaesp").style.display='none';
		document.getElementById("edadnuevaesp").style.display='none';
		document.getElementById("lugarnacnuevoesp").style.display='none';
		document.getElementById("domicilionuevoesp").style.display='none';
		document.getElementById("padrenuevoesp").style.display='none';
		document.getElementById("madrenuevaesp").style.display='none';
		document.getElementById("filinuevaesp").style.display='none';

		document.getElementById("codesp").value='';
		document.getElementById("nueva_cedesp").value='';
		document.getElementById("nombre_nuevoesp").value='';
		document.getElementById("apellido_nuevoesp").value='';
		document.getElementById("fechanac_nuevaesp").value='';
		document.getElementById("edad_nuevaesp").value='';
		document.getElementById("lugarnac_nuevoesp").value='';
		document.getElementById("estado_nuevoesp").value='';
		document.getElementById("domicilio_nuevoesp").value='';
		document.getElementById("padre_nuevoesp").value='';
		document.getElementById("madre_nuevaesp").value='';
		document.getElementById("filiacion_nuevaesp").value='';
	}
	if(id.value==2)
	{
		document.getElementById("busquedaporcedesp").style.display='none';
		document.getElementById("busquedapornomesp").style.display='block';
		document.getElementById("cedulesp").value='';;

		document.getElementById("nuevocodigoesp").style.display='none';
		document.getElementById("nuevonombreesp").style.display='none';
		document.getElementById("nuevafechanacesp").style.display='none';
		document.getElementById("nuevaedadesp").style.display='none';
		document.getElementById("nuevolugarnacesp").style.display='none';
		document.getElementById("nuevodomicilioesp").style.display='none';
		document.getElementById("padreesp").style.display='none';
		document.getElementById("madreesp").style.display='none';
		document.getElementById("filiesp").style.display='none';

		document.getElementById("nuevo_codigoesp").value='';
		document.getElementById("nuevo_nombreesp").value='';
		document.getElementById("nuevo_apellidoesp").value='';
		document.getElementById("nueva_fechanacesp").value='';
		document.getElementById("nueva_edadesp").value='';
		document.getElementById("nuevo_lugarnacesp").value='';
		document.getElementById("nuevo_estadoesp").value='';
		document.getElementById("nuevo_domicilioesp").value='';
		document.getElementById("nuevo_padreesp").value='';
		document.getElementById("nueva_madreesp").value='';
		document.getElementById("nueva_filiacionesp").value='';

		document.getElementById("tablaesp").style.display='block';
	}
}

cedulesp.onkeyup=function(){
	var botonBusq = document.getElementById('buscarporcedesp');
	if(cedulesp.value !=""){
		botonBusq.disabled= false;
	}
	else{
		botonBusq.disabled=true;
	}
}

nombresp.onkeyup=function(){
	verificarCamposesp();
}

apelliesp.onkeyup=function(){
	verificarCamposesp();
}

function verificarCamposesp() {
    var botonBusca = document.getElementById('buscarpornomesp');
    
    if (nombresp.value != "" && apelliesp.value != "") {
        botonBusca.disabled = false;
    }
    else {
        botonBusca.disabled = true;
    }
}

function mostrarInfoesp(n,a,f)
{
	document.getElementById("codigoesp").style.display='none';		
	document.getElementById("cedulanuevaesp").style.display='none';
	document.getElementById("nombrenuevoesp").style.display='none';
	document.getElementById("fechanacnuevaesp").style.display='none';
	document.getElementById("edadnuevaesp").style.display='none';
	document.getElementById("lugarnacnuevoesp").style.display='none';
	document.getElementById("domicilionuevoesp").style.display='none';
	document.getElementById("padrenuevoesp").style.display='none';
	document.getElementById("madrenuevaesp").style.display='none';
	document.getElementById("filinuevaesp").style.display='none';

	document.getElementById("codesp").value='';
	document.getElementById("nueva_cedesp").value='';
	document.getElementById("nombre_nuevoesp").value='';
	document.getElementById("apellido_nuevoesp").value='';
	document.getElementById("fechanac_nuevaesp").value='';
	document.getElementById("edad_nuevaesp").value='';
	document.getElementById("lugarnac_nuevoesp").value='';
	document.getElementById("estado_nuevoesp").value='';
	document.getElementById("domicilio_nuevoesp").value='';
	document.getElementById("padre_nuevoesp").value='';
	document.getElementById("madre_nuevaesp").value='';
	document.getElementById("filiacion_nuevaesp").value='';
	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("datosesp").innerHTML=xmlhttp.responseText;
		}else{ 
		document.getElementById("datosesp").innerHTML='Cargando...';
		}
	}
	xmlhttp.open("POST","../php/consulta_nombyape.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send('nomb='+n+'&ape='+a+'&fechanac='+f+'&tipo='+1);
}

function llenaresp(i){

	document.getElementById("codigoesp").style.display='block';
	document.getElementById("cedulanuevaesp").style.display='block';
	document.getElementById("nombrenuevoesp").style.display='block';
	document.getElementById("fechanacnuevaesp").style.display='block';
	document.getElementById("edadnuevaesp").style.display='block';
	document.getElementById("lugarnacnuevoesp").style.display='block';
	document.getElementById("domicilionuevoesp").style.display='block';
	document.getElementById("padrenuevoesp").style.display='block';
	document.getElementById("madrenuevaesp").style.display='block';
	document.getElementById("filinuevaesp").style.display='block';

	var codigoesp=document.getElementById("codigoperesp"+i).innerHTML;
	var cedulaesp = document.getElementById("cedulaperesp"+i).innerHTML;
	var nombreesp = document.getElementById("nombreperesp"+i).innerHTML;
	var apellidoesp = document.getElementById("apellidoperesp"+i).innerHTML;
	var fechanacesp = document.getElementById("fechanacperesp"+i).innerHTML;
	var padreesp = document.getElementById("padreperesp"+i).innerHTML;
	var madreesp = document.getElementById("madreperesp"+i).innerHTML;
	var filiacionesp = document.getElementById("filiacionperesp"+i).innerHTML;

	document.getElementById("codesp").value=codigoesp;
	document.getElementById("nueva_cedesp").value=cedulaesp;
	document.getElementById("nombre_nuevoesp").value=nombreesp;
	document.getElementById("apellido_nuevoesp").value=apellidoesp;
	document.getElementById("fechanac_nuevaesp").value=fechanacesp;
	document.getElementById("padre_nuevoesp").value=padreesp;
	document.getElementById("madre_nuevaesp").value=madreesp;
	document.getElementById("filiacion_nuevaesp").value=filiacionesp;

	document.getElementById("edadnuevaesp").style.display='block';
	document.getElementById("lugarnacnuevoesp").style.display='block';
	document.getElementById("domicilionuevoesp").style.display='block';

	var edadesp = document.getElementById("edadperesp"+i).innerHTML;
	var lugarnacesp = document.getElementById("lugarnacperesp"+i).innerHTML;
	var estadoesp = document.getElementById("estadoperesp"+i).innerHTML;
	var domicilioesp = document.getElementById("domicilioperesp"+i).innerHTML;

	document.getElementById("edad_nuevaesp").value=edadesp;
	document.getElementById("lugarnac_nuevoesp").value=lugarnacesp;
	document.getElementById("estado_nuevoesp").value=estadoesp;
	document.getElementById("domicilio_nuevoesp").value=domicilioesp;
}

function tipoconsulta(id)
{
	if(id.value==0)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConPad").style.display='none';
		document.getElementById("ConPdr").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fn").value='';
		document.getElementById("cedulapad").value='';
		document.getElementById("cedulapdr").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablapadre").style.display='none';
		document.getElementById("tablapadrino").style.display='none';
	}
	if(id.value==1)
	{
		document.getElementById("ConCed").style.display='block';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConPad").style.display='none';
		document.getElementById("ConPdr").style.display='none';

		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fn").value='';
		document.getElementById("cedulapad").value='';
		document.getElementById("cedulapdr").value='';

		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablapadre").style.display='none';
		document.getElementById("tablapadrino").style.display='none';
	}
	if(id.value==2)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='block';
		document.getElementById("ConPad").style.display='none';
		document.getElementById("ConPdr").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("cedulapad").value='';
		document.getElementById("cedulapdr").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablapadre").style.display='none';
		document.getElementById("tablapadrino").style.display='none';
	}
	if(id.value==3)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConPad").style.display='block';
		document.getElementById("ConPdr").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fn").value='';
		document.getElementById("cedulapdr").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablapadrino").style.display='none';
	}
	if(id.value==4)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConPad").style.display='none';
		document.getElementById("ConPdr").style.display='block';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fn").value='';
		document.getElementById("cedulapad").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablapadre").style.display='none';
	}
}
function tipoconsultacom(id)
{
	if(id.value==0)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("aniocom").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==1)
	{
		document.getElementById("ConCed").style.display='block';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("aniocom").value='';

		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==2)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='block';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("aniocom").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==3)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='block';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
	}
}
function tipoconsultaconf(id)
{
	if(id.value==0)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("anioconf").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==1)
	{
		document.getElementById("ConCed").style.display='block';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("anioconf").value='';

		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==2)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='block';
		document.getElementById("ConAnio").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("anioconf").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablaanio").style.display='none';
	}
	if(id.value==3)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConAnio").style.display='block';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
	}
}
function tipoconsultamatri(id)
{
	if(id.value==0)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConFecha").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fechamatri").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablafecha").style.display='none';
	}
	if(id.value==1)
	{
		document.getElementById("ConCed").style.display='block';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConFecha").style.display='none';

		document.getElementById("nom").value='';
		document.getElementById("ap").value='';
		document.getElementById("fechamatri").value='';

		document.getElementById("tablanombre").style.display='none';
		document.getElementById("tablafecha").style.display='none';
	}
	if(id.value==2)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='block';
		document.getElementById("ConFecha").style.display='none';

		document.getElementById("cedula").value='';
		document.getElementById("fechamatri").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablafecha").style.display='none';
	}
	if(id.value==3)
	{
		document.getElementById("ConCed").style.display='none';
		document.getElementById("ConNom").style.display='none';
		document.getElementById("ConFecha").style.display='block';

		document.getElementById("cedula").value='';
		document.getElementById("nom").value='';
		document.getElementById("ap").value='';

		document.getElementById("tablacedula").style.display='none';
		document.getElementById("tablanombre").style.display='none';
	}
}
function tipoimprimir(id)
{
	if(id.value==0)
	{
		document.getElementById("ImpCons").style.display='none';
		document.getElementById("ImpFe").style.display='none';
		document.getElementById("ImprimirFe").style.display='none';
		document.getElementById("ImpCerti").style.display='none';

		document.getElementById("fines").value='';
	}
	if(id.value==1)
	{
		document.getElementById("ImpCons").style.display='block';
		document.getElementById("ImpFe").style.display='none';
		document.getElementById("ImprimirFe").style.display='none';
		document.getElementById("ImpCerti").style.display='none';

		document.getElementById("fines").value='';
	}
	if(id.value==2)
	{
		document.getElementById("ImpCons").style.display='none';
		document.getElementById("ImpFe").style.display='block';
		document.getElementById("ImprimirFe").style.display='block';
		document.getElementById("ImpCerti").style.display='none';
	}
	if(id.value==3)
	{
		document.getElementById("ImpCons").style.display='none';
		document.getElementById("ImpFe").style.display='none';
		document.getElementById("ImprimirFe").style.display='none';
		document.getElementById("ImpCerti").style.display='block';

		document.getElementById("fines").value='';
	}
}

function borraalbum(variable,iden)
{	
	swal({   
		title: "¿Está Seguro?",   
		text: "¿Desea borrar el album "+variable+" y todo su contenido?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, Borrar!",   
		cancelButtonText: "No, Cancelar!",   
		closeOnConfirm: false,   closeOnCancel: false 
	}, 
	function(isConfirm)
	{   
		if (isConfirm) 
		{     
			swal("Borrado!", "El album "+variable+" se ha eliminado", "success");  
			setTimeout ('redireccionaborrar("'+iden+'")', 2000); 
		} 
		else 
		{     
			swal("Cancelado!", "El album "+variable+" se mantiene", "error");   
		} 
	});
};

function redireccionaborrar(codigo) 
{
	window.location.href='eliminar-album.php?cod='+codigo;
} 

function redireccionacrear() 
{
	window.location.href='crear-album.php';
} 
