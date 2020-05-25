<!DOCTYPE html>
<html>
<body>

<form>
    First name: <input type="text" id="first-name" /><br> <br> 
    Last name: <input type="text" id="last-name" /><br> <br> 
    Age:<input type="text" id="age" /><br> <br> 
    Gender:<select id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br> <br> 
    <button id="create" type="button">Create</button>
</form>

<p id="result"></p>

<script>
    var createButton = document.getElementById("create");
    createButton.addEventListener('click', createStudent);

    var students = [];
    function createStudent(){
        var firstName = document.getElementById("first-name").value;
        var lastName = document.getElementById("last-name").value;
        var age = document.getElementById("age").value;
        var gender = document.getElementById("gender").value;

        var student = {
            firstName: firstName,
            lastName: lastName,
            age: age,
            gender: gender,
            fullName: function(){
                return this.firstName + ' ' + this.lastName
            }
        }

        students.push(student);

        showResult(students);
    }

    function showResult(students){
        var html = '';
        students.forEach(function(student, index){
            html += 'No.: '+ index + ' - ';
            html += 'First name: '+ student.firstName + ' - ';
            html += 'Last name: '+ student.lastName + ' - ';
            html += 'Age: '+ student.age + ' - ';
            html += 'Gender: '+ student.gender + ' - ';
            html += 'Full name: '+ student.fullName() + '<br>';
        });

        document.getElementById("result").innerHTML = html;
    }
</script>

</body>
</html> 