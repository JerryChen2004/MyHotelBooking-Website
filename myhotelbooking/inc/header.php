        <!-- Navbar -->   
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">My Hotel Booking</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-2" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mb-2" href="review.php">Review</a>
                </li>
            </ul>
            
            <div class="button-container">
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- If user is logged in, show Profile button -->
                    <a href="profile.php"><button class="btn-profile"><img src="images/user/profile.svg" style="width: 30px; height: 30px;"></button></a>
                <?php else: ?>
                    <!-- If user is not logged in, show Login button -->
                    <a href="login.php"><button class="btn-login">Login</button></a>
                <?php endif; ?>
            </div>

        </div>
        </nav>
