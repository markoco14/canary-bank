//<script src="js/updateTeacherClassList.js?<?php echo time(); ?>">
//</script>

//update the teacher's class list
//trying to make an ajax request work
//or xmlhttprequest 
//I'm not really sure what's going on
//but let's see if this works



const updateButton = document.getElementById('updateClasses');
const nameInput = document.getElementById('addClassName');
const uidInput = document.getElementById('addClassUid');

let updateClassNames;
let updateClassUid;


let updateClassList = function() {
	//prevent the default reaction
	event.preventDefault();
	console.log(nameInput.value);
	console.log(uidInput.value);
	let found;
	let count;


	for (i = 0; i < teachers.length; i++) {
		if (found === true) {
			console.log("All done.");
			break; 
		}
		console.log(i)
		if (teachers[i].usersUid === userID.textContent) {
			found = true;
			count = i;

			console.log(`Found ${userID.textContent} at ${i}`);
			
		} else {
			found = false;
			console.log(`Didn't find ${userID.textContent} at ${i}`);
		}
	}

	teachers[count].usersClassname.push(nameInput.value);
	teachers[count].usersClassuid.push(uidInput.value);

	updateClassNames = teachers[count].usersClassname;
	updateClassUid = teachers[count].usersClassuid;

	console.log(updateClassNames);
	console.log(updateClassUid);

	for (i = 0; i < teachers.length; i++) {
		//first remove all selectors
		while (selector.firstChild) {
			selector.removeChild(selector.firstChild);
		}
	}

	const chooseOption = document.createElement('option');
	chooseOption.textContent = `Choose class:`
	selector.appendChild(chooseOption);

	for (j = 0; j < teachers[count].usersClassname.length; j++) 
	{
		const option = document.createElement('option');
		option.textContent = teachers[count].usersClassname[j];
		selector.appendChild(option);
	}

	//now I need to convert it back to a string
	//to ajax it

}

updateButton.addEventListener('click', updateClassList);