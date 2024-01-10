/* Función de acordeon para la sección nosotros.php */

$(function() {
	// Activa el elemento si la clase esta activa	
	$(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
	
	$(".accordion > .accordion-item").click(function() {
		// Cancela a las demas
		$(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
		// Alterna el elemento
		$(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
	});
});

// Activamos los tooltips

$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
  });


// Funcion para la ventana modal del producto en el banner de la seccion home.php 

document.addEventListener('DOMContentLoaded', function () {
	const openModalButton = document.querySelector('.open-modal');
	let modal; // Declarar la variable modal fuera del evento para acceder a ella dentro de diferentes funciones.
  
	openModalButton.addEventListener('click', (e) => {
	  e.preventDefault();
  
	  // Crear la modal
	  modal = document.createElement('div');
	  modal.classList.add('modal', 'animate__animated', 'animate__fadeIn');
  
	  const modalContent = document.createElement('div');
	  modalContent.classList.add('modal-content');
  
	  const modalCloseButton = document.createElement('span');
	  modalCloseButton.classList.add('modal__close');
	  modalCloseButton.textContent = '×';
  
	  const modalLeft = document.createElement('div');
	  modalLeft.classList.add('modal__left');
  
	  const modalImage = document.createElement('img');
	  modalImage.src = 'assets/img/home/aceite-modal.png';
	  modalImage.alt = 'Producto Aceite de CBD';
  
	  const modalRight = document.createElement('div');
	  modalRight.classList.add('modal__right');
  
	  const modalTitle = document.createElement('h2');
	  modalTitle.textContent = 'Aceite Sublingual Premium 39,9% 30ml';
  
	  const modalDescription = document.createElement('p');
	  modalDescription.textContent = 'Uno de los aceites con más porcentaje de CBD del mercado (39,9%)';
  
	  const modalList = document.createElement('ul');
	  const listItems = ['Antidepresivo', 'Trastornos de bipolaridad', 'Regula dolores crónicos', 'Estimula el crecimiento óseo', 'Suprime Nauseas y vómitos', 'Ayuda a controlar la epilepsia', 'Alivia las migrañas'];
	  listItems.forEach(itemText => {
		const listItem = document.createElement('li');
		listItem.textContent = itemText;
		modalList.appendChild(listItem);
	  });
  
	  const addToCartButton = document.createElement('button');
	  addToCartButton.textContent = 'Agregar al carrito';
	  addToCartButton.classList.add('button');
  
	  // Agregar los elementos al modal
	  modalContent.appendChild(modalCloseButton);
	  modalLeft.appendChild(modalImage);
	  modalRight.appendChild(modalTitle);
	  modalRight.appendChild(modalDescription);
	  modalRight.appendChild(modalList);
	  modalRight.appendChild(addToCartButton);
  
	  modalContent.appendChild(modalLeft);
	  modalContent.appendChild(modalRight);
  
	  modal.appendChild(modalContent);
  
	  // Agregar la modal al cuerpo del documento
	  document.body.appendChild(modal);
  
	  // Mostrar la modal
	  modal.style.display = 'block';
	  modal.classList.add('modal--fadeIn');
  
	  // Configurar el botón para cerrar la modal
	  modalCloseButton.addEventListener('click', (e) => {
		e.preventDefault();
		modal.style.display = 'none';
	  });
	});
  });
  