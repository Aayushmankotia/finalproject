<?php

include 'configer.php';
$sql = "SELECT * FROM categories WHERE category = 'MEN' ORDER BY category_type, category_name";
$result = mysqli_query($conn, $sql);

// Group categories by category type and name
$grouped_categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $category_type = $row['category_type'];
    $category_name = $row['category_name'];
    if (!isset($grouped_categories[$category_type])) {
        $grouped_categories[$category_type] = array();
    }
    $grouped_categories[$category_type][] = $category_name;
}

// Display categories in a table grouped by category type and name
echo '<table>';
echo '<tr>';
foreach ($grouped_categories as $category_type => $category_names) {
    echo '<td valign="top">';
    echo "<h5 class='green_heading'>".$category_type.'</h5><br>';
    foreach ($category_names as $category_name) {
        echo '<a href="men.php?name='.$category_name.'">'.$category_name.'</a><br>';
    }
    echo '</td>';
}
echo '</tr>';
echo '</table>';



// <div class="green">

// <a class="link greendrop" href="men.php">MEN</a>
// <section class="hidden_menu_green hidden_menu">
//   <span class="dropspan">
//     <ul class="dropdown-menu">
//       <h5 class="green_heading">Topwear</h5>
//       <li><a href="men.php">T-Shirts</a></li>
//       <li><a href="men.php">Casual Shirts</a></li>
//       <li><a href="men.php">Formal Shirts</a></li>
//       <li><a href="men.php">Jackets</a></li>
//       <li><a href="men.php">Rain Jackets</a></li>
//       <li><a href="men.php">Jackets</a></li>
//     </ul>
//   </span>
//   <span class='dropspan'>
//     <ul class="dropdown-menu">
//       <h5 class="green_heading">Bottomwear</h5>
//       <li><a href="men.php">Jeans</a></li>
//       <li><a href="men.php">Casual Trousers</a></li>
//       <li><a href="men.php">Formal Trousers</a></li>
//       <li><a href="men.php">Jeans</a></li>
//       <li><a href="men.php">Shorts</a></li>
//       <li><a href="men.php">Track Pants & Joggers</a></li>

//     </ul>
//   </span>
//   <span class='dropspan'>
//     <ul class="dropdown-menu">
//       <h5 class="green_heading">Footwear</h5>
//       <li><a href="men.php">Formal Shoes</a></li>
//       <li><a href="men.php">Sports Shoes</a></li>
//       <li><a href="men.php">Sneakers</a></li>
//       <li><a href="men.php">Sandals & Floaters</a></li>
//       <li><a href="men.php">Flip Flops</a></li>
//       <li><a href="men.php">Socks</a></li>

//     </ul>
//   </span>
// </section>
// </div>






// $sql = "SELECT * FROM categories WHERE category = 'WOMEN' ORDER BY category_type, category_name";
// $result = mysqli_query($conn, $sql);

// // Group categories by category type and name
// $grouped_categories = array();
// while ($row = mysqli_fetch_assoc($result)) {
//     $category_type = $row['category_type'];
//     $category_name = $row['category_name'];
//     if (!isset($grouped_categories[$category_type])) {
//         $grouped_categories[$category_type] = array();
//     }
//     $grouped_categories[$category_type][] = $category_name;
// }

// // Display categories in a table grouped by category type and name
// echo '<table>';
// echo '<tr>';
// foreach ($grouped_categories as $category_type => $category_names) {
//     echo '<td valign="top">';
//     echo '<strong>'.$category_type.'</strong><br>';
//     foreach ($category_names as $category_name) {
//         echo $category_name.'<br>';
//     }
//     echo '</td>';
// }
// echo '</tr>';
// echo '</table>';
?>
