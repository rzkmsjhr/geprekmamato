<div class="card">
    <div class="header">
        <h4 class="title">Input User Gudang</h4>
    </div>
    <div class="content">
        <form id="submit-user">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="hidden"name="level" value="3">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Promo" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password" required minlength="6">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <button class="btn btn-info btn-fill" type="button" name="showpassword" id="showpassword" value="Show Password">Show password</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/usergudang'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>