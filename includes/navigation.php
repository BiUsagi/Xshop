<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                    $query = "SELECT * FROM category ";
                    $select_all_category_query = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_category_query)){
                        $cat_title = $row['cat_title'];
                        echo "<li class='nav-item'><a class='nav-link' href='#'>". $cat_title ."</a></li>";
                    }
                ?>

                <?php
                
                ?>

                
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>








                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>