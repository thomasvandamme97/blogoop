<?php
include("includes/header.php");

if (!$session->is_signed_in()) {
    redirect('login.php');
}

if (empty($_GET['id'])) {
    redirect('users.php');
} else {
    $user = User::find_by_id($_GET['id']);

    if (isset($_POST['submit'])) {
        if ($user) {
            $user->username = $_POST['username'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];
            $user->set_file($_FILES['file']);
            $user->save_user_and_image();
        }
    }
}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Edit User</h2>
                <form action="edit_user.php?id=<?php echo $user->id ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>">
                        </div>
                        <div class="form-group">
                            <img src="<?php echo $user->image_path_and_placeholder() ?>" alt="" class="img-fluid" width="40" height="40">
                            <label for="file">User image</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Add user" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>