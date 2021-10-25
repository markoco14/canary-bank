//<script src="js/createNewClass.js?<?php echo time(); ?>">
//</script>
//add class function
const addClass = document.getElementById('add-class');

function addNewClass() {
	console.log('it worked');
	const popup = document.createElement('div');
	const className = document.createElement('input');

	popup.style.backgroundColor = 'rgb(250,255,108)';
	popup.style.width = '70vw';
	popup.style.height = '70vh';

	popup.style.position = 'absolute'
	popup.style.top = '50px'
	popup.style.left = '15vw'


	document.body.appendChild(popup);
	popup.appendChild(className);
}

addClass.addEventListener('click', addNewClass);