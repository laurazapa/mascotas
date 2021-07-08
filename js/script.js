// FUNCIONES DE MASCOTAS

window.onload= function(){

	/*// FUNCIONALIDAD: QUE LA PÁGINA SE RECARGUE CADA 2min
	setTimeout(function(){
		location.reload();
	}, 60000);*/
	

	// FUNCIONALIDAD: RELOJ	
	setInterval(hora, 500);  

	
	// FUNCIONALIDAD: COMPROBACION LETRA DNI
	var DNI= document.getElementById('inDNI');
	if(DNI){
		DNI.onblur= function(){
			var dni= DNI.value;
			var letra= dni.charAt(dni.length-1).toUpperCase();
			var dni= parseInt(dni.substring(0, dni.length-1));				

			//calcular la letra del dni
			letraFuncion = letraDNI(dni);

			// imprimir la letra en el output
			if(letraFuncion == letra){
				DNI.classList.remove('wrong');
				botonEnviar.disabled= false;
			}
			else{
				DNI.classList.add('wrong');
				botonEnviar.disabled= true;
			}
		}
	}
	
	
	// FUNCIONALIDAD: Pasar a mayúsculas el texto de un input (a medida que se escribe)
	var mayus= document.querySelectorAll('.mayusculas');
	for(let m of mayus){
		m.onkeyup= function(){
			this.value= this.value.toUpperCase();
		}
	}


	// FUNCIONALIDAD: ATAJOS DE TECLADO
	// shift + Q -> contacto
	// U -> lista de usuarios
	// M -> lista de mascotas
	// G -> galería de fotos
	// Q -> contacto
	document.body.onkeypress = function(ev){
		//comprueba qué tecla se apretó y va al enlace correspondiente
		if(ev.key.toUpperCase()== 'Q' && ev.shiftKey){
			//llevar a ayuda, contacto
			location.href= '/contacto';
		}
		switch(ev.key.toUpperCase()){
			case 'U': location.href= '/usuario';
						break;
			case 'M': location.href= '/mascota';
						break;
			case 'G': location.href= '/foto';
						break;
			case 'Q': location.href= '/contacto';
						break;
		}
	}
	//desactivar la propagación de eventos en los inputs
	var inputs= document.querySelectorAll('input, textarea');

	for(let input of inputs){
		input.onkeypress= function(ev){
			ev.stopPropagation();
		}
	}


	// HACER GRANDES LAS FOTOS DE LA GALERÍA
	// toma todas las imágenes de la galería
	var imagenes = document.querySelectorAll('#galeria img');
	// a cada una de ellas
	for(let imagen of imagenes){
		// añádeles el manejador de evento onclick que haga:
		imagen.onclick = function(){
			agrandar(this); // llamar a la función agrandar
		}
	}


}


// FUNCIÓN PARA PONER LA HORA
function hora(){
	//obtener la fecha de hoy
	var hoy= new Date();

	//extraer las horas, los minutos y los segundos
	var horas= hoy.getHours();
	var minutos= hoy.getMinutes();
	var segundos= hoy.getSeconds();

	//concatenar un 0 si son de 1 dígito
	if(horas<10) horas= '0'+horas;
	if(minutos<10) minutos= '0'+minutos;
	if(segundos<10) segundos= '0'+segundos;

	//mostrarlas en los outputs
	outHoras.innerHTML= horas;
	outMinutos.innerHTML= minutos;
	outSegundos.innerHTML= segundos;
}

// FUNCIÓN PARA LA LETRA DEL DNI
function letraDNI(dni){
	//mirar a qué letra corresponde
	var letras = "TRWAGMYFPDXBNJZSQVHLCKE";
	//calcular el módulo de 23
	return letras[dni%23];
}

// FUNCIÓN PARA PONER IMÁGENES EN GRANDE
function agrandar(imagen){

	// crear una nueva figura
	var figura = document.createElement('figure');

	// poner la clase grande a la figura
	figura.className = 'grande';

	// hacer que la figura grande se cierre al hacerle click
	figura.onclick = function(){
		this.remove();
	}

	// crear una nueva imagen
	var nuevaImagen = document.createElement('img');

	// poner la ruta de la nueva imagen a la ruta en la que hicimos click
	nuevaImagen.src = imagen.src;

	// poner el alt de la nueva imagen al alt de la que hicimos click
	nuevaImagen.alt = imagen.alt;

	// crear un nuevo figcaption
	var figcaption = document.createElement('figcaption');

	// poner la información del figcaption
	figcaption.innerHTML = imagen.nextElementSibling.innerHTML;

	// colocar la imagen en la figura
	figura.appendChild(nuevaImagen);

	// colocar el figcaption en la figura
	figura.appendChild(figcaption);

	// colocar la figura en la galería
	galeria.appendChild(figura);
}