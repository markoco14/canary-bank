//create reference to the student class UID input
//and create reference to the student class name selector
//write a function that:
//attaches an event listener to the Class selector
//on "select" update the class UID input.value
//need to go to class names array
//find index position of that class name
//go to class uid array
//find the class uid at that index position
//set the class uid input value


const classUidInput = document.getElementById('classuid-value');
const studentClassSelector = document.getElementById("choose-class");

function inputClassUid() {
	if (studentClassSelector.value == 'Choose class:') {
		classUidInput.value = '';
	} else {
		let count;
		count = classNames.indexOf(studentClassSelector.value);
		classUidInput.value = classUids[count];
	}

}

studentClassSelector.addEventListener('change', inputClassUid)