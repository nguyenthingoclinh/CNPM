<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
  <?php $sql = 'SELECT * FROM AdminMenu where MucDo = 1 order by ThuTu';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
                              
      while ($row = mysqli_fetch_assoc($result)) {
        
        $cha = $row['IDMenuAd'];
        $sql1 = "SELECT * FROM AdminMenu where IdCha = {$cha}";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) == 0){ ?>
         <a class="nav-link collapsed" href="#">
            <i class="bi bi-menu-button-wide"></i>
            <span><?php echo htmlspecialchars($row['TenMenuAd']); ?></span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>
          <?php
        }
       else{ 
        ?>
         <a class="nav-link collapsed" data-bs-target="#<?php echo $row['ItemTarget']; ?>" data-bs-toggle="collapse" href="#">
          <i class="<?php echo $row['Icon']; ?>"></i><span><?php echo $row['TenMenuAd']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
        <?php
        while ($row1 = mysqli_fetch_assoc($result1)){
        ?>
        <ul id="<?php echo $row['IdName']; ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo $row1['ActionName']; ?>">
              <i class="bi bi-circle"></i><span><?php echo $row1['TenMenuAd']; ?></span>
            </a>
          </li>
        </ul>
        <?php
        }
       }  
      }    
    }
    ?>
  </li>
  <!-- End Components Nav -->
</ul>
</aside>