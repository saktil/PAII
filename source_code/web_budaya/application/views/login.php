<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
<h3 class="center">LOGIN ADMIN</h3>
  <form class="col s8 offset-s2" action="<?= site_url('auth/login'); ?>" method="post">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="username" id="username">
        <label for="username">Username</label>
      </div>
    </div>
        <div class="row">
      <div class="input-field col s12">
        <input type="password" name="password" id="password">
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <button type="submit" name="submit" class="btn">Login</button>
      </div>
    </div>
  </form>
</div>