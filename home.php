<?php include "auth.php";  ?>

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
   <link rel="stylesheet" href="nav.css">
   
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<style>
   
   h1 {
	margin: 0;
}
img{
	height: -webkit-fill-available;
}
main {
	padding: 1rem;
   font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.room-list {
	background-color: rgb(187, 123, 19);
	margin: 10px;
	height: 462px;
}

h2 {
	margin-bottom: 1rem;
}

#url {
	list-style: none;
	padding: 0;
	margin: 0;
	margin-right: 194px;
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
margin: 0 180px 0px -7px;
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

input[type="submit"] {
	padding: 0.5rem 1rem;
	background-color: #333;
	color: #fff;
	border: none;
	cursor: pointer;
}
.previous {
  background-color: #00000033;
  color: red;
}

.next {
  background-color: #00000033;
  color: white;
}
.btn-form {
    display: flex;
    align-items: center;
  }

  .btn-form input[type="button"] {
    margin-right: .5rem;
  }
	@media (max-width: 575px){
img{
	height: 52vw;
}
.room-list {
	background-color: rgb(187, 123, 19);
	margin: 10px;
	height: 500px;
}
#url {
	list-style: none;
	padding: 0;
	margin: 0;
	margin-right: -13px;
}
	}
</style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="./Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="./CSS/food.css">
  <link rel="stylesheet" href="./CSS/manage.css">


  <script src="angular.min.js"></script>
  <script src="angular-route.js"></script>

  <title>Hotel Managment System</title>
</head>

<body ng-app="myapp">
  <br>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="./Images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="./CSS/food.css">
  <link rel="stylesheet" href="./CSS/manage.css">


  <script src="angular.min.js"></script>
  <script src="angular-route.js"></script>

  <title>Hotel Managment System</title>
</head>

<body ng-app="myapp">
  <br>
  <nav style="width: 100%;
    height: 10px;
    margin-bottom: 48px;
    z-index: 1;
    position: fixed; top: 0;">
    <ul class="logo" href="#!home">
      <a href="home.php">
        <img src="./Images/logo.png" style="animation: hue-rotate 6s linear infinite; width: 64px; margin-top: -25px; height: 61px;">
      </a>
    </ul>
    <?php
    $host = "localhost";
    include("dbconfig.php");

 
   
    if (isset($_SESSION['username'])) {
      echo "<div class='dg'>";
      echo "<span style='font-family: Arial, sans-serif; padding: 8px;'>Hi, " . $_SESSION['username'] . "  </span>";
      echo "<form method='post' class='btn-form' action='logout.php'>
      <input type='submit' name='logout' value='Logout'> 
    </form>";
    echo "</div>";
    }
    ?>
    
    <ul class="m">
      <li id="ls"> <a class="nv" href="home.php">Home</a></li>
      <li id="ls"> <a class="nv" href="food.php">Food</a></li>
      <li id="ls"> <a class="nv" href="room.php">Room</a></li>
      <li id="ls"> <a class="nv" href="feedback.php">Feedback</a></li>
    </ul>
  </nav>
</header>

  <hr>
 
</body>
</html>


  
<body>
  <main>
    <h2 style="margin-bottom: 10px;">All Rooms</h2>
    <hr>
    <?php 
    include "dbconfig.php";

   
    
    // Add the SQL query to retrieve multiple rooms
    $query = "SELECT * FROM add_rooms WHERE room_id ";
    $result = mysqli_query($connection, $query);
    
    // Check if any rooms were found
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<p style='padding: 10px; background: #566573; color: black;'>No rooms found.</p>";
        exit();
    }
    
    ?>
    <main>
    
  <div id="room-carousel" class="carousel slide" data-ride="carousel">
  
    <div class="carousel-inner">
      <?php 
      // Loop through the rooms and display their information
      $first = true;
      while ($room_data = mysqli_fetch_assoc($result)) {
        ?>
        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
      

          <div class="room-list" style="padding: 10px; background: #566573; color: black;">
            <?php if(isset($room_data['room_image_url'])): ?>
              <img src="<?php echo $room_data['room_image_url']; ?>">
            <?php endif; ?>
            <ul id="url">
              <li>
                <form method="POST" action="logroom.php">
                  <?php if(isset($room_data['room_type'])): ?>
                    <h3>Room Type : <?php echo $room_data['room_type']; ?></h3>
                  <?php endif; ?>
                  <?php if(isset($room_data['room_description'])): ?>
                    <p>Description: <?php echo $room_data['room_description']; ?></p>
                  <?php endif; ?>
                  <?php if(isset($room_data['room_id'])): ?>
                    <input type="hidden" name="room_id" value="<?php echo $room_data['room_id']; ?>">
                  <?php endif; ?>
                  <?php if(isset($room_data['room_type'])): ?>
                    <input type="hidden" id="room_type" name="room_type" value="<?php echo $room_data['room_type']; ?>">
                  <?php endif; ?>
                  <?php if(isset($room_data['room_price'])): ?>
                    <input type="hidden" name="price" id="price" value="<?php echo $room_data['room_price']; ?>">
                    <p>Price : <?php echo $room_data['room_price']; ?> &#8377;Only</p>
                  <?php endif; ?>

                  <input type="button" value="Give Feedback" class="feedback-btn" data-roomid="<?php echo $room_data['room_id']; ?>">                </form>
              </li>
            </ul>
          </div>
        </div>
        <?php 
        $first = false;
      } 
      ?>
    </div>
    <a class="carousel-control-prev  previous" href="#room-carousel" role="button" data-slide="prev">&laquo; Previous
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next  next" href="#room-carousel" role="button" data-slide="next">Next &raquo;
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>

  </div>

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


</main>

<div class="modal fade" id="feedback-modal" tabindex="-1" role="dialog" aria-labelledby="feedback-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="feedback-modal-label">Leave Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="feedback-form" method="post" action="save_feedback.php">
  <input type="hidden" id="room_id" name="room_id" value="">
  <div class="form-group">
    <label for="feedback_rating">Rating:</label>
    <select class="form-control" id="feedback_rating" name="feedback_rating" required>
      <option value="">Select Rating</option>
      <option value="1">1 Star</option>
      <option value="2">2 Stars</option>
      <option value="3">3 Stars</option>
      <option value="4">4 Stars</option>
      <option value="5">5 Stars</option>
    </select>
  </div>
  <div class="form-group">
    <label for="feedback_comment">Comment:</label>
    <textarea class="form-control" id="feedback_comment" name="feedback_comment" rows="3" required></textarea>
    <input type="submit" value="Give Feedback">
  </div>
</form>

<!-- Display feedback from database -->


          </div>
<script>  
$(document).ready(function() {
  $('.feedback-btn').click(function() {
    var roomId = $(this).data('roomid');
    $('#room_id').val(roomId);
    $('#feedback-modal').modal('show');
  });
});


</script>

    <script src="js/jquery.min.js"></script>
   <script src="js/po/min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<footer> <p ><span style="display:flex; align-items:center; justify-content: center;"> &copy; Design By Group 39 </span></p> </footer>

  </div>
</body>

</html>
