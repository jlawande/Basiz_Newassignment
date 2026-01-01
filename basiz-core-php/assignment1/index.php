<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .error-color{
      color: red;
    }
</style>
</head>

<body class="container mt-4">

<h3>Add Student</h3>

<form id="studentForm" novalidate>

    <div class="mb-2">
        <label for="name">Student Name</label> <span class="error-color">*</span>
        <input type="text" name="name" id="name" class="form-control" placeholder="enter Full Name">
        <small class="text-danger" id="err_name"></small>
    </div>

    <div class="mb-2">
        <select name="gender" id="gender" class="form-control">
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>
    </div>

    <div class="mb-2">
        <label for="name">Student Standard</label> <span class="error-color">*</span>
        <input type="text" name="standard" id="standard" class="form-control" placeholder="Enter Standard">
        <small class="text-danger" id="err_standard"></small>
    </div>

    <div class="mb-2">
        <label for="name">Student D.O.B.</label> <span class="error-color">*</span>
        <input type="date" name="dob" id="dob" class="form-control">
        <small class="text-danger" id="err_dob"></small>
    </div>

    <div class="mb-2">
        <input type="text" name="age" id="age" class="form-control" placeholder="Age" readonly>
        <small class="text-danger" id="err_age"></small>
    </div>

    <div class="mb-2">
        <input type="text" name="father_name" class="form-control" placeholder="Father Name">
    </div>

    <div class="mb-2">
        <label for="name">Father Mobile Number</label> <span class="error-color">*</span>
        <input type="text" name="father_mobile" id="father_mobile"
               class="form-control" placeholder="Enter Father Mobile Number" maxlength="10">
        <small class="text-danger" id="err_mobile"></small>
    </div>

    <div class="mb-2">
        <label for="name">Email ID</label> <span class="error-color">*</span>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
        <small class="text-danger" id="err_email"></small>
    </div>

    <button class="btn btn-primary">Save</button>
</form>

<hr>
<h4>Student List</h4>
<div id="studentTable"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
// ---------- AUTO AGE ----------
$("#dob").on("change", function () {
    let dob = new Date(this.value);
    let today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    $("#age").val(age);
});

// ---------- MOBILE NUMERIC ONLY ----------
$("#father_mobile").on("input", function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// ---------- FORM VALIDATION ----------
$("#studentForm").submit(function(e){
    e.preventDefault();
    let valid = true;

    $(".text-danger").text(""); // clear errors

    let name = $("#name").val().trim();
    let standard = $("#standard").val().trim();
    let dob = $("#dob").val();
    let age = $("#age").val();
    let mobile = $("#father_mobile").val();
    let email = $("#email").val().trim();

    if(name === ""){
        $("#err_name").text("Name is required");
        valid = false;
    }

    if(standard === ""){
        $("#err_standard").text("Standard is required");
        valid = false;
    }

    if(dob === ""){
        $("#err_dob").text("Date of Birth is required");
        valid = false;
    }

    if(age === ""){
        $("#err_age").text("Age is required");
        valid = false;
    }

    if(!/^[0-9]{10}$/.test(mobile)){
        $("#err_mobile").text("Enter only nummeric valid 10 digit mobile number");
        valid = false;
    }

    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
        $("#err_email").text("Enter valid email address");
        valid = false;
    }

    if(!valid) return;

    // ---------- AJAX SUBMIT ----------
    $.post("save_student.php", $(this).serialize(), function(){
        loadStudents();
        $("#studentForm")[0].reset();
    });
});

// ---------- LOAD STUDENTS ----------
function loadStudents(){
    $("#studentTable").load("fetch_students.php");
}
loadStudents();
</script>

</body>
</html>
