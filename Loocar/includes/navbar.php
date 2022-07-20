



<nav class="navbar navbar-expand-lg navbar-dark sub-navbar-bg shadow sticky-top">
  <div class="container">
    

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('index.php') ?>">L O O C A R</a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url('index.php') ?>">Home</a>
        </li>
        <?php
          $navbarCategory = "SELECT * FROM categories  "; 
          $navbarCategory_run = mysqli_query($con, $navbarCategory);

          if(mysqli_num_rows($navbarCategory_run) > 0)
          {
            foreach($navbarCategory_run as $navItems)
            {
              ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('category/'.$navItems['slug']) ?>"><?= $navItems['name']; ?></a>
              </li>
              <?php
            }
          }
        ?>
           <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url('calculator.php') ?>">Calculator</a>
        </li>


        <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- <li><a class="dropdown-item" href="#">My Profile</a></li> -->
            <li>
              <form action="<?= base_url('allcode.php') ?>" method="POST">
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        <?php else : ?>
        <li class="nav-item" >
          <a class="nav-link" href="<?= base_url('login.php') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('register.php') ?>">Register</a>
        </li>
        <?php endif; ?>

      </ul>
     
    </div>
  </div>
</nav>