<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>firstpage</title>

  </head>
  <body>

<div class="">
         
         <button id="dark-mode-btn">dark/light</button>
         
         </div>
<style>
#dark-mode-btn {
  position: fixed;
  top: 20px;
  right: 20px;
  background: #05031a;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}
.dark-mode {
  background: #07051a;
  color: rgb(10, 58, 189);
}

</style>

<script>
  const darkModeBtn = document.getElementById("dark-mode-btn");
const body = document.getElementsByTagName("body")[0];

darkModeBtn.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
});
  </script> 

</body>
</html>