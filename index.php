<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>felicity</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/sty.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->

   <!-- end loader -->
   <!-- header -->
   
      <!-- header inner -->
      
         
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <section class="banner_main">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="text-bg">
                  <div class="padding_lert">
                     <h1>WELCOME TO HOTEL FELICITY</h1>
                    <center> <a href="login.php">Log In</a> </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end banner -->
   <!-- form_lebal -->

   <!-- end form_lebal -->
   <!-- choose  section -->


   <?php


   include "dbconfig.php";


   // Add the SQL query to retrieve multiple rooms
   $query = "SELECT * FROM add_rooms WHERE room_id ";
   $result = mysqli_query($connection, $query);

   // Check if any rooms were found
   if (!$result || mysqli_num_rows($result) == 0) {
      echo "No rooms found.";
      exit();
   }

   ?>

   <!DOCTYPE html>
   <html>

   <head>
      <meta charSet="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <title>Room Booking</title>
      <link rel="stylesheet" href="./CSS/room.css">
      <link rel="stylesheet" href="./CSS/style.css">
      <link rel="stylesheet" href="./CSS/food.css">
      <link rel="stylesheet" href="./CSS/manage.css">
      <link rel="stylesheet" href="./CSS/nav.css">
      <link rel="stylesheet" href="./CSS/search.css">
      <script src="./JS/search.js"></script>
   </head>

   <body>
            <main>
        

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form class="form_book" method='POST' action=''>
          <div class="row room-search-panel">
            <div class="col-md-3">
              <label class="date" for="room_type">Room Type:</label>
              <select class="book_n" name="room_type">
                <option value="">--- Select Room Type ---</option>
                <?php
                  while ($room_data = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $room_data['room_type'] . "'>" . $room_data['room_type'] . "</option>";
                  }
               
                ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="date">CHECKIN DATE</label>
              <input class="book_n" name="start_date" type="date">
            </div>
            <div class="col-md-3">
              <label class="date">CHECKOUT DATE</label>
              <input class="book_n" name="end_date" type="date">
            </div>
            <div class="col-md-3">
              <input class="book_btn" type='submit' name='search' value='Search Rooms' onclick="hideRoomSearchPanel()">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <button class="book_btn back-to-search-btn" href="index.php" style="display:none;">Back To Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<br>
