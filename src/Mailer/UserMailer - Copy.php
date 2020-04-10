<?php

namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this->from(['info@klubhaus.com.bd' => 'KLUBHAUS'])
            ->to($user->email)
            ->subject(sprintf('Welcome %s', $user->name))
            ->viewVars(['user' => $user])
            ->emailFormat('html')
            ->template('welcome'); // By default template with same name as method name is used.
    }
    public function signup($user)
    {
        $this->from(['info@klubhaus.com.bd' => 'KLUBHAUS'])
            ->to($user->email)
            // ->addCc(['dhakasupport.networks@aamra.com.bd'])
            // ->addBcc(['web-pdkem@mail-tester.com'])
            // ->addBcc(['asif.cse07@gmail.com', 'dhakasupport.networks@aamra.com.bd', 'imranhoque66@gmail.com'])
            ->subject(sprintf('Confirm Registration'))
            ->viewVars(['user' => $user])
            ->emailFormat('html')
            ->template('signup'); // By default template with same name as method name is used.
    }

    public function placed_order($user, $order, $carts)
    {
        $this->from(['info@klubhaus.com.bd' => 'KLUBHAUS'])
            ->to($user->email)
            ->subject(sprintf('Order Placed'))
            ->viewVars(['user' => $user, 'order' => $order, 'items' => $carts])
            ->emailFormat('html')
            ->template('placed_order'); // By default template with same name as method name is used.
    }

    public function confirm_order($user, $order, $items)
    {
        $this->from(['info@klubhaus.com.bd' => 'KLUBHAUS'])
            ->to($user->email)
            // ->addBcc(['md.rabbir.alamin03@gmail.com', 'asif.cse07@gmail.com'])
            ->subject(sprintf('Confirm Order'))
            ->viewVars(['user' => $user, 'order' => $order, 'items' => $items])
            ->emailFormat('html')
            ->template('confirm_order'); // By default template with same name as method name is used.
    }
}