<?php
session_start();
?>
<html>
    <head>
        <title>Phone Case Shop</title>
        <?php
        include "head.inc.php";
        ?>
    </head>
    <body> 
        <?php
        include "nav.inc.php";
        ?>
        <main class="container">
        <h1>Account Information</h1>
        <p>
            Your account detail below. 
        </p>
    
        <div class="container">
            <form action="action_page.php">

              <label for="fname">Name *</label>
              <input type="text" id="fname" Required name="firstname" placeholder="Your name..">

              <label for="lname">Phone Number *</label>
              <input type="text" id="phoneno" Required name="phoneno" placeholder="Phone number..">
              
               <label for="lname">Email *</label>
              <input type="text" id="email" Required name="email" placeholder="Email..">

              <label for="subject">Comment</label>
              <textarea id="comment" name="comment" placeholder="Write something.." style="height:200px"></textarea>

              <input type="submit" value="Submit">

            </form>
          </div>
        </main>        
    </body>
    <?php
        include "footer.inc.php";
    ?>
</html>

