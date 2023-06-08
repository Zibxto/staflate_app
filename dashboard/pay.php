<?php
include '../config/db_conn.php';
include '../config/function.php';
include '../config/session.php';

$sql = query("SELECT user_id FROM payments WHERE user_id='$session_id'");
confirm($sql);
$result = fetch_array($sql);

if (mysqli_num_rows($sql) > 0) {
  header("location: index.php");

}


// if(isset($_GET['transaction'])){
//     if($_GET['transaction'] == 'cancelled') {
//         echo "<script>alert('Transaction cancelled')</script>";
//     }

// }


?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.png">
    <title>Staflate</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/addedstyle.css">
</head>

<body>

<!-- payment form -->
<a href="logout.php"><button>Logout</button></a>

<section class="h-100 gradient-custom">
  <div class="container py-5" style="box-shadow:0px 4px 4px 0px black">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Pay now to access the course</h5>

             <div class="alert alert-success" role="alert" style="padding: 0px; text-align: center;">
                    <?php 
                        if (isset($_SESSION['payment_failed'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['payment_failed']."</p>";
                            unset($_SESSION['payment_failed']);
                        }

                    ?>

          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Course
                <span>$7</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                </div>
                <span><strong>$7</strong></span>
              </li>
            </ul>

                <?php

                $sql_f = query("SELECT * FROM users WHERE id='$session_id'");
                confirm($sql_f);
                $row = fetch_array($sql_f);

                 ?>
            <form id="paymentForm">
              <input type="hidden" id="first-name" value="<?php echo $row['firstname']; ?>">
              <input type="hidden" id="last-name" value="<?php echo $row['lastname']; ?>">
              <input type="hidden" id="email-address" value="<?php echo $row['email']; ?>">
              <button type="submit" onclick="payWithPaystack()" class="btn btn-lg fw-bold btn-block" style="background-color: #0fa797; color: #ffffff">
              Continue
              </button>
            </form>
              <script src="https://js.paystack.co/v1/inline.js"></script>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end payment form -->


    <!-- footer -->
   <?php include '../layout/footer.php' ?>




   <script>
    const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: '', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: 10000 * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    // currency: 'USD' - only add this part if you are recieving money into a dom. account
    ref: 'MR'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
        window.location = "index.php?transaction=cancelled";
        alert('Transaction cancelled');
    },
    callback: function(response){
      let message = 'Payment Successful!';
      alert(message);
      window.location = "verify_transaction.php?reference=" + response.reference;
    }
  });

  handler.openIframe();
}
</script>
</body>

</html>   