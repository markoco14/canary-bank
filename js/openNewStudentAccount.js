<script>
//this is the script for making new accounts
//students will be able to choose their name
//students will be able to choose their picture
//students will be able to choose how many tokens they have
//that's all for now
//create a reference to the Open Account button
const newAccount = document.querySelector('button');
//attach event listener to button
newAccount.addEventListener('click', openAccount)
//create a function to pop up the profile maker
//i want to work on the styling
//I can also try to find that code that
//lets me update the size of the box in realtime
//as people resize their browsers.
//no matter what it has to be device responsive
function openAccount() {
	//make close pop up button
	const closeButton = document.createElement('div');
	closeButton.textContent = 'X';
	closeButton.setAttribute('class','close-window')
	closeButton.addEventListener('click', () => {
		document.body.removeChild(div);
	})

	//make the container and the welcome message
	const div = document.createElement('div');
	const welcome = document.createElement('p');
	const form = document.createElement('form');
	const inputName = document.createElement('input');
	const inputEmail = document.createElement('input');
	const inputUid = document.createElement('input');
	const inputPassword = document.createElement('input');
	const inputRepeat = document.createElement('input');
	const submitButton = document.createElement('button');
	//const section = document.createElement('section');

	//set text contents.
	welcome.textContent = 'Welcome to the Student Profile Creator. Please fill out the information below.';
	submitButton.textContent = 'Make profile'

	//style the account maker elements
	div.setAttribute('class','account-open');
	//section.setAttribute('class','choose-name')

	//set form action attribute
	form.setAttribute('action', 'includes/signup.inc.php');
	form.setAttribute('method', 'post');

	//set input type attributes
	inputName.setAttribute('type', 'text');
	inputEmail.setAttribute('type', 'text');
	inputUid.setAttribute('type', 'text');
	inputPassword.setAttribute('type', 'password');
	inputRepeat.setAttribute('type', 'password');
	submitButton.setAttribute('type', 'submit');

	//set input name attributes
	inputName.setAttribute('name', 'name');
	inputEmail.setAttribute('name', 'email');
	inputUid.setAttribute('name', 'uid');
	inputPassword.setAttribute('name', 'pwd');
	inputRepeat.setAttribute('name', 'pwdrepeat');
	submitButton.setAttribute('name', 'submit');

	//set input placeholder attributes
	inputName.setAttribute('placeholder', 'First name...');
	inputEmail.setAttribute('placeholder', 'Email...');
	inputUid.setAttribute('placeholder', 'Username...');
	inputPassword.setAttribute('placeholder', 'Password...');
	inputRepeat.setAttribute('placeholder', 'Repeat password...');

	//set input ID attributes
	inputName.setAttribute('id', 'name');
	inputEmail.setAttribute('id', 'email');
	inputUid.setAttribute('id', 'uid');
	inputPassword.setAttribute('id', 'pwd');
	inputRepeat.setAttribute('id', 'pwdrepeat');
	submitButton.setAttribute('id', 'submit');



	//append elements to make popup box
	div.appendChild(welcome);
	//div.appendChild(section);
	div.appendChild(closeButton);
	div.appendChild(form);
	form.appendChild(inputName);
	form.appendChild(inputEmail);
	form.appendChild(inputUid);
	form.appendChild(inputPassword);
	form.appendChild(inputRepeat);
	form.appendChild(submitButton);
	document.body.appendChild(div);

	submitButton.addEventListener('click', () => {
		//set input values
		inputName.value = inputName.textContent;
		inputEmail.value = inputEmail.textContent;
		inputUid.value = inputEmail.textContent
		inputPassword.value = inputPassword.textContent;
		inputRepeat.value = inputRepeat.textContent

	})

}
</script>