<div class="header flex">
        <div class="logoDiv">
          <a href="../frontend/Index.php">  <h1 class="logo">CarPoint</h1></a>
        </div>

         <div class="navBar" id="navBar">
           <ul class="navList">
                <li class="navItems"><a href="Index.php" class="navLink">Home</a></li>
                <li class="navItems"><a href="showroom.php" class="navLink">Cars</a></li>
                <li class="navItems"><a href="#reviews" class="navLink">Reviews</a></li>
                
            </ul>

            <div class="loginRegisterDiv smallDevices flex">
                <a href="signup.php">
                 <button class="btn navLink registerBtn">Profile</button>
                </a>
                <a href="login.php">
                  <button class="btn navLink loginBtn">Login</button>
                </a>
            </div>

              <!-- Icon to show close on smaller screen -->
            <div class="closeNavbar" id="closeNavbar">
                <i class="uis uis-times-circle icon"></i>
            </div>
         </div>

         <div class="loginRegisterDiv largerDevices flex">
           <a href="signup.php">
            <button class="btn navLink registerBtn">Register</button>
           </a>
            <a href="login.php">
              <button class="btn navLink loginBtn">Login</button>
            </a>
         </div>

        <!-- Icon to show navBar on smaller screen -->
         <div class="toggleBtn" id="toggleBtn">
            <i class="uis uis-align-center-justify icon"></i>
        </div>
    </div>