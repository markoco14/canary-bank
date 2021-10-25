//call AJAX for classes
	let request3 = new XMLHttpRequest();
	let method3 = "GET";
	let url3 = "includes/fetchClassesData.php";
	let async3 = true;
	let classes;
	let classNames = [];
	let classUids = [];
	var idFound;
	var count;
	//open request
	request3.open(method3, url3, async3);
	//send AJAX request
	request3.send();
	request3.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			classes = JSON.parse(this.responseText);
			console.log(classes);//for debugging
			//in the example, they populate the table 
			//immediately in response to the success
			//if I want to have a 
			//show profiles button
			//I need to capture that variable
			//at the global level

			//create for loop that makes teachers class list
			//should be an object with class list
			//and class ID (so we can check students later)

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
		}
	}
	
	

