<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>even</title>

<style>
    body{
        font-family: Arial;
        padding: 20px;
        background-color: #555;

    }
    h2{
        text-align:center;
        color:red;

    }
    form{
        
        background-color: #1965b6ff; 
        padding:20px;
        border-radius:10px;
        width:300px;
        margin:0 auto;
        box-shadow: 0 0 10px rgba(216, 44, 44, 0.4);
    }
    input,button{
        width:100%;
        padding:10px;
        border-radius:5px;
        margin-top:11px;
        border:1.5px solid #444;
    }
    button{
        background-color: #9a37e6ff;
        color:red;
        cursor:pointer;
    }
    button:hover{
        background-color: #343543;
    }
    #output{
        margin-top:10px;
        text-align:center;
        font-size: 14px;
        color: green;

    }
    #error{
        margin-top:10px;
        text-align:center;
        color:red;
    }
    </head>
    </style>
<body>
<h2> Participant Registration</h2>
   <form onsubmit="return tosubmit()">
   <label >Full Name </label>
   <input type="text"  id="name">
   <label >Email </label>
   <input type="text"  id="email" >
   <label >Phone Number </label>
   <input type="text"  id="phone" >
   <label>Password </label>
   <input type="password"  id="password"  >
   <label>Confirm password </label>
   <input type="password"  id="repassword" >
   <button type= "submit"> Regiter</button>
   </form>
   <div id="error"></div>
   <div id="output"></div>

   <form onsubmit="return add()">
    <h2>Active Selection</h2>
    <label>Active Name:</label>
    <input type="text" id="coursename" />
 
    <button type ="submit">Add Activity</button>
    <select id="addcourse">
        <option value="hello">Hello</option>
        <
        </select>
        </form>
   <script>
   function tosubmit(){
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var Phone = document.getElementById("phone").value.trim();
    var password = document.getElementById("password").value.trim();
    var repassword = document.getElementById("repassword").value.trim();
    var errorDiv = document.getElementById("error");

    var outputDiv=document.getElementById("output");


     errorDiv.innerHTML="";
     outputDiv.innerHTML="";

     
     if(name===""||email===""||phone===""||password===""||repassword===""){
   errorDiv.innerHTML="alert"
     return false;
     }
    
     
if(!email.includes("@")){
    errorDiv.innerHTML="email must be '@'";
    return false;
}
if(password !== repassword){
    errorDiv.innerHTML="not match";
    return false;
}
     
 outputDiv.innerHTML = `
        <b>Success!</b><br><br>
        Name: ${name}<br>
        Email: ${email}<br>
        Phone: ${phone}<br>
    `;

    return false;
   
   }
   </script>
</body>
</html