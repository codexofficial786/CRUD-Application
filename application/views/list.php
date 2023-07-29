<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - View User</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD Application</a>
        </div>
    </div>
    <div class="container" style="padding-top:10px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                $success = $this->session->userdata('success');
                if ($success != "") {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                $falure = $this->session->userdata('falure');
                if ($falure != "") {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $falure; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <h3>View User</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo base_url('index.php/user/create') ?>" class="btn btn-primary"><i
                                class="fa-sharp fa-solid fa-plus"></i>Create</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="90">Edit</th>
                        <th width="110">Delete</th>
                    </tr>
                    <?php if (!empty($users)) {
                        foreach ($users as $user) { ?>
                            <tr>
                                <td>
                                    <?php echo $user['user_id'] ?>
                                </td>
                                <td>
                                    <?php echo $user['name'] ?>
                                </td>
                                <td>
                                    <?php echo $user['email'] ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'index.php/user/edit/' . $user['user_id'] ?>"
                                        class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('index.php/user/delete/' . $user['user_id']) ?>"
                                        class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                    <tr>
                        <td colspan="5">Record not found</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/4b774d9826.js" crossorigin="anonymous"></script>
</body>

</html>