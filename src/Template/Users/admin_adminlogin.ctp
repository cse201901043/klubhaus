<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="<?php echo $this->Url->build('/', true) ?>users/adminLogin" method="post">
                    <h1>Admin Login Form</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input class="btn btn-default submit" type="submit">
                    </div>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-paw"></i> klubHaus!</h1>
                            <p> ©All Rights Privacy and Terms Reserved <br> </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>