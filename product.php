CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  quantity INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    <!-- Replace the example rows with data from your database -->
    <tr>
      <td>1</td>
      <td>Product A</td>
      <td>A short description of Product A</td>
      <td>$19.99</td>
      <td>100</td>
      <td>2023-03-25 09:00:00</td>
      <td>2023-03-25 09:00:00</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Product B</td>
      <td>A short description of Product B</td>
      <td>$24.99</td>
      <td>50</td>
      <td>2023-03-24 14:30:00</td>
      <td>2023-03-24 14:30:00</td>
    </tr>
    <!-- End of example rows -->
  </tbody>
</table>
