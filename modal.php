<div class="modal fade" id="modal1" name="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">id</label>
                        <input type="text" name="regid" id="regid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="">
                    </div>
                    <div class="form-group"  id="filegroup1">
                        <label for="name">File1</label>
                        <div class="custom-file invalid">
                            <label for="file1" class="custom-file-label" id="file1label" name="file1label">File</label>
                            <input type="file" name="file1" id="file1" class="custom-file-input" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="filegroup2">
                        <label for="name">File2</label>
                        <div class="custom-file" >
                            <label for="file1" class="custom-file-label" id="file2label"></label>
                            <input type="file" name="file2" id="file2" class="custom-file-input" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="filegroup3">
                        <label for="name">File3</label>
                        <div class="custom-file" >
                            <label for="file1" class="custom-file-label" id="file3label">File</label>
                            <input type="file" name="file3" id="file3" class="custom-file-input is-invalid" placeholder="">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>