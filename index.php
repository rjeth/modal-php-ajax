<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mx-auto">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="fname" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="file1">File</label>
                        <input type="file" name="file1" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="file1">File</label>
                        <input type="file" name="file2" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="file1">File</label>
                        <input type="file" name="file3" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                </form>
            </div>
            <?php
            include 'connection.php';
            $result = mysqli_query($conn, "SELECT * FROM reg");
            ?>
            <div class="col-lg-8 mt-5">
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($result as $row) {  ?>
                                <tr>
                                    <th scope="row"><?php echo $row["id"]; ?></th>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><a name="edit" id="<?php echo $row["id"]; ?>" class="btn btn-primary"> View </a></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                <?php  } else {
                    echo "No result found";
                } ?>
            </div>
        </div>
    </div>
    <?php include 'modal.php'; ?>
    <script>
        function removeVal(){
            $("#file1label").empty();
            $("#file2label").empty();
            $("#file3label").empty();      	
        }

        $(document).on("click", 'a[name="edit"]', function() {
            removeVal();
            var regid = $(this).attr("id");
            $.ajax({
                url: "update.php",
                method: "POST",
                data: {
                    regid: regid
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $("#modal1").modal("show");
                    $("#regid").val(data.id);

                    $("#fname").val(data.name);
                    if (data.file1 != null) {
                        $("#file1label").html(data.file1);
                        $("#file1").addClass('is-valid');
                    } else {
                        $("#filegroup1").addClass('is-invalid');
                    }
                    if (data.file2 != null) {
                        $("#file2label").html(data.file2);
                        $("#file2").addClass('is-valid');
                    } else {
                        $("#filegroup2").addClass('is-invalid');
                    }
                    if (data.file3 != null) {
                        $("#file3label").html(data.file3);
                        $("#file3").addClass('is-valid');
                    } else {
                        $("#filegroup3").addClass('is-invalid');
                    }
                }
            });
        });
    </script>
</body>

</html>