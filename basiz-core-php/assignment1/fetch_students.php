<?php
include "../db/database.php";
$result = $conn->query("SELECT * FROM students");
echo "<table class='table table-bordered'>
<tr><th>Name</th><th>Standard</th><th>DOB</th><th>Age</th><th>Mobile</th><th>Email</th></tr>";
while($row=$result->fetch_assoc()){
    echo "<tr>
        <td>{$row['name']}</td>
        <td>{$row['standard']}</td>
        <td>{$row['dob']}</td>
        <td>{$row['age']}</td>
        <td>{$row['father_mobile']}</td>
        <td>{$row['email']}</td>
    </tr>";
}
echo "</table>";
