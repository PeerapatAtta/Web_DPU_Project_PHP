        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #2d2a49;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                <a href='./index.php' style="color:#ffc900;" class="font1 navbar-brand">PanDrift</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">


                        <li class="nav-item">
                            <a class="nav-link" href="./board.php?Page=1">เว็บบอร์ด</a>
                        </li>
                    </ul>


                    <form class="form-inline mt-2 mt-md-0" method="post" action="./checkphp/check_search.php">
                        <input class="form-control mr-sm-3" type="text" placeholder="Search" aria-label="Search" name="Search" id="Search">
                        <button class="btn my-2 my-sm-0" id="search_b" type="submit">Search</button>
                    </form>
   
            
         <?php
                    if (isset($_SESSION['username'])) 
                    
                    {   
                    ?>

                     <form class="form-inline mt-2 mt-md-0">

                        &nbsp;
                        <font color="#ffc900"> ยินดีต้อนรับคุณ &nbsp;</font>
                        <font color="#ffc900">
                            <?php
                            echo   $_SESSION["username"];
                            ?>
                        </font>
                        &nbsp;&nbsp;

                        <a class="logout" href="./checkphp/logout.php">ออกจากระบบ</a>


                    </form>


                    <?php
                    } 
                    else {
                    ?>
                    <form class="form-inline mt-2 mt-md-0">

                    <a class="font1 nav-link" href="./login.php">เข้าสู่ระบบ</a>

                    </form>

                    <?php
                    }
                    ?>








                </div>
            </nav>
        </header>
        <!-- Header -->