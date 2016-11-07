"use strict";

/**
 * PROGRAMAÇÃO FUNCIONAL
 * Higher-Order Functions: funções que recebe e retorna outras funções
 * Pure Functions: entrada e saída de dados, não pode alterar dados externos
 * Currying: retorna uma função que pode ser chamada várias vezes substituindo vários parâmetros
 * array.map(fn) : retorna um novo array
 * array.filter(fn) : retorna um novo array com os valores filtrados pela condição especificada
 * array.push(any) : adiciona um novo valor ao array
 */


function currying() {
	var formulario = document.forms["form"];

	return function (input) {
		var id, span;
		id = formulario[input].id;
		span = document.querySelector(".error-" + id);
		span.innerHTML = "Invalid";
	}
}

function showError(elem, callback) {
	var selector = "#" + elem.id + " + span";
	var span = document.querySelector(selector);

	return callback(span);
}

/*document.getElementById("button").onclick = function () {
	var newArray = map(["band", "album"]);
	forEach("email", newArray);
}*/

/*var form = document.forms["form"];
form.addEventListener("submit", function (e) {
	var inputs = [];
	inputs.push(this["band_name"]);
	inputs.push(this["album_name"]);
	
	if (hasErrors(inputs)) {
		e.preventDefault();
	}
});*/
