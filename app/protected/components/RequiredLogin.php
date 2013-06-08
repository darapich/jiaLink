<?php
class RequiredLogin extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }
    
    public function handleBeginRequest($event)
    {
        $app = Yii::app();
        $user = $app->user;

        $request = $app->urlManager->parseUrl($app->request);

        // Restrict guests to public pages.
        $allowed = array('site/login', 'site/logout', 'site/confirm', 'site/signup');
        if ($user->isGuest && !in_array($request, $allowed)){
            $app->request->redirect('/site/login');
        }

        // Prevent logged in users from viewing the login page.
        $request = substr($request, 0, strlen('site/login'));

        if (!$user->isGuest && in_array($request, array('site/login', ''))) {
            $app->request->redirect('/wallPost/index');
        }
    }
}