<br>
<br>
<br>
<?php
         include('dbconfig.php');

         if (isset($_POST['search'])) {
            $room_type = $_POST['room_type'];
            $checkin_date = $_POST['start_date'];
            $checkout_date = $_POST['end_date'];

            $query = "SELECT * FROM add_rooms WHERE room_type LIKE '%$room_type%' AND available = '1' AND room_id NOT IN (
                    SELECT room_id FROM rooms WHERE (
                        start_date >= '$checkin_date' AND start_date < '$checkout_date' 
                        OR end_date > '$checkin_date' AND end_date <= '$checkout_date' 
                        OR start_date < '$checkin_date' AND end_date > '$checkout_date'
                    )
                )";
         } else {
            $query = "SELECT * FROM add_rooms WHERE available = '1'";
         }

         $result = mysqli_query($connection, $query);

         if (mysqli_num_rows($result) > 0) {
            // Display the available rooms

            if (isset($_POST['search'])) {
               $selected_room_type = $_POST['room_type'];
               $selected_checkin_date = $_POST['start_date'];
               $selected_checkout_date = $_POST['end_date'];
               echo "You selected: " . $selected_room_type . ", Check-in date: " . $selected_checkin_date . ", Check-out date: " . $selected_checkout_date;
            }
            else{
               echo "Available Rooms";
            }
         }
         ?>

            <main>
               <hr>
               <?php
               $result = mysqli_query($connection, $query);

               // Loop through the rooms and display their information
               while ($room_data = mysqli_fetch_assoc($result)) {
               ?>
                  <div class="room-list" style="padding: 10px; background: #566573; color: black;">
                     <?php if (isset($room_data['room_image_url'])) : ?>
                        <img src="<?php echo $room_data['room_image_url']; ?>">
                     <?php endif; ?>
                     <ul id="url">
                        <li>
                           

                              <?php if (isset($room_data['room_type'])) : ?>
                                 <h3>Room Type : <?php echo $room_data['room_type']; ?></h3>
                              <?php endif; ?>
                              <?php if (isset($room_data['room_description'])) : ?>
                                 <p>Description: <?php echo $room_data['room_description']; ?></p>
                              <?php endif; ?>

                              <?php if (isset($room_data['room_facilities'])) : ?>
                              Facilities
                                    
                                    <?php foreach (explode(',', $room_data['room_facilities']) as $facility) : ?>
                        <li>◘ <?php echo $facility; ?></li>
                     <?php endforeach; ?>



                  <?php endif; ?>
                  <?php if (isset($room_data['room_id'])) : ?>
                     <input type="hidden" name="room_id" value="<?php echo $room_data['room_id']; ?>">
                  <?php endif; ?>
                  <input type="hidden" id="customer_name" name="customer_name" value="<?php echo $_SESSION['username']; ?>" placeholder="Enter your name" required>
                  <?php if (isset($room_data['room_type'])) : ?>
                     <input type="hidden" id="room_type" name="room_type" value="<?php echo $room_data['room_type']; ?>">
                  <?php endif; ?>
                  <?php if (isset($room_data['room_price'])) : ?>
                     <input type="hidden" name="price" id="price" value="<?php echo $room_data['room_price']; ?>">
                     <br>
                     <p>Price : <?php echo $room_data['room_price']; ?> &#8377;Only Per Nights</p>
                  <?php endif; ?>
                  <p style="color: red;">(No Refund On Cancelation)</p>
                 <button class="btn-form"> <a href="login.php">Book Now</a></button>
                  </li>
                     </ul>
                  </div>
                  </div>

               <?php } ?>
            </main>
            <?php
            // Loop through the rooms and display their information
            while ($room_data = mysqli_fetch_assoc($result)) {
            ?>

            <?php } ?>
      </main>

   </body>

   </html>

   <style>
      body {
         margin: 0;
         padding: 0;
         font-family: Arial, sans-serif;
      }


      h1 {
         margin: 0;
      }

      img {
         height: -webkit-fill-available;
      }

      main {
         padding: 1rem;
      }

      .room-list {
         background-color: rgb(187, 123, 19);
         margin: 10px;
         height: 470px;
      }

      h2 {
         margin-bottom: 1rem;
      }

      #url {
         list-style: none;
         padding: 0;
         margin: 0;
         width: 50%;
      }

      li.roominfo {
         padding: 1rem;
         margin-bottom: 1rem;
         margin-left: 10px !important;
         margin-right: 194px;
      }

      font {
         display: none;
      }

      h3 {
         margin: 0 0 0.5rem;
      }

      .facilities {
         margin-top: 1rem;
      }

      .fc {
         padding: 0;
         margin: 0 18vh 0px -1vh;
      }

      .fc li {
         margin-bottom: 0.5rem;
      }

      form {
         margin: fit-content;
      }

      label {
         display: block;
         margin-bottom: 0.5rem;
      }

      input[type="text"],
      input[type="date"] {
         padding: 0.5rem;
      }

      .btn-form{
         padding: 0.2rem 1rem;
         background-color: #333;
         color: #fff;
         border: none;
         cursor: pointer;
      }
      .btn-form a{
         color: #fff;
      }


      @media (max-width: 575px) {
         img {
            height: 52vw;
         }

         .room-list {
            background-color: rgb(187, 123, 19);
            margin: 10px;
            height: 570px;
         }

         #url {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-right: -13px;
         }
      }
   </style>


   <body>
      <!-- end about -->
      <!-- testimonial -->
      <footer id="contact">
   <div class="testimonial">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Latest Feedbacks</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div id="feedback-carousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
  <?php
  // Retrieve feedback from the database
  include "dbconfig.php";
$sql =" SELECT feedback.room_id, feedback.rating, feedback.comment, add_rooms.room_type
FROM feedback
INNER JOIN add_rooms
ON feedback.room_id = add_rooms.room_id";

  $result = mysqli_query($connection, $sql);
  $count = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $active = "";
    if ($count == 0) {
      $active = "active";
    }
    echo "<div class='carousel-item $active'>";
    echo "<div class='container'>";
    echo "<div class='carousel-caption'>";
    echo "<div class='test_box'>";
    echo "<h4>" . $row['room_type'] . " - Room " . $row['room_id'] . "</h4>";
    echo "<i>";
  for ($i = 1; $i <= 5; $i++) {
    if ($i <= $row['rating']) {
      echo "⭐";
    } else {
      echo "⚝";
    }
  }
  echo "</i>";
    echo "<p>" . $row['comment'] . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    $count++;
  }
  mysqli_close($connection);
  ?>
</div>

   
   <a class="carousel-control-prev" href="#feedback-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#feedback-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
   </a>
</div>
               </div>
            </div>
         </div>


               <!-- end testimonial -->
               <!--  footer -->

               <div class="footer">

                  <div class="copyright">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <p>Copyright 2023 All Right Reserved By <a href="https://blackarch0.github.io/ARPortfolio/"> Group 39</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/po/min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>

</html>