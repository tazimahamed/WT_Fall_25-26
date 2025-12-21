<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <style>
            .error{color:red;}
            </style>
            </head>

<body>
    <h1>Wwlcome to Registration</h1>
    <?php
    $name=$email=$gender="";
    $degrees=[];
$nameErr=$emailErr=$genderErr=$degreeErr="";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[A-Za-z .-]+$/", $name)) {
            $nameErr = "Only letters, spaces, dot and dash allowed";
        } elseif (str_word_count($name) < 2) {
            $nameErr = "Name must contain at least two words";
        }
    

    }
    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if(empty($_POST["gender"])){
        $genderErr="Gender is required";

    }
    else{
        $gender=test_input($_POST["gender"]);
    }

if(empty($_POST["degree"])){
    $degreeErr="At least two degree must be selected";
}
else{
    $degrees=$_POST["degree"];
    if(count($degrees)<2){
        $degreeErr="At least two degrees must be selected";
    }
    }
}
function test_input($data){
    return trim($data);
}
?>
<form method ="post" action="">
Name:<input type="text" name="name" value="<?php echo $name; ?>">
    <span class ="error"><?php echo $nameErr;?></span><br><br>
    Email: <input type="text" name="email" value="<?php echo $email; ?>">
<span class="error"><?php echo $emailErr; ?></span><br><br>

Gender:
<input type="radio" name="gender" value="Male" <?php if ($gender=="Male") echo "checked"; ?>> Male
<input type="radio" name="gender" value="Female" <?php if ($gender=="Female") echo "checked"; ?>> Female
<input type="radio" name="gender" value="Other" <?php if ($gender=="Other") echo "checked"; ?>> Other
<span class="error"><?php echo $genderErr; ?></span><br><br>
Degree:<br>
<input type="checkbox" name="degree[]" value="SSC" <?php if (in_array("SSC", $degrees)) echo "checked"; ?>> SSC
<input type="checkbox" name="degree[]" value="HSC" <?php if (in_array("HSC", $degrees)) echo "checked"; ?>> HSC
<input type="checkbox" name="degree[]" value="BSc" <?php if (in_array("BSc", $degrees)) echo "checked"; ?>> BSc
<input type="checkbox" name="degree[]" value="MSc" <?php if (in_array("MSc", $degrees)) echo "checked"; ?>> MSc
<span class="error"><?php echo $degreeErr; ?></span><br><br>

<input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($nameErr) && empty($emailErr) &&
    empty($genderErr) && empty($degreeErr)) {

    echo "<h3>Your Input:</h3>";
    echo "Name: ".$name."<br>";
    echo "Email: ".$email."<br>";
    echo "Gender: ".$gender."<br>";
    echo "Degree: ".implode(", ", $degrees)."<br>";
}
?>

</body>
</html>
