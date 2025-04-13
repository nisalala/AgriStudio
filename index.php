<?php
session_start();
$loggedIn = isset($_SESSION['user']); // Check if the user is logged in
setcookie('user', '', time() - 3600, '/');

 
?>

<!DOCTYPE html>  

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AgriStudio</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .user-icon {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
      margin-top: -0.5rem;
    }
    .user-icon img {
      width: 40px;
      height: 40px;
      
    }

    .user-icon {
    position: relative;
    display: inline-block;
    cursor: pointer;
  }

  .user-icon img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }

  /* Dropdown Menu */
  .logout-menu {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-width: 100px;
    z-index: 10;
  }

  .logout-menu a {
    display: block;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    color: #000;
    font-size: 0.9rem;
  }

  .logout-menu a:hover {
    background-color: #f4f4f4;
    color: #333;
  }

  /* Show menu on hover */
  .user-icon:hover .logout-menu {
    display: block;
  }

  </style>
</head>
<body>
  <!-- Hero Section -->
  <div class="page1">
    <img src="img/cover.png" alt="cover" class="bgimg1">

    <!-- Navigation -->
    <div class="navigation">
      <a href="#page1"><img src="img/logo-modified.png" class="logo" /></a>
      <ul>
        <li><a href="#aboutus">ABOUT US</a></li>
        <li><a href="#gallery">GALLERY</a></li>
        <li><a href="#events">EVENTS</a></li>
        <li><a href="#contactus">CONTACT US</a></li>
        
  <?php if ($loggedIn) {
    $photo=$_SESSION['photo'];
    echo"
    <li>
    <!-- User Icon with Logout Menu -->
    <div class='user-icon'>
     <a href='user.php'> <img src='img/user.jpg' alt='User Icon'> </a>
      <div class='logout-menu'>
        <a href='logout.php'>Logout</a>
      </div>
    </div>
    </li>";
}
    ?>

      </ul>
      
    </div>

    <!-- Main Content -->
    <div class="title">
      <p style="font-weight: 500; font-size: 1.3rem; padding-left: 0.5rem; line-height: 2rem; margin-left: 0.6rem;">
      <img src="img/lucide/map-pin.png" alt="icon" style="padding-right:12px">Thecho, Lalitpur
      </p>
      <p style="font-weight: 800; font-size: 4rem; padding: 0.9rem; line-height: 2rem; margin: 0.6rem;">AGRI STUDIO</p>
      <p style="font-weight: 300; font-size: 1.7rem; padding-left: 5rem; line-height: 2rem; margin-left: 5rem;">Your farm getaway</p>
      <button class="btn" onclick="checkLogin()">CHECK IN</button>
    </div>
    <img src="img/socials.png" alt="socials" class="socials">
  
  </div>





    <!-- page2 -->
    <div class="page2 aboutUs" id="aboutus">
      <div class="about-text">
        <img src="img/./dot.png" alt="..." style="width: 10%" />
        <h1>ABOUT US</h1>

        <p>
          At Agristudio Nepal, we’re an eco-learning farm dedicated to bringing
          sustainable agriculture closer to people’s lives. We create unique,
          hands-on experiences where visitors can connect with farming and
          nature.
        </p>
        <p>
          Our farm is more than just a visit—it’s a community. Join us for
          seasonal events like the Harvest Festival, Children’s Farm Festival,
          or even an overnight stay i... <b style="color: green">Read More</b>
        </p>
      </div>
      <div class="about-img">
        <img src="img/./aboutUsimg.png" alt=".." / class="house">
      </div>
    </div>

    <!-- page3 -->
    <div class="page3">
      <img src="img/dot.png" alt="..." style="width: 7%" />
      <h1>ROOMS</h1>

      <button class="slider-btn prev-btn">
        <img src="img/prev.png" alt="" />
      </button>
      <div class="slider-container">
        <div class="slider-wrapper">
          <div class="slider">
            <!-- Room Images -->
            <div class="slide">
              <div>
                <img src="img/./room1.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p style="font-size: 18px"><b>For 2 people(Standard)</b></p>
                <p><b>Rs. 1200</b> per night</p>
              </div>
            </div>
            <div class="slide">
              <div>
                <img src="img/./room2.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p style="font-size: 18px"><b>For 2 people (Luxury)</b></p>
                <p><b>Rs. 1600</b> per night</p>
              </div>
            </div>
            <div class="slide">
              <div>
                <img src="img/./room3.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p style="font-size: 18px"><b>For 4 people (Group)</b></p>
                <p><b>Rs. 1800</b> per night</p>
              </div>
            </div>
            <div class="slide">
              <div>
                <img src="img/./room1.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p style="font-size: 18px"><b>For 2 people(Standard)</b></p>
                <p><b>Rs. 1200</b> per night</p>
              </div>
            </div>
            <div class="slide">
              <div>
                <img src="img/./room1.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p>For 2 people(Standard)</p>
                <p><b>Rs. 1200</b> per night</p>
              </div>
            </div>
            <div class="slide">
              <div>
                <img src="img/./room1.jpg" alt="room1" class="room-photo" />
              </div>
              <div class="room1down">
                <p>For 2 people(Standard)</p>
                <p><b>Rs. 1200</b> per night</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="slider-btn next-btn">
        <img src="img/prev.png" alt="" />
      </button>

      <div class="membership">
        <div class="membership-text">
          <img src="img/dot.png" alt="..." style="width: 30%" />
          <h2 style="font-size: 2rem; margin: 0.5rem 0">MEMBERSHIP</h2>
          <p style="font-weight: 300; font-size: 18px">
            Enjoy the perks of being core Agristudio family
          </p>
          <button class="btn" style="margin-top: 1.5rem">JOIN</button>
        </div>
        <img src="img/./logo.png" alt="logo" height="250px" />
      </div>
    </div>

    <!-- PAGE4 -->
    <div class="page4" id="gallery">
      <img src="img/page4img.png" alt="gardwn" height="800px" width="100%" />
      <div class="page4-text">
        <img src="img/dot.png" alt="..." />
        <h1>GALLERY</h1>
        <p class="gallery-text">
          Explore our gallery to experience the vibrant life, sustainable
          farming, and engaging events at Agristudio Nepal.
        </p>
        <button class="btn" style="padding: 0.5rem 1rem; margin-top: 1rem">
          VIEW PHOTOS
        </button>
      </div>
    </div>

    <!-- PAGE5 -->
    <div class="page5" id="events">
      <img src="img/dot.png" alt="..." />
      <h1>EVENTS</h1>
      <button class="slider-btn2 prev-btn2">
        <img src="img/prev.png" alt="" />
      </button>
      <div class="slider-container2">
        <div class="slider-wrapper2">
          <div class="slider2">
            <div class="slide2">
              <div class="event1">
                <img src="img/event1.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>STRAWBERRY PICK</h2>
                  <p><b>Rs.900</b> per kg</p>
                  <p><b>Duration: </b>May 4 - May 11</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event2.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>MEDITATION</h2>
                  <p><b>Rs.1200</b> per person</p>
                  <p><b>Duration: </b>1 night 2 days</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event3.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>ROPAI FESTIVAL</h2>
                  <p><b>Rs.500</b> per person</p>
                  <p><b>Duration: </b>June 25 - June 30</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event4.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>YOGA RETREAT</h2>
                  <p><b>Rs.1200</b> per PERSON</p>
                  <p><b>Duration: </b>3 nights 4 days</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event5.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>HARVEST FESTIVAL</h2>
                  <p><b>Rs.500</b> per person</p>
                  <p><b>Duration: </b>Aug 4 - Aug 11</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event1.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2></h2>
                  <p><b>Rs.900</b> per kg</p>
                  <p><b>Duration: </b>May 4 - May 11</p>
                </div>
              </div>
            </div>

            <div class="slide2">
              <div class="event1">
                <img src="img/event2.png" alt="event1" class="event-photo" />
                <div class="event-text">
                  <h2>STRAWBERRY PICK</h2>
                  <p><b>Rs.900</b> per kg</p>
                  <p><b>Duration: </b>May 4 - May 11</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="slider-btn2 next-btn2">
        <img src="img/prev.png" alt="" />
      </button>
    </div>

    <!---------------- paage6 ------------->
    <div class="page6">
      <div class="upcoming-event">
        <img src="img/dot.png" alt="..." />
        <h1>UPCOMING EVENT</h1>
        <p>
          At Agristudio, we host vibrant seasonal events that celebrate the
          farm’s rhythms inviting guests to connect with nature and the farming
          community
        </p>
        <div class="event-details">
          <h2>ROMANCING THE NATURE</h2>
          <div class="little-elements">
            <img src="img/calendar.png" alt="calendar" />
            <p>3 November</p>
            <img src="img/time.png" alt="time" />
            <p>19:00</p>
            <img src="img/money.png" alt="money" />
            <p>Rs.500</p>
          </div>
          <p>
            Is growing apart from our farm, our nature, and our home even
            possible? Will the chase for tall buildings, green notes, and
            avaricious life ever take us away from our origins?
          </p>
          <p>
            Eventually, the strength of our roots, the aroma of our soil, the
            zest of our crops, and the irrevocable connection of our hearts will
            bring us back to nature, back to our true home!
          </p>
          <button class="btn" style="padding: 0.7rem 2rem">JOIN</button>
          <button class="btn2">LEARN MORE</button>
        </div>
      </div>
      <img src="img/prajina.png" alt=prajina" class="page6-photo">
    </div>

    <!-- page7 ---------------->
    <div class="page7" id="contactus">
      <img src="img/contact.png" alt="contact" style="width: 100%" />
      <div class="contactus">
        <img src="img/dot.png" alt="..." />
        <h1>CONTACT US</h1>
        <p style="margin-bottom: 2rem">
          Get in touch with us to learn more, plan your visit, or join our next
          farm event!
        </p>
        <div class="contact-elements1" style="margin-left: 14.5rem">
          <img src="img/fb.png" alt="calendar" />
          <p>facebook</p>
          <img src="img/no.png" alt="time" />
          <p>+977 9841354854</p>
        </div>
        <div class="contact-elements2">
          <a href="https://www.instagram.com/agristudionepal/"><img src="img/ig.png" alt="calendar" /></a>
          <p>Instagram</p>
          <img src="img/em.png" alt="time" />
          <p>Email</p>
        </div>
      </div>
    </div>

    <script src="./slider.js"></script>

    <script>
      function checkLogin() {
        // Check if the user is logged in (server-side redirect)
        window.location.href = "check_login.php";
      }
    </script>
  </body>
</html>
