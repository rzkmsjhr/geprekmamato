<div class="alert alert-success" id="notifupdateuser" style="display:none">
    <span><b>User Berhasil Di Update</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Update User</h4>
    </div>
    <div class="content">
        <?php foreach($user as $row){ ?>
        <form id="update-user">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="hidden"name="id_user" value="<?php echo $row->id_user ?>">
                        <input type="hidden"name="level" value="<?php echo $row->level ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Promo" name="username" required value="<?php echo $row->username ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password" value="<?php echo $row->password ?>" required minlength="6">
                    </div> 
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <button class="btn btn-info btn-fill" type="button" name="showpassword" id="showpassword" value="Show Password">Show password</button>
                <a class="btn btn-danger btn-fill" href="javascript:history.go(-1)">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>