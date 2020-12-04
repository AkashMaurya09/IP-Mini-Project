<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>



    <link rel="stylesheet" href="/css/user/contact.css">
    <title>Contact</title>
</head>

<body>
    <?php 
    require('../../components/basic/header.php')
  ?>

    <div class="contact">
        <div class="top">
            <h1>Contact Us</h1>
            <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
        </div>
        <hr>
        <div>
            <div class="row">
                <div class="column">
                    <div class="row">
                        <div class="left-top">
                            <h1>Phone Number : 9967025541</h1>
                            <div class="list">
                                <p>Monday: 9am - 5:30pm</p>
                                <p>Tuesday: 9am - 5:30pm</p>
                                <p>Wednesday: 9am - 5:30pm</p>
                                <p>Thursday: 9am - 5:30pm</p>
                                <p>Friday: 9am - 5:30pm</p>
                                <p>Saturday: Please leave us a message!</p>
                                <p>Sunday: Please leave us a message!</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-middle">
                            <h1>Send Us A Message</h1>
                            <form class="contactForm">
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Phone Number">
                                <textarea row="300" cols="20" placeholder="Message"></textarea>
                                <input type="submit">
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-bottom">
                            <h1>Points of Contact</h1>
                            <div class="list">
                                <h4>Sales Team:</h4>
                                <p>sales@gymandfitness.com.au</p>
                                <h4>Help Team:</h4>
                                <p>help@gymandfitness.com.au</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="column">
                    <div class="row">
                        <div class="right-top">
                            <h1>Address</h1>
                            <div class="list">
                                <p>Adelaide Showroom</p>
                                <p>6/224 Main North Road, Prospect SA 5082</p>
                                <p>sales@gymandfitness.com.au </p>
                                <p>Phone: 1800 614 491</p>

                                <hr>

                                <p>Open hours:</p>
                                <p>Monday: 9am - 5pm</p>
                                <p>Tuesday: 9am - 5pm</p>
                                <p>Wednesday: 9am - 5pm</p>
                                <p>Thursday: 9am - 5pm</p>
                                <p>Friday: 9am - 5pm</p>
                                <p>Saturday: CLOSED</p>
                                <p>Sunday: CLOSED</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="map">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    function initMap() {
        var location = {
            lat: -24,
            lng: 34
        };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: location
        });
    }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOkVE0zosd-mMBLwREakk3DTlyfJhRVgY&callback=initMap"
        type="text/javascript"></script>

    <?php 
    require('../../components/basic/footer.php')
  ?>
</body>


</html>