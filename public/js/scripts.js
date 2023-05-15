const firstDiv = document.querySelector( ".wrap" ); 
var fieldDiv = document.querySelector( ".field" ); 
var index = 0;

function add1() {
	var newDiv = firstDiv.cloneNode( true ); 
	fieldDiv.appendChild( newDiv ); 
}

function remove1() {
	let elems = document.querySelectorAll('.wrap') 
	let el = elems[elems.length - 1] 
	el.parentNode.removeChild(el); 
}

function addoneanswear() {
	document.querySelector( ".field" ).insertAdjacentHTML('beforeend', '<div class="wrap"><p align="center"><input name="dzen" type="radio" checked value="'+(index++)+'"><input name="answears[]" type="text" size="40" placeholder="Добавьте текст"></p></div>');
}

function removeoneanswear() {
	let elems = document.querySelectorAll('.wrap') 
	let el = elems[elems.length - 1] 
	el.parentNode.removeChild(el); 
	--index;
}

function addmanyanswears() {
	document.querySelector( ".field" ).insertAdjacentHTML('beforeend', '<div class="wrap"><p align="center"><input name="dzen[]" type="checkbox" value="'+(index++)+'" checked><input name="answears[]" type="text" size="40" placeholder="Добавьте ответ"></p></div>');
}

function removemanyanswears() {
	let elems = document.querySelectorAll('.wrap') 
	let el = elems[elems.length - 1] 
	el.parentNode.removeChild(el); 
	--index;
}

function addimageanswear() {
	document.querySelector( ".field" ).insertAdjacentHTML('beforeend', '<div class="wrap"><p align="center"><input name="dzen" type="radio" checked value="'+(index++)+'">Загрузите изображение <input name="image[]" type="file"></p></div>');
}

function removeimageanswear() {
	let elems = document.querySelectorAll('.wrap') 
	let el = elems[elems.length - 1] 
	el.parentNode.removeChild(el); 
	--index;
}

function addselectword() {
	document.querySelector( ".field" ).insertAdjacentHTML('beforeend', '<div class="wrap"><p align="center"><input input name="dzen" checked type="radio" value="'+(index++)+'" ><input name="answers[]" type="text" size="40" placeholder="Добавьте текст"></p></div>	');
}

function removeselectword() {
	let elems = document.querySelectorAll('.wrap') 
	let el = elems[elems.length - 1] 
	el.parentNode.removeChild(el); 
	--index;
}