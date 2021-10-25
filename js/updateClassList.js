//<script src="js/updateClassList.js?<?php echo time(); ?>"></script>

//the first thing I need to do is
//capture the input value
//or text content
//and take the existing array, turn into string
//and concatenate



const newClassName = document.getElementById("addClassName");
const newClassUid = document.getElementById("addClassUid");
const updateButton = document.getElementById("updateClasses");

function updateClassList(e) {
	e.preventDefault();
	console.log(`The teachers username is ${userID.innerHTML}.`);

	let found;
	let count;


	for (i = 0; i < teachers.length; i++) {
		if (found === true) {
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

	let oldClassNames = teachers[count].usersClassname.join(',');
	let oldClassUids = teachers[count].usersClassuid.join(',');
	console.log(oldClassNames);
	console.log(oldClassUids);
	console.log(newClassName.value);
	console.log(newClassUid.value);

	let updateClassNames;
	let updateClassUids;

	updateClassNames = oldClassNames + "," + newClassName.value;
	updateClassUids = oldClassUids + "," + newClassUid.value;

	console.log(updateClassNames);
	console.log(updateClassUids);

	newClassName.value = "";
	newClassUid.value = "";

	//let classname = updateClassNames;
	//let classuid = updateClassUids;

	//create new XMLHttpRequest
	const xhr = new XMLHttpRequest();
	
	//open request
	xhr.open("POST", "includes/updateTeacherClasses.inc.php");
	//set content type and header
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("classname=updateClassNames&classuid=updateClassUids");

	//define onload event
	xhr.onload = function() {
		console.log("It worked!");
	};

}

updateButton.addEventListener('click', updateClassList)