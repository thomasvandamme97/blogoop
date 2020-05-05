<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Users</h2>
            <hr>
            <?php
                $users = User::find_all();

                foreach ($users as $user) {
                    echo '<p>' . $user->id . ' | ' . $user->username . ' | ' . $user->first_name . ' ' . $user->last_name . '</p>';
                }
            ?>
            <h2>Specific User</h2>
            <?php
                $user = User::find_by_id(2);

                echo '<p>' . $user->id . ' | ' . $user->username . ' | ' . $user->first_name . ' ' . $user->last_name . '</p>';

                // create user
                $user = new User();
                $user->username = 'Test10';
                // $user->save();

                // update user
                $user = User::find_by_id(2);
                $user->last_name = "Test";
                // $user->save();

                // delete user
                $user = User::find_by_id(6);
                // $user->delete();
            ?>
            <h2>Images</h2>
            <?php
                $photos = Photo::find_all();

                foreach ($photos as $photo) {
                    echo $photo->title . "<br>";
                    echo '<img src="./img/' . $photo->filename . '" width="250" height="250"><br>';
                }

                $photo = new Photo();
                $photo->title = "SAM";
                $photo->description = "Lorem Ipsum.";
                $photo->size = 15;

                // $photo->save();
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->