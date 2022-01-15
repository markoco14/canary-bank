//write a function that loops through the data
//and takes the student names
//and makes a profile for each

//make a button on the teacher page for "Show Profiles"

//add an event listener to the "Show Profiles" button

//get reference to show profiles button and hide button
const profilesButton = document.getElementById('show-profiles');
const hideButton = document.getElementById('hide-profiles');

//add reference to the options selector
const optionSelector = document.getElementById('class-options');

//get reference to profiles section
const profilesSection = document.getElementById('profile-container');

hideButton.disabled = true;
profilesButton.disabled = false;

function showProfiles() {
	console.log(optionSelector.value);
}


// function showProfiles() {
// 	while (profilesSection.firstChild) {
// 		profilesSection.removeChild(profilesSection.firstChild);
// 	}
// 	//console.log(`The option selector value is ${optionSelector.value}.`);
// 	var inClass;
// 	let className = optionSelector.value;
// 	console.log(className);
// 	let indexTracker = classNames.indexOf(className);
// 	console.log(indexTracker);
// 	let classUid = classUids[indexTracker];
// 	console.log(classUid);

// 	for (i = 0; i < students.length; i++) {
// 		//check what class the student is in
// 		if (students[i].studentsClass === className && students[i].studentsClassuid === classUid) {
// 			//console.log(`Student ${students[i].studentsName} is in ${className} class.`)
// 			inClass = true;
// 			const div = document.createElement('div');
// 			//give each div an ID based on index number
// 			div.setAttribute('id', 'div' + i);
// 			div.setAttribute('value', i);
// 			const h3 = document.createElement('h3');
// 			const pTokens = document.createElement('p');
// 			pTokens.setAttribute('id', 'pTokens' + i);
// 			const span = document.createElement('span');
			
// 			//set element text contents
// 			h3.textContent = students[i].studentsName;
// 			pTokens.textContent = `Your tokens: `;
// 			span.textContent = students[i].studentsTokens;
			
// 			//set element styling
// 			div.setAttribute('class', 'profile');
// 			//let studentName = students[i].studentsName;
// 			//div.setAttribute('name', studentName);
			
// 			//do everything for the +/- buttons
// 			//create referencs
// 			const plusButton = document.createElement('button');
// 			const minusButton = document.createElement('button');
// 			plusButton.textContent = "Add token";
// 			minusButton.textContent = "Subtract token";
// 			//set attributes of plus button
// 			plusButton.setAttribute('class','add-class');
// 			plusButton.setAttribute('value', i);
// 			plusButton.setAttribute('name', 'add')
// 			//set attributes of minus button
// 			minusButton.setAttribute('class','add-class');
// 			minusButton.setAttribute('value', i);
// 			minusButton.setAttribute('name', 'minus')
// 			//define event listener functions
// 			plusButton.addEventListener('click', addTokens)
// 			minusButton.addEventListener('click', subtractTokens)

// 			//create hidden form and input
// 			////****////
// 			//I think I don't need to create invidual forms
// 			//I can just use a global one
// 			//because I'm just submitting for one student at a time
// 			//I'll just need to capture their student ID in the process
// 			////****////
// 			/*const form = document.createElement('form');
// 			form.setAttribute('name', 'form'+i)
// 			const input = document.createElement('input');
// 			input.setAttribute('id', 'input'+i)*/
	
			
// 			//append all to body
// 			div.appendChild(h3);
// 			div.appendChild(pTokens);
// 			pTokens.appendChild(span);
// 			div.appendChild(plusButton);
// 			div.appendChild(minusButton);
// 			//div.appendChild(form);
// 			//form.appendChild(input);
// 			profilesSection.appendChild(div);
// 			//console.log(inClass);
// 		} else {
// 			//console.log(`Student ${students[i].studentsName} is not in ${optionSelector.value} class.`)
// 			inClass = false;
// 			//console.log(inClass);
// 		}

		
// 		//data[i].studentsClass[0] === optionSelector.value
// 		if (inClass === true) {

// 		} 
// 	}
// 	hideButton.disabled = false;
// 	//profilesButton.disabled = true;
// }

function hideProfiles() {
	while (profilesSection.firstChild) {
		profilesSection.removeChild(profilesSection.firstChild);
	}
	hideButton.disabled = true;
	profilesButton.disabled = false;
}

//add event listeners
profilesButton.addEventListener('click', showProfiles)
hideButton.addEventListener('click', hideProfiles)



