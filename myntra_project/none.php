<?php
session_start();

include "configer.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Order Page</title>  
    <style>
*{
    box-sizing: border-box;
}
.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="number"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  display: block;
  margin: 0 auto;
  padding: 10px 20px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}

        </style>
  </head>
  <body>
    <div class="container">
      <h1>Order Details</h1>
      <form action="#" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="pincode">Pincode</label>
          <input type="text" id="pincode" name="pincode" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input type="text" id="state" name="state" required>
        </div>
        <div class="form-group">
          <label for="product">Product</label>
          <input type="text" id="product" name="product" required>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" id="price" name="price" required>
        </div>
        <button type="submit">Place Order</button>
      </form>
    </div>
  </body>
</html>
