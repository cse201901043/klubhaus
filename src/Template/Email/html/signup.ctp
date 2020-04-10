<p>Hello <b><?= $user->name ?></b>!</p>
<p>Welcome to KLUBHAUS! Your account login details are down below:
    <br> To view and activate your account, please <?= $this->html->link('click here', [$user->remember_token, '_full' => true]) ?>, where you can do the following:
    <br>

    <div>&bull; Check your order status</div>
    <div>&bull; Update your profile and preferences</div>
    <div>&bull; Add and save items to your shoping cart</div>
    <div>&bull; Enjoy faster checkout when you shop next time</div>
    <br>
    <div>If you forget your password, there is a link on the sign-in page to resent your password.</div>
    <div>Spend 8000tk at one order to become a privileged member and enjoy exciting offers!</div>
    <br>
    <div>Please find more information on our Policies, by checking out our website. If you have any questions or queries
        regarding your account or shopping at KLUBHAUS, please feel free to give us a call at +8801841297253
    </div>
</p>