//call AJAX for students
	let request = new XMLHttpRequest();
	let method = "GET";
	let url = "includes/fetchStudentData.php";
	let async = true;
	let students;
	
	//open request
	request.open(method, url, async);
	//send AJAX request
	request.send();
	request.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			students = JSON.parse(this.responseText);
			for (i = 0; i < students.length; i++) {
				//turn students class lists into array
				students[i].studentsClass = students[i].studentsClass.split(',');
				//turn students token amount into number
				students[i].studentsTokens = Number(students[i].studentsTokens);
				//turn students happy faces into number
				students[i].studentsFaces = Number(students[i].studentsFaces);
			}
			
			console.log(students);//for debugging
			//in the example, they populate the table 
			//immediately in response to the success
			//if I want to have a 
			//show profiles button
			//I need to capture that variable
			//at the global level
			

		}


	}
	
	


	