<?php
include('authentication.php');
include('middleware/superadminAuth.php');

include('includes/header.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User
                        <a href="view-register.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users WHERE id='$user_id' ";
                        $users_run = mysqli_query($con, $users);

                        if(mysqli_num_rows($users_run) > 0)
                        {
                            foreach($users_run as $user)
                            {
                            ?>

                            <form action="code-superadmin.php" method="POST">
                                <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                                <input type="hidden" name="old_password" value="<?=$user['password'];?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="fname" value="<?=$user['fname'];?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lname" value="<?=$user['lname'];?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" value="<?=$user['email'];?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Password</label>
                                        <input type="text" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <?php if($user['role_as'] != '2'): ?>
                                            <label for="">Role as</label>
                                            <select name="role_as"  class="form-control" required>
                                                <option value="">--Select Role--</option>
                                                <option value="1" <?= $user['role_as'] == '1' ? 'selected':'' ?> >Admin</option>
                                                <option value="0" <?= $user['role_as'] == '0' ? 'selected':'' ?> >User</option>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                    </div>

                                </div>
                            </form>
                            
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }
                    }
                    ?>
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>