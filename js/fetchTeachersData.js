//create reference to the selector and the user unique ID
//create a for loop that:
//checks for the usersID
//and finds that user's Class list
//and goes through that array
//making options for the selector
//so teachers can only call classes they create
//call AJAX for teachers
//prepare variables

const selector = document.getElementById('class-options');
// i should be able to use PHP to get the user name
// i need to change so many of these methods to php in order to write them in a more clean way
const userID = document.getElementById('name-span');
let teachers;
let students;
let classes;
let classNames = [];
let classUids = [];

//try again with fetch
//fetch teacher data
fetch('includes/fetchTeacherData.php')
 .then(response => response.json())
 .then(data => teachers = data)
 .then(function(teachers) {
 	console.log(teachers);
 })
 //fetch student data
 fetch('includes/fetchStudentData.php')
 .then(response => response.json())
 .then(data => students = data)
 .then(function(students) {
 	console.log(students);
 })
//fetch class data
 fetch('includes/fetchClassesData.php')
  .then(response => response.json())
   .then(data => classes = data)
   .then(function(classes) {
   	console.log(classes);
   }).then(function() {

   	// this for loop is basically fulfilling the function of .filter 
   	for (i = 0; i < classes.length; i++) {
				if (classes[i].classesTeacheruid !== userID.textContent) {
					idFound = false;
				} else {
					idFound = true;
					count = i;
				}

				if (idFound === true) {
					classNames.push(classes[count].classesName)  ;
					classUids.push(classes[count].classesUid);
				}
			}
   }).then(function() {
 	for (i = 0; i < classNames.length; i++) {
				const option = document.createElement('option');
			    option.textContent = classNames[i];
			    option.value = classNames[i];
			    studentClassSelector.appendChild(option);
			}
 }).then(function() {
 	for (j = 0; j < classNames.length; j++) {
			const option = document.createElement('option');
			option.textContent = classNames[j];
			option.value = classNames[j];
			selector.appendChild(option);
		}
 	
 })








/*
let request2 = new XMLHttpRequest();
let method2 = "GET";
let url2 = "includes/fetchTeacherData.php";
let async2 = true
let teachers;


var idFound;
var count;

*/

/*
//open request
request2.open(method2, url2, async2);
//send the request
request2.send();
request2.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		teachers = JSON.parse(this.responseText);
		console.log(teachers);
		for (i = 0; i < teachers.length; i++) {
				teachers[i].usersClassname = teachers[i].usersClassname.split(',');
				teachers[i].usersClassuid = teachers[i].usersClassuid.split(',');
			}

		console.log(classNames);
		console.log(classNames.length);
		for (j = 0; j < classNames.length; j++) {
			const option = document.createElement('option');
			option.textContent = classNames[j];
			selector.appendChild(option);
		}
	/*for (i = 0; i < teachers.length; i++) {
		//first find which index has 
		if (userID.textContent !== teachers[i].usersUid) {
			idFound = false;
		} else {
			idFound = true;
			count = i;
		}	
		if (idFound === true) {
		}
	}*/
	/*}*/

/*	//search through teachers for ID*/

//option.textContent = teachers[count].usersClassname[j];


	/*
}*/
