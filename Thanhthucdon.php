
<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
       <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>Stocker</h1>
       <!--<img src="NguoiDung/img/logo.png" class="img-fluid w-100" alt="Image">-->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <?php 
                $sql = 'SELECT * FROM Menu where MucDo = 1 and MaQuyen = 2';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cha = $row['IDMenu'];
                        $sql1 = "SELECT * FROM Menu where IdCha = {$cha}";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) == 0){ ?>
                            <a href="<?php echo $row['ActionName']; ?>" class="nav-item nav-link"><?php echo $row['TenMenu']; ?></a>
                        <?php
                        }
                        else{ 
                            
                            ?>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                    <span class="dropdown-toggle"><?php echo $row['TenMenu']; ?></span>
                                </a>
                                <div class="dropdown-menu m-0">
                                <?php
                                while ($row1 = mysqli_fetch_assoc($result1)){
                                ?>
                                    <a href="<?php echo $row1['ActionName']; ?>" class="dropdown-item"><?php echo $row1['TenMenu']; ?></a>
                               
                                <?php
                                }
                                ?>
                                </div>
                                </div>
                                <?php
                            }  
                    }    
                }
                ?>
        </div>
       <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0" name="xuat">Get Started</a>class="btn btn-secondary" -->
       
    </div>
</nav>
