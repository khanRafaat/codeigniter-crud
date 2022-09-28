<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Brand</title>
</head>

<body>
    <!-- Nav Bar  -->
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url() . 'index.php/brand/' ?>">Brand</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'index.php/model/' ?>">Model</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'index.php/item/' ?>">Item</a>
        </li>
    </ul>


    <div class="container">
        <div class="card p-5">

            <form action="<?php echo base_url() . 'index.php/item/edit/' . $items['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="brand">Update Brand</label>

                    <input type="text" name="name" class="form-control" placeholder="Update Brand Name" value="<?php echo $items['iname'] ?>">
                    <?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
                    <label for="brand">Update Brand</label>
                    <select id="inputState" class="form-control" name="brand">

                        <?php foreach ($brands as $brand) { ?>

                            <option value="<?php echo $brand['id'] ?>" <?php echo ($brand['id'] == $items['brand_id']) ? 'selected' : ''; ?>><?php echo $brand['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand">Update Models</label>
                    <select id="inputState" class="form-control" name="model">

                        <?php foreach ($models as $model) { ?>

                            <option value="<?php echo $model['id'] ?>" <?php echo ($items['model_id'] == $model['id']) ? 'selected' : ''; ?>><?php echo $model['mname'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary text-center">Update</button>
            </form>




        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>