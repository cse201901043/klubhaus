
	<div class="container-fluid">
	    <div class="text-center home-title">
	        <h2>CONTACT US</h2>
	    </div>
        <div class="row content">
            <div class="col-md-8 col-md-offset-2 cart-content">
	            <div class="col-md-12 text-justify">
        			<br><br>

	                <p>Duis ultricies faucibus ex, id commodo nunc consequat ac. In posuere, quam vitae imperdiet interdum, ligula nisl sagittis arcu, finibus porta nisl ex vel enim. Donec consequat iaculis diam eget rutrum. Donec euismod aliquet sollicitudin. Phasellus dictum eros nulla, in gravida risus suscipit ac. Donec sit amet porta ipsum. Vestibulum hendrerit sit amet justo eu vestibulum.</p>
	            	<br><br>

					<div class="row">
						<div class="col-md-6">
							<form role="form" id="contact-form">

                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <input class="form-control login-control" type="text" name="name" placeholder="Enter Name">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <input class="form-control login-control" type="email" name="email" placeholder="Enter Email">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <input class="form-control login-control" type="number" name="phone" placeholder="Enter Phone Number">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <textarea class="form-control login-control" rows="6" placeholder="Messages" name="message"></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-lg btn-warning text-uppercase btn-block" id="contactMail">Submit</button>
                                </div>
                            </form>
						</div>
						<div class="col-md-4 col-md-offset-1 text-center">
							<h4 class="text-uppercase text-bold">WE'RE HERE TO HELP</h4>
							<div class="block-contact">
								<?= $this->Html->image('phone.png', [
	                                'alt' => 'Contact', 
	                                'class' => 'img'
	                            ]) ?>
								<div class="text">
									<h4 class="text-bold">Phone</h4>
									<p>16492</p>
								</div>
							</div>
							<div class="block-contact">
								<?= $this->Html->image('email.png', [
	                                'alt' => 'Contact', 
	                                'class' => 'img'
	                            ]) ?>
								<div class="text">
									<h4 class="text-bold">Email</h4>
									<p>info@klubhausbd.com</p>
								</div>
							</div>
						</div>
					</div>

					<br><br>

					<div class="row">
						<div class="col-md-12">

							<h3 class="text-center text-bold">Our store</h3>
	            			<br><br>
							
	                        <div class="col-md-3">
	                            <h4 class="text-center text-bold">Basundhara City</h4>
	                            <p class="text-center text-bold">Level-7, block-A Panthapath, Dhaka-1215. Hotline- +8801755625026</p>
	                        </div>
	                        <div class="col-md-3">
	                            <h4 class="text-center text-bold">Dora Complex</h4>
	                            <p class="text-center text-bold">14 Ranking Street Wari, Dhaka-1215. Hotline- +8801755625027</p>
	                        </div>
	                        <div class="col-md-3">
	                            <h4 class="text-center text-bold">Jamuna Future Park</h4>
	                            <p class="text-center text-bold">Ground Floor, West Court, Dhaka-1215. Hotline- +8801755625028</p>
	                        </div>
	                        <div class="col-md-3">
	                            <h4 class="text-center text-bold">RP Tower</h4>
	                            <p class="text-center text-bold">Chiriyakhana Road Mirpur, Dhaka-1215. Hotline- +8801755625029</p>
	                        </div>
						</div>
					</div>

	            	<br><br><br><br>
	            </div>
            </div>
        </div>
    </div>

    <?php $this->start('script'); ?>
        <script>

		    //Contact us
		    $("#contact-form").on("click", '#contactMail', function(e) {
		    	e.preventDefault();
		        $.ajax({
		            type: "POST",
                	data: $("#contact-form").serialize(),
		            url: "<?php echo $this->Url->build('/',true) ?>"+"contact-send-mail",
		            success: function(data) {
		                console.log(data);
	                    swal({
	                        title: "Thank you!",
	                        text: "We have recieved your mail, will contact you soon.",
	                        type: "success",
	                        showConfirmButton: false,
	                        timer: 3000
	                    });
                    	$('#contact-form').trigger("reset");
		            },
		            error: function() {
		                console.log("error");
		            },
		            dataType: "json"
		        });

		    });

        </script>
    <?php $this->end(); ?>