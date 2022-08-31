<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['username'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel=stylesheet href=style.css>
</head>
<body>
<?php
include 'config.php';
// define variables to empty values
$usernameErr = $passwordErr = $dobErr = $genderErr = $countryErr = $emailErr = $numberErr = $languageErr = "";
$username = $password = $dob = $gender = $country = $email = $number = $language = "";
//Input fields validation
$valid = true;
if (isset($_POST['submit'])) {
    //String Validation
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
        $valid = false;
        // echo '1'; exit;
        
    } else {
        $username = $_POST["username"];
        // check if username only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $usernameErr = "Only alphabets and white space are allowed";
            $valid = false;
            // echo '2'; exit;
            
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $valid = false;
        // echo '3'; exit;
        
    } else {
        $password = $_POST["password"];
        // check if username only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
            $passwordErr = "Only alphabets and numbers are allowed";
            $valid = false;
            // echo '4'; exit;
            
        }
    }
    //dob Validation
    if (empty($_POST["datedob"])) {
        $dobErr = "DOB is required";
        $valid = false;
        // echo '5'; exit;
        
    }
    //Empty Field Validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $valid = false;
        // echo '7'; exit;
        
    }
    //Country
    $country = ($_POST["country"]);
    
    //Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
        // echo '8'; exit;
        
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = false;
            // echo '9'; exit;
            
        }
    }
    //Number Validation
    if (empty($_POST["number"])) {
        $numberErr = "Mobile no is required";
        $valid = false;
        // echo '10'; exit;
        
    } else {
        $number = $_POST["number"];
        // check if mobile no is well-formed
        if (!preg_match("/^[0-9]*$/", $number)) {
            $numberErr = "Only numeric value is allowed.";
            $valid = false;
            // echo '11'; exit;
            
        }
        //check mobile no length should not be less and greator than 10
        if (strlen($number) != 10) {
            $numberErr = "Mobile no must contain 10 digits.";
            $valid = false;
            // echo '12'; exit;
            
        }
    }
    //Language Validation
    if (empty($_POST["language"])) {
        $languageErr = "Required";
        $valid = false;
        // echo '13'; exit;
        
    }
    if ($valid == true) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $encryptedpswd = md5($_POST["password"]);
        $dob = $_POST["datedob"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $language = implode(',', $_POST["language"]);
        //Database Insertion and Execution
        $sql = "insert into users(username,password,dob,gender,country,email,phone,language) values 
        ('$username','$encryptedpswd','$dob','$gender','$country','$email','$number','$language')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($result) {
            echo "<p id ='successreg'>User registration completed</p>";
            // header("location: index.php");
            
        } else {
            echo "<p id ='successreg'>User registration Not completed</p>";
        }
    }
}
?>  
    <div class="container col-md-6">
   <div class="heading">
       <h1>Register Here</h1>
    </div> 
    <div id="login">
    <a href="index.php"><button>Login</button></a>
    </div>
    <div class="main">
        <form id = "formvalid" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="on">
            <div class="user-details">
                <div class="input-box">
                    <span class="detials">User Name</span><br>
                        <input id="username" name="username" type="text" placeholder="Enter User Name">
                        <span class="error">* <?php echo $usernameErr; ?> </span>  
                        <br>
                </div>
                    
                
                    
                <div class="input-box">
                    <span class="details">Password</span> 
                        <input id="password" name="password" type="password" placeholder="Enter password here">
                        <span class="error">* <?php echo $passwordErr; ?> </span> 
                    <br>
                </div>
                   
                <div class="input-box" >
                    <span class="details">Date of Birth</span> 
                    <input id="" name="datedob" type="date" placeholder="DOB">
                    <span class="error">* <br><?php echo $dobErr; ?> </span>
                    <br>
                 </div>
                       
                    
                <div class="gender-details">
                    <input type="radio" value="M" class="error" name="gender" id="dot-1">
                    <input type="radio" value="F" class="error" name="gender" id="dot-2">
                    <input type="radio" value="O" class="error" name="gender" id="dot-3">
                    <span class="gender-title">Gender<span class="error"> *</span></span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Others</span>
                        </label>
                    </div>
                    <span class="error"><?php echo $genderErr; ?> </span>
                </div>
                    
                <div class="input-box">
                    <span class="details">Country</span> 
                        <select id="country" name="country">
                             <option value = "india">India</option>
                             <option value = "america">America</option>
                             <option value = "germany">Germany</option>
                             <option value = "africa">Africa</option>
                             <option value = "pakistan">Pakistan</option>
                        </select>
                    <br>
                </div>
                <div class="input-box">
                   <span class="details">Email</span> 
                        <input id="email" name="email" type="email" placeholder="Enter Email">
                        <span class="error">* <?php echo $emailErr; ?> </span>  
                  <br>
                </div>
                <div class="input-box">
                   <span class="details">Phone</span> 
                        <input id="phone" name="number" type="number" placeholder="Enter Phone Number">
                        <span class="error">* <?php echo $numberErr; ?> </span>
                  <br>
                </div>
                <div class="chkbox">
                    <span class="details">Languages Known</span><br>
                  <input type="checkbox" id="C" name="language[]" value="C"/>    
                    <label class="details">C</label>   
                 <input type="checkbox" id="Java" name="language[]" value="Java"/>    
                    <label class="details">Java</label>    
                 <input type="checkbox" id="Python" name="language[]" value="Python"/>    
                    <label class="details">Python</label>  
                 <input type="checkbox" id="PHP" name="language[]" value="PHP"/>    
                    <label class="details">PHP</label>  
                    <span class="error">* <?php echo $languageErr; ?> </span>
                </div>
                    
            </div>
            <div class="button">
                <input  type="submit" name="submit" value="Register">
              </div>
        </form>
        <style>
            #successreg{
                color:darkgreen; 
                text-align:center;
                font-size:24px;
                font-weight:70px;
                font-family:"Times New Roman", Times, serif;
            }
            
            .error{
                color: red;
                font-weight: bold;
            }
            </style>


      
    </div>
    </div>  

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src = "register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>