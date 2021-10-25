//<script src="js/plusMinusTokens.js?<?php echo time(); ?>">
//</script>

//find the correct tokens amount
//store it in tokens variable
//do math, add 1
//send with fetch


let createAddForm = function(tokens, sid) {
	//create form elements for fetch/xml request
	let form = document.createElement('form');
	let tokenInput = document.createElement('input');
	let sidInput = document.createElement('input');
	let button = document.createElement('button');

	//set form/input attributes for FormData object
	form.setAttribute('id', 'myForm');
	form.setAttribute('name', 'myForm');
	form.setAttribute('method', 'post');
	form.setAttribute('action', 'includes/tokensPlus.inc.php');
	
	//set token input attributes
	tokenInput.setAttribute('type', 'hidden');
	tokenInput.setAttribute('id', 'tokens');
	tokenInput.setAttribute('name', 'tokens');

	//set student id attibutes
	sidInput.setAttribute('type', 'hidden');
	sidInput.setAttribute('id', 'sid');
	sidInput.setAttribute('name', 'sid');

	button.setAttribute('type', 'submit');
	button.setAttribute('name', 'submit');
	button.textContent = "Deposit tokens";
	//append to the profiles section
	form.appendChild(tokenInput);
	form.appendChild(sidInput);
	form.appendChild(button);
	profilesSection.appendChild(form);
	//set the input value to the new token amount
	tokenInput.value = tokens;
	sidInput.value = sid;
	//let myForm = document.getElementById('myForm');
	//let formData = new FormData(myForm);
	//console.log(formData);
	//this automatically 
	button.click();
}

let createMinusForm = function(tokens, sid) {
	//create form elements for fetch/xml request
	let form = document.createElement('form');
	let tokenInput = document.createElement('input');
	let sidInput = document.createElement('input');
	let button = document.createElement('button');

	//set form/input attributes for FormData object
	form.setAttribute('id', 'myForm');
	form.setAttribute('name', 'myForm');
	form.setAttribute('method', 'post');
	form.setAttribute('action', 'includes/tokensMinus.inc.php');
	
	//set token input attributes
	tokenInput.setAttribute('type', 'hidden');
	tokenInput.setAttribute('id', 'tokens');
	tokenInput.setAttribute('name', 'tokens');

	//set student id attibutes
	sidInput.setAttribute('type', 'hidden');
	sidInput.setAttribute('id', 'sid');
	sidInput.setAttribute('name', 'sid');

	button.setAttribute('type', 'submit');
	button.setAttribute('name', 'submit');
	button.textContent = "Deposit tokens";
	//append to the profiles section
	form.appendChild(tokenInput);
	form.appendChild(sidInput);
	form.appendChild(button);
	profilesSection.appendChild(form);
	//set the input value to the new token amount
	tokenInput.value = tokens;
	sidInput.value = sid;
	//let myForm = document.getElementById('myForm');
	//let formData = new FormData(myForm);
	//console.log(formData);
	//this automatically 
	button.click();
}

let addTokens = function(e) {
	let numberOfTokens; 
	let classIndex;
	let classUID;
	let tokens; 
	let i = e.target.value
	let sid;
	
	//console.log(classNames);
	classIndex = classNames.indexOf(optionSelector.value);
	//console.log(`The name tracker has found the class name at index ${classIndex}.`);
	//console.log(`Using index ${classIndex} to find the correct classUID in classUids`);
	classUID = classUids[classIndex];
	//console.log(`The class UID at index ${classIndex} is ${classUID}`);
	//console.log(e.target.value);

	//the add button has a value set to it
	//the value is the i value of that student
	//so e.target.value will give us the value of the button
	//and we can use that to go through the student list
	tokens = students[i].studentsTokens;
	sid = students[i].studentsId;
	console.log(`The student's sid is ${sid}.`);
	console.log(`The value of tokens is ${tokens}`);
	console.log("You added one token!");
	//now add +1 to the total number of tokens
	tokens++;
	console.log(`The new value of tokens is ${tokens}.`);
	console.log(`This student has ${tokens} tokens.`);

	createAddForm(tokens, sid);
}
	
	
	//try to push data to server with XMLHTTPRequest

let subtractTokens = function(e) {
	let numberOfTokens; 
	let classIndex;
	let classUID;
	let tokens; 
	let i = e.target.value
	let sid;
	
	//console.log(classNames);
	classIndex = classNames.indexOf(optionSelector.value);
	//console.log(`The name tracker has found the class name at index ${classIndex}.`);
	//console.log(`Using index ${classIndex} to find the correct classUID in classUids`);
	classUID = classUids[classIndex];
	//console.log(`The class UID at index ${classIndex} is ${classUID}`);
	//console.log(e.target.value);

	//the add button has a value set to it
	//the value is the i value of that student
	//so e.target.value will give us the value of the button
	//and we can use that to go through the student list
	tokens = students[i].studentsTokens;
	sid = students[i].studentsId;
	console.log(`The student's sid is ${sid}.`);
	console.log(`The value of tokens is ${tokens}`);
	console.log("You added one token!");
	//now add +1 to the total number of tokens
	tokens--;
	console.log(`The new value of tokens is ${tokens}.`);
	console.log(`This student has ${tokens} tokens.`);

	createMinusForm(tokens, sid);
}

let addTokenRequest = function() {
	console.log('stuff here');
}


	/*xmlhttp.open("POST","plusMinusTokens.inc.php",true);
	xmlhtt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("tokens");*/

	//push data to the server with fetch
	/*fetch('includes/plusMinusTokens.inc.php', {
		method: "post",
		body: tokens
	}).then(function(response) {
		return response.text();
	}).then(function(text) {
		console.log(text);
	})*/



	//ok I've isolated which class uid I need 
	//to use from the add button
	//now I need to apply that to the database
	//I think I need a variable for the students name
	//So I can use the same method to also grab the student's unique ID.
	/*for (i = 0; i < students.length; i++) {
		if (students[i].studentsClassuid === uidFound) {
			console.log(`Found a student in the class at ${i}`);
			tokens = students[i].studentsTokens;
			console.log(`The student has ${tokens} tokens.`)
		}
	}*/

	/*var xhr = new XMLHttpRequest();
	var url = 'includes/plusMinusTokens.inc.php';
	xhr.open('POST', url, true);

	//Send the proper header information along with the request
	//xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {//Call a function when the state changes.
	    if(xhr.readyState == 4 && xhr.status == 200) {
	        alert(xhr.responseText);
	    }
	}
	xhr.send(tokens);
	*/