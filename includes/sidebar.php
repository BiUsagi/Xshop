<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Blog Search</h4>
            <form action="search.php" method="post">
                <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <button name="submit" class="btn btn-primary" type="submit">
                        <span class="bi bi-search"></span>
                    </button>
                </div>
            </form><!--search form-->
        </div>
    </div>
    


    <!-- Blog Categories Well -->
    <div class="card mb-4">


        <?php
            
            $query = "SELECT * FROM category";
            $select_category_sidebar = mysqli_query($conn, $query);
        
        ?>

        <div class="card-body">
            <h4 class="card-title">Blog Categories</h4>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled">

                        <?php
                            
                            while($row = mysqli_fetch_assoc($select_category_sidebar)){
                                $cat_title = $row['cat_title'];
                                echo "<li><a href='#'>". $cat_title ."</a></li>";
                            }
                    
                        ?>
                    </ul>
                </div>


<!--                 
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a></li>
                        <li><a href="#">Category Name</a></li>
                        <li><a href="#">Category Name</a></li>
                        <li><a href="#">Category Name</a></li>
                    </ul>
                </div>
 -->


            </div>
        </div>
    </div>




    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>