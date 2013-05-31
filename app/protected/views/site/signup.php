<?php
$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
    'Signup',
);
?>
Sign Up
<div class="row">
<form action="<?php echo $this->createUrl('/site/signup'); ?>" name="user_signup_form">
    <fieldset class="ten columns">
        <ul>
            <li class="field">
                <label class="inline three columns" for="email">Email</label>
                <input class="wide text input" id="email" type="text" placeholder="something@something.com" />
            </li>
            <li class="field">
                <label class="inline three columns" for="password">Password</label>
                <input class="wide password input" id="password" type="password" placeholder="*******" />
            </li>
            <li class="field">
                <label class="inline three columns" for="confirm_password">Confirm Password</label>
                <input class="wide password input" id="confirm_password" type="password" placeholder="*******" />
            </li>
            <li class="field">
                <label class="inline three columns" for="first_name">First Name</label>
                <input class="wide text input" id="text2" type="text" placeholder="John" />
            </li>
            <li class="field">
                <label class="inline three columns" for="last_name">Last Name</label>
                <input class="wide text input" id="text2" type="text" placeholder="wide input" />
            </li>
            <li class="field two columns">
                <input class="pretty medium primary btn metro rounded " id="text2" type="button" value="Signup"/>
            </li>
        </ul>
    </fieldset>
</form>
</div>
