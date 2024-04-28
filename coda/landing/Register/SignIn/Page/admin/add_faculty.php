<?php
include('tracking_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $coordinator = $_POST['coordinator'];

  // Insert faculty information into the database
  $insert_query = "INSERT INTO faculties (names, email, contact_no, coordinator, address, password) VALUES ('$name', '$email', '$contact', '$coordinator', '$address', '$password')";
  $insert_result = mysqli_query($conn, $insert_query);
  if ($insert_result) {
    // Redirect back to the page where the form was submitted
    header('Location: faculty.php');
    exit();
  } else {
    echo "Error adding faculty: " . mysqli_error($conn);
  }
} else {
  // Redirect to the homepage if the form was not submitted via POST method
  header('Location: /coda/landing/Register/SignIn/signin.php');
  exit();
}
?>
