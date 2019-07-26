<body class="dashboard-body">
	<nav class="navbar navbar-light bg-malle">
		<div class="container">
			<a class="navbar-brand text-light" href="#">
	    		<img src="<?= base_url('assets/images/logo/rec.png')?>" width="110" height="50" class="d-inline-block align-top" alt="">
	    		| Admin Dashboard
	  		</a>
	  		<button class="my-2 btn-logout btn btn-danger bg-red" data-toggle="modal" data-target="#logoutModal"	>Logout</button>
		</div>
	</nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 mt-4">
        <div class="sidebar">
          <div class="container">
            <div class="row">
              <h5>Hi ! <span class="text-info"><?= $this->session->userdata('user')['short_name'] ?></span></h5>
              <br>
              <div class="text-email"><?= $this->session->userdata('user')['email_id'] ?></div>
            </div>
            <hr>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('mall') ?>">Manage Malls</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('merchant') ?>">Manage Merchants</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('Deal') ?>">Manage Deals</a></li>
            <li class="list-group-item"><a class="malle-link" href="#">Manage Shops/Outlets</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('company') ?>">Manage Company</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('country') ?>">Manage Country</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('ManageMasters/MallTypes') ?>">Manage Masters</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('category') ?>">Manage Category</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('dealcategory') ?>">Manage Sub Category</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('Inquiry') ?>">Manage Inquiry</a></li>
            <li class="list-group-item"><a class="malle-link" href="<?= base_url('Shopper') ?>">Manage Shoppers</a></li>
          </ul>
        </div>
      </div>

      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="logoutModalLabel">Log out</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to logout?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="<?= base_url('account/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </div>