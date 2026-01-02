<!DOCTYPE html>
<html>
<head>
<title>PHP Form Validation</title>
</head>
 
<body>
 
<h1>Welcome to Registration</h1>
 
<?php

// Initialize variables

$name = $email = $gender = $blood = "";

$dd = $mm = $yy = "";

$nameerr = $emailerr = $gendererr = $blooderr = $degreeerr = $dateerr = "";

$degree = [];
 
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Name validation

    if (empty($_POST["name"])) {

        $nameerr = "Name is required";

    } else {

        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {

            $nameerr = "Only letters and spaces allowed";

        }

    }
 
    // Email validation

    if (empty($_POST["email"])) {

        $emailerr = "Email is required";

    } else {

        $email = test_input($_POST["email"]);

        if (!preg_match("/@/", $email)) {

            $emailerr = "Email must contain @ symbol";

        }

    }
 
    // Gender validation

    if (empty($_POST["gender"])) {

        $gendererr = "Gender is required";

    } else {

        $gender = test_input($_POST["gender"]);

    }
 
    // Date validation

    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {

        $dateerr = "Date is required";

    } else {

        $dd = test_input($_POST["dd"]);

        $mm = test_input($_POST["mm"]);

        $yy = test_input($_POST["yy"]);
 
        if (!is_numeric($dd) || !is_numeric($mm) || !is_numeric($yy)) {

            $dateerr = "Date must be numeric";

        } elseif ($dd < 1 || $dd > 31) {

            $dateerr = "Day must be between 1 and 31";

        } elseif ($mm < 1 || $mm > 12) {

            $dateerr = "Month must be between 1 and 12";

        } elseif ($yy < 1953 || $yy > 1998) {

            $dateerr = "Year must be between 1953 and 1998";

        }

    }
 
    // Blood group validation

    if (empty($_POST["blood"])) {

        $blooderr = "Please select a blood group";

    } else {

        $blood = test_input($_POST["blood"]);

    }
 
    // Degree validation (at least two)

    if (empty($_POST["degree"])) {

        $degreeerr = "Select at least two degrees";

    } else {

        $degree = $_POST["degree"];

        if (count($degree) < 2) {

            $degreeerr = "Select at least two degrees";

        }

    }

}
 
// Function to clean input

function test_input($data)

{

    return trim($data);

}

?>
 
<form method="post" action="">
 
    Name:
<input type="text" name="name" value="<?php echo $name; ?>">
<span style="color:red;"><?php echo $nameerr; ?></span>
<br><br>
 
    Email:
<input type="text" name="email" value="<?php echo $email; ?>">
<span style="color:red;"><?php echo $emailerr; ?></span>
<br><br>
 
    Gender:<br>
<input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>> Male
<input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female
<input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?>> Other
<br>
<span style="color:red;"><?php echo $gendererr; ?></span>
<br><br>
 
    Date of Birth:<br>
<input type="text" name="dd" size="2" value="<?php echo $dd; ?>"> /
<input type="text" name="mm" size="2" value="<?php echo $mm; ?>"> /
<input type="text" name="yy" size="4" value="<?php echo $yy; ?>">
<br>
<span style="color:red;"><?php echo $dateerr; ?></span>
<br><br>
 
    Blood Group:<br>
<select name="blood">
<option value="">Select</option>
<option value="A+" <?php if($blood=="A+") echo "selected"; ?>>A+</option>
<option value="A-" <?php if($blood=="A-") echo "selected"; ?>>A-</option>
<option value="B+" <?php if($blood=="B+") echo "selected"; ?>>B+</option>
<option value="B-" <?php if($blood=="B-") echo "selected"; ?>>B-</option>
<option value="O+" <?php if($blood=="O+") echo "selected"; ?>>O+</option>
<option value="O-" <?php if($blood=="O-") echo "selected"; ?>>O-</option>
<option value="AB+" <?php if($blood=="AB+") echo "selected"; ?>>AB+</option>
<option value="AB-" <?php if($blood=="AB-") echo "selected"; ?>>AB-</option>
</select>
<br>
<span style="color:red;"><?php echo $blooderr; ?></span>
<br><br>
 
    Degree:<br>
<input type="checkbox" name="degree[]" value="SSC"> SSC
<input type="checkbox" name="degree[]" value="HSC"> HSC
<input type="checkbox" name="degree[]" value="BSC"> BSC
<input type="checkbox" name="degree[]" value="MSC"> MSC
<br>
<span style="color:red;"><?php echo $degreeerr; ?></span>
<br><br>
 
    <input type="submit" value="Submit">
 
</form>
 
<?php

// Display output if no error

if ($_SERVER["REQUEST_METHOD"] == "POST" &&

    empty($nameerr) &&

    empty($emailerr) &&

    empty($gendererr) &&

    empty($dateerr) &&

    empty($blooderr) &&

    empty($degreeerr)) {
 
    echo "<h3>Your Input:</h3>";

    echo "Name: $name <br>";

    echo "Email: $email <br>";

    echo "Gender: $gender <br>";

    echo "Date of Birth: $dd/$mm/$yy <br>";

    echo "Blood Group: $blood <br>";

    echo "Degree: " . implode(", ", $degree) . "<br>";

}

?>
 
</body>
</html>

 