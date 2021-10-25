///this is what I need later
//student names
	const labelName = document.createElement('label');
	const inputName = document.createElement('input');
	//student ages
	const labelAge = document.createElement('label');
	const inputAge = document.createElement('input');
	//student genders
	const labelGender = document.createElement('label');
	const inputGender = document.createElement('input');
	//student happy faces
	const labelFaces = document.createElement('label');
	const inputFaces = document.createElement('input');
	//student tokens
	const labelTokens = document.createElement('label');
	const inputTokens = document.createElement('input');

//set the label text content
	
	labelName.textContent = 'Student name: ';
	labelAge.textContent = 'Student age: ';
	labelGender.textContent = 'Student gender: ';
	labelFaces.textContent = 'How many happy faces do you have? ';
	labelTokens.textContent = 'How many tokens do you have? ';

	//set the input placeholder values
	inputName.setAttribute('placeholder', 'Student name here...');
	inputEmail.setAttribute('placeholder', 'Student email here...');
	inputUsername.setAttribute('placeholder', 'Student username here...');
	inputPassword.setAttribute('placeholder', 'password...');
	inputPasswordRepeat.setAttribute('placeholder', 'repeat password...');


form.appendChild(labelName);
	form.appendChild(inputName);
	form.appendChild(labelAge);
	form.appendChild(inputAge);
	form.appendChild(labelGender);
	form.appendChild(inputGender);
	form.appendChild(labelFaces);
	form.appendChild(inputFaces);
	form.appendChild(labelTokens);
	form.appendChild(inputTokens);

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
	const labelName = document.createElement('label');
	const inputName = document.createElement('input');
	const section = document.createElement('section');

	//set the welcome text.
	welcome.textContent = 'Welcome to the profile creator. Please fill out the information below.';
	labelName.textContent = 'Student name';
	inputName.setAttribute('placeholder', 'Student name here');
	//style the account maker elements
	div.setAttribute('class','account-open');
	section.setAttribute('class','choose-name')

	div.appendChild(welcome);
	//div.appendChild(section);
	div.appendChild(closeWindow);
	div.appendChild(form)
	form.appendChild(labelName);
	form.appendChild(inputName);
	document.body.appendChild(div);
}



	/*//make the name tag for each students name
	for (i = 0; i < students.length; i++) {
		const nameBox = document.createElement('div');
		const name = document.createElement('p');
		name.textContent = students[i];
		nameBox.appendChild(name);
		section.appendChild(nameBox);
		nameBox.setAttribute('class','name-tag');
		nameBox.addEventListener('click', () => {
			document.body.removeChild(div);
		})

	}*/