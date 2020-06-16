var numero=1;
var total=0;
var eliminados=1;

var agregarmodo=0;



function cambio(idb, productomod, preciomod, cantmod){
	var modo = document.getElementById("modo");
	var producto = document.getElementById("producto");
	var precio = document.getElementById("precio");
	var unidades = document.getElementById("unidades");
	var boton = document.getElementById("botonaccion");
	var totalresta = precio.value * unidades.value;
	if(agregarmodo==1){
		modo.innerText="Agregar producto";
		agregarmodo=0;
		boton.innerText="Modificar";
		producto.value="";
		precio.innerText="";
		unidades.innerText="";
		boton.innerText="Agregar";
		boton.setAttribute("onclick", "agregar();");
	}else{
		modo.innerText="Modificar producto";
		agregarmodo=1;
		boton.innerText="Modificar";
		producto.value=productomod;
		//producto.innerText=productomod;
		precio.innerText=preciomod;
		unidades.innerText=cantmod;
		boton.innerText="Modificar";
		boton.setAttribute("onclick", "modificar("+idb+","+totalresta+");");
	}
}

function modify(idb, productomod, preciomod, cantmod){
	agregarmodo=0;
	cambio(idb, productomod, preciomod, cantmod);
}

function borrar(idb, totalresta){
	var cuerpo = document.getElementById('cuerpotabla');
	console.log(idb);
	eliminados++;


	total = total-totalresta;
	if(total!=0 && numero==eliminados){
		total = 0;
	}
	var iva=total*0.12;
	var totalpago = total+iva;
	cuerpo.removeChild(document.getElementById("producto"+idb));
	var tsubtotal = document.getElementById("subtotal");
	var tiva = document.getElementById("iva");
	var ttotal = document.getElementById("total");

	var data6 = document.createTextNode("$"+total);
	var data7 = document.createTextNode("$"+iva);
	var data8 = document.createTextNode("$"+totalpago);

	if(tsubtotal.firstChild){
		tsubtotal.removeChild(tsubtotal.firstChild);
	}
	if(tiva.firstChild){
		tiva.removeChild(tiva.firstChild);
	}
	if(ttotal.firstChild){
		ttotal.removeChild(ttotal.firstChild);
	}

	tsubtotal.appendChild(data6);
	tiva.appendChild(data7);
	ttotal.appendChild(data8);


}

/*function mostrarmodificar(idb, producto, precio, cantidad){
	var contenedor = document.getElementById("contenedoredicion");

	var header = document.createElement("H1");
	var headerdata = document.createTextNode("Modificar Producto");
	header.appendChild(headerdata);

	var label1 = document.createElement("label");
	var product = document.createTextNode("Producto: "+producto);
	label.appendChild(product);

	var label2 = document.createElement("label");
	var label2data = document.createTextNode("Precio: ");
	label2.appendChild(label2data);

	var input = document.createElement("input");
	input.setAttribute("class", "inputs");
	input.setAttribute("type", "number");
	input.setAttribute("value", precio);

	var label3 = document.createElement("label");
	var label3data = document.createTextNode("Unidades: ");
	label3.appendChild(label3data);

	var input2 = document.createElement("input");
	input2.setAttribute("class", "inputs");
	input2.setAttribute("type", "number");
	input2.setAttribute("value", cantidad);

	var boton = document.createElement("button");
	boton.setAttribute("class", "inputs");
	var botondata = document.createTextNode("Guardar");
	boton.appendChild(botondata);

	contenedor.appendChild(header);
	contenedor.appendChild(label1);
}*/

function agregar(){
	var producto = document.getElementById("producto").value;
	var precio = document.getElementById("precio").value;
	var cantidad = document.getElementById("unidades").value;
	console.log(producto+" "+precio+" "+cantidad);
	if(producto == "" || precio == "" || cantidad == ""){
		alert("Llena todos los campos");
	}else{
		console.log("campos llenos");
		var monto = precio * cantidad;
		total = total + monto;
		var iva = total * 0.12;
		var totalpago = total+iva;

		var cuerpo = document.getElementById('cuerpotabla');

		var fila = document.createElement('tr');
		fila.setAttribute("id", "producto"+numero);
		var tabledata1 = document.createElement('td');
		var tabledata2 = document.createElement('td');
		tabledata2.setAttribute("id","nombre"+numero);
		var tabledata3 = document.createElement('td');
		tabledata3.setAttribute("id","precio"+numero);
		var tabledata4 = document.createElement('td');
		tabledata4.setAttribute("id","cantidad"+numero);
		var tabledata5 = document.createElement('td');
		tabledata5.setAttribute("id", "monto"+numero);
		var tableboton = document.createElement('td');
		var tableboton2 = document.createElement('td');

		var data1 = document.createTextNode(numero);
		var data2 = document.createTextNode(producto);
		var data3 = document.createTextNode("$"+precio);
		var data4 = document.createTextNode(cantidad);
		var data5 = document.createTextNode("$"+monto);
		var boton = document.createElement('button');
		var databutton = document.createTextNode("Eliminar");
		boton.appendChild(databutton);
		tableboton.appendChild(boton);
		tableboton.setAttribute("onclick", "borrar("+numero+","+monto+")");
		var boton2 = document.createElement('button');
		var databutton2 = document.createTextNode("Modificar");
		boton2.appendChild(databutton2);
		tableboton2.appendChild(boton2);
		tableboton2.setAttribute("onclick", "modificar("+numero+","+monto+")");
		//tableboton2.setAttribute("onclick", "modify("+numero+","+producto+","+precio+","+cantidad+")");
		numero++;

		var data6 = document.createTextNode("$"+total);
		var data7 = document.createTextNode("$"+iva);
		var data8 = document.createTextNode("$"+totalpago);

		tsubtotal = document.getElementById("subtotal");
		tiva = document.getElementById("iva");
		ttotal = document.getElementById("total");

		tabledata1.appendChild(data1);
		tabledata2.appendChild(data2);
		tabledata3.appendChild(data3);
		tabledata4.appendChild(data4);
		tabledata5.appendChild(data5);

		fila.appendChild(tabledata1);
		fila.appendChild(tabledata2);
		fila.appendChild(tabledata3);
		fila.appendChild(tabledata4);
		fila.appendChild(tabledata5);
		fila.appendChild(tableboton);
		fila.appendChild(tableboton2);

		cuerpo.appendChild(fila);

		if(tsubtotal.firstChild){
			tsubtotal.removeChild(tsubtotal.firstChild);
		}
		if(tiva.firstChild){
			tiva.removeChild(tiva.firstChild);
		}
		if(ttotal.firstChild){
			ttotal.removeChild(ttotal.firstChild);
		}

		tsubtotal.appendChild(data6);
		tiva.appendChild(data7);
		ttotal.appendChild(data8);
	}
}


function agregarProducto(nombre,precio){
	var desc = document.getElementById('desctxt').value;
		descuento = document.getElementById("descuento");
		pago = document.getElementById("pago");
		totalmindescuento=total-desc;
		descuento.innerText=desc;
		pago.innerText="$"+totalmindescuento;
}

function agregarProducto(nombre,precio){
	/*var producto = document.getElementById("producto").value;
	var precio = document.getElementById("precio").value;
	var cantidad = document.getElementById("unidades").value;
	console.log(producto+" "+precio+" "+cantidad);*/
	
	var cuerpo = document.getElementById('cuerpotabla');

		var fila = document.createElement('tr');
		fila.setAttribute("id", "producto"+numero);

		//var tabledata1 = document.createElement('td');
		var tabledata2 = document.createElement('td');
		tabledata2.setAttribute("id","nombre"+numero);
		var tabledata3 = document.createElement('td');
		tabledata3.setAttribute("id","precio"+numero);
		var tabledata4 = document.createElement('td');
		tabledata4.setAttribute("id","cantidad"+numero);
		var tabledata5 = document.createElement('td');
		tabledata5.setAttribute("id", "monto"+numero);
		var tableboton = document.createElement('td');
		var tableboton2 = document.createElement('td');

		//var data1 = document.createTextNode(numero);
		var data2 = document.createTextNode(nombre);
		var data3 = document.createTextNode("$"+precio);
		var data4 = document.createTextNode("1");
		var data5 = document.createTextNode("$"+precio);
		numero++;

		recuento = document.getElementById("recuento");
		totald = document.getElementById("total");
		descuento = document.getElementById("descuento");
		envio = document.getElementById("envio");
		pago = document.getElementById("pago");

		total=total+precio;

		var dataprecio = document.createTextNode("$"+total);
		var datapago = document.createTextNode("$"+total);
		pago.innerText="$"+total;
		totald.innerText="$"+total;
		recuento.innerText="Recuento de productos ("+(numero-1)+")";

		tabledata2.appendChild(data2);
		tabledata3.appendChild(data3);
		tabledata4.appendChild(data4);
		tabledata5.appendChild(data5);

		fila.appendChild(tabledata2);
		fila.appendChild(tabledata3);
		fila.appendChild(tabledata4);
		fila.appendChild(tabledata5);

		cuerpo.appendChild(fila);	

	/*if(producto == "" || precio == "" || cantidad == ""){
		alert("Llena todos los campos");
	}else{
		console.log("campos llenos");
		var monto = precio * cantidad;
		total = total + monto;
		var iva = total * 0.12;
		var totalpago = total+iva;

		var cuerpo = document.getElementById('cuerpotabla');

		var fila = document.createElement('tr');
		fila.setAttribute("id", "producto"+numero);
		var tabledata1 = document.createElement('td');
		var tabledata2 = document.createElement('td');
		tabledata2.setAttribute("id","nombre"+numero);
		var tabledata3 = document.createElement('td');
		tabledata3.setAttribute("id","precio"+numero);
		var tabledata4 = document.createElement('td');
		tabledata4.setAttribute("id","cantidad"+numero);
		var tabledata5 = document.createElement('td');
		tabledata5.setAttribute("id", "monto"+numero);
		var tableboton = document.createElement('td');
		var tableboton2 = document.createElement('td');

		var data1 = document.createTextNode(numero);
		var data2 = document.createTextNode(producto);
		var data3 = document.createTextNode("$"+precio);
		var data4 = document.createTextNode(cantidad);
		var data5 = document.createTextNode("$"+monto);
		var boton = document.createElement('button');
		var databutton = document.createTextNode("Eliminar");
		boton.appendChild(databutton);
		tableboton.appendChild(boton);
		tableboton.setAttribute("onclick", "borrar("+numero+","+monto+")");
		var boton2 = document.createElement('button');
		var databutton2 = document.createTextNode("Modificar");
		boton2.appendChild(databutton2);
		tableboton2.appendChild(boton2);
		tableboton2.setAttribute("onclick", "modificar("+numero+","+monto+")");
		//tableboton2.setAttribute("onclick", "modify("+numero+","+producto+","+precio+","+cantidad+")");
		numero++;

		var data6 = document.createTextNode("$"+total);
		var data7 = document.createTextNode("$"+iva);
		var data8 = document.createTextNode("$"+totalpago);

		tsubtotal = document.getElementById("subtotal");
		tiva = document.getElementById("iva");
		ttotal = document.getElementById("total");

		tabledata1.appendChild(data1);
		tabledata2.appendChild(data2);
		tabledata3.appendChild(data3);
		tabledata4.appendChild(data4);
		tabledata5.appendChild(data5);

		fila.appendChild(tabledata1);
		fila.appendChild(tabledata2);
		fila.appendChild(tabledata3);
		fila.appendChild(tabledata4);
		fila.appendChild(tabledata5);
		fila.appendChild(tableboton);
		fila.appendChild(tableboton2);

		cuerpo.appendChild(fila);

		if(tsubtotal.firstChild){
			tsubtotal.removeChild(tsubtotal.firstChild);
		}
		if(tiva.firstChild){
			tiva.removeChild(tiva.firstChild);
		}
		if(ttotal.firstChild){
			ttotal.removeChild(ttotal.firstChild);
		}

		tsubtotal.appendChild(data6);
		tiva.appendChild(data7);
		ttotal.appendChild(data8);
	}*/
}



function modificar(idb, totalresta){
	var name = document.getElementById("producto").value;
	var price = document.getElementById("precio").value;
	var quantity = document.getElementById("unidades").value;

	if(price=="" || quantity==""){
		alert("Llena todos los campos");
	}else{
		var producto = document.getElementById("nombre"+idb);
		if(producto.firstChild)
			producto.removeChild(producto.firstChild);
		var precio = document.getElementById("precio"+idb);
		if(precio.firstChild)
			precio.removeChild(precio.firstChild);
		var cantidad = document.getElementById("cantidad"+idb);
		if(cantidad.firstChild)
			cantidad.removeChild(cantidad.firstChild);
		var monto = document.getElementById("monto"+idb);
		if(monto)
			monto.removeChild(monto.firstChild);

		nuevoproducto = document.createTextNode(name);
		nuevoprecio = document.createTextNode("$"+price);
		nuevacantidad = document.createTextNode(quantity);
		nuevomonto = document.createTextNode("$"+price*quantity);

		producto.appendChild(nuevoproducto);
		precio.appendChild(nuevoprecio);
		cantidad.appendChild(nuevacantidad);
		monto.appendChild(nuevomonto);



		total = total-totalresta;
		total = total + (price*quantity);
		var iva=total*0.12;
		var totalpago = total+iva;
		var tsubtotal = document.getElementById("subtotal");
		var tiva = document.getElementById("iva");
		var ttotal = document.getElementById("total");

		var data6 = document.createTextNode("$"+total);
		var data7 = document.createTextNode("$"+iva);
		var data8 = document.createTextNode("$"+totalpago);

		if(tsubtotal.firstChild){
			tsubtotal.removeChild(tsubtotal.firstChild);
		}
		if(tiva.firstChild){
			tiva.removeChild(tiva.firstChild);
		}
		if(ttotal.firstChild){
			ttotal.removeChild(ttotal.firstChild);
		}

		tsubtotal.appendChild(data6);
		tiva.appendChild(data7);
		ttotal.appendChild(data8);
		//cambio(0,0,0,0);
	}
}
