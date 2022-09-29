<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Items</title>
</head>

<body>

    <!-- Nav Bar  -->
    <ul class="nav justify-content-center mb-5">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url() . 'index.php/brand/' ?>">Brand</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'index.php/models/' ?>">Model</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'index.php/item/' ?>">Item</a>
        </li>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Add Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'index.php/item/create'; ?>" method="POST">


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Select Brand <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-control" name="brand">
                                    <option selected>Choose...</option>
                                    <?php foreach ($brands as $brand) { ?>
                                        <option value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Select Model <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-control" name="model">
                                    <option selected>Choose...</option>
                                    <?php foreach ($models as $model) { ?>
                                        <option value="<?php echo $model['id'] ?>"><?php echo $model['mname'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Item Name <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input name="name" type="text" class="form-control" require id="name" onkeyup="validateForm()">
                                <small id="validate" style="color:red"> </small>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal End -->
    <?php echo validation_errors(); ?>
    <div class="container">
        <class class="row">

            <div class="col-md-12 mb-4">
                <h1 class="text-center">Item Details</h1>
            </div>
            <div class="col-md-12 ">
                <?php
                $success = $this->session->userdata('success');


                if ($success != "") {
                ?>
                    <div class="alert alert-success" role="alert"><?php echo $success ?></div>

                <?php
                }
                ?>

                <?php
                $error = $this->session->userdata('error');
                if ($error != "") {
                ?>
                    <div class="alert alert-warning" role="alert"><?php echo $error ?></div>

                <?php
                }
                ?>

            </div>
        </class>
        <div class="card">

            <div class="card-body pt-4">
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal" style="background:#F47926;border-color:#F47926"> Add Item</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Item</th>
                            <th scope="col">Model Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Entery date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if (!empty($items)) {
                            foreach ($items as  $item) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?> </th>
                                    <td><?php echo $item['iname'] ?></td>
                                    <td><?php echo $item['mname'] ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td>
                                        <?php
                                        $date = date_create($item['entry_date']);
                                        echo date_format($date, "d-m-Y");
                                        ?>
                                    </td>
                                    <td><a href="<?php echo base_url() . 'index.php/item/edit/' . $item['id'] ?>" class="btn text-warning mr-1"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>

                                        <a href="<?php echo base_url() . 'index.php/item/delete/' . $item['id'] ?>" class="btn text-danger " onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash fa-lg "></i></a>
                                    </td>
                                </tr>

                        <?php }
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function validateForm() {
            var a = document.getElementById("name").value;
            if (!a.length) {
                document.getElementById('validate').innerHTML = "Input must be filled out.";
                return false;
            } else if (/[^a-zA-Z0-9\s]/.test(a)) {
                document.getElementById('validate').innerHTML = "Only Alphabet and Numeric value allowed.";
                return false;
            } else if (a.length > 255) {
                document.getElementById('validate').innerHTML = "Only 255 character length allowed.";
                return false;
            }
        }
    </script>
</body>

</html>