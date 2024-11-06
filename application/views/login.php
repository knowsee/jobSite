<?php $this->load->view('common/header'); ?>
<script src="https://bill.b-orie.com.cn/static/js/vendor/sweetalert.js"></script>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Account</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->  

<div id="content" class="my-account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">  
                <div class="my-account-form">
                    <ul class="cd-switcher">
                        <li><a class="selected" href="#0">LOGIN</a></li>
                        <li><a href="#0">REGITER</a></li>
                    </ul>
                    <!-- Login -->
                    <div id="cd-login" class="is-selected">
                        <div class="page-login-form">
                            <?php echo form_open('index/login', array('name' => 'login', 'class' => 'login-form', 'id' => 'login')); ?>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-user"></i>
                                    <input type="text" id="username" class="form-control" name="userName" placeholder="Username">
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-lock"></i>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div> 
                            <button class="btn btn-common log-btn" type="submit">Login</button>
							<a href="javascript:rest();">Rest Password</a>
                            </form>
                        </div>
                    </div>

                    <!-- Register -->
                    <div id="cd-signup">
                        <div class="page-login-form register">
                            <?php echo form_open('index/reg', array('name' => 'reg', 'class' => 'login-form', 'id' => 'reg')); ?>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-user"></i>
                                    <input type="text" id="name" class="form-control" name="userName" placeholder="Username">
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-email"></i>
                                    <input type="text" id="email" class="form-control" name="userEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select class="dropdown-product selectpicker" name="userType">
                                            <option>You are?</option>
                                            <option value="1">Applicant</option>
                                            <option value="2">Interviewer</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-lock"></i>
                                    <input type="password" class="form-control" name="repassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button class="btn btn-common log-btn">Register</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<script>
    $('form').submit(function (e) {
        e.preventDefault();
        $this = $(this);
        ajaxPostForm($this, function (data, message, code) {
			swal('Welcome! ' + data.userName, {icon: "success"}).then(function() {window.location.href = data.uri;});
        });
    });
	function rest() {
		swal({
			text: 'Enter your reg email',
			content: {
				element: "input",
				attributes: {
				  placeholder: "email",
				  type: "text"
			  }
			},
			button: {
				text: "submit to rest",
				closeModal: false,
			},
		}).then(function(message) {
			$.post('/index.php/index/rest', {'email': message});
			return swal("We are send the rest mail to your box", {icon: "success"});
		});
	}
</script>

<?php $this->load->view('common/footer'); ?>

