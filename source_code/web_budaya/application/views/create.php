<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h3 class="center">Buat Postingan Baru</h3>
<div class="row">
  <form class="col s12" action="<?= site_url('blog/create'); ?>" method="post">
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="judul" id="judul">
        <label for="judul">Judul</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input type="text" name="gambar" id="gambar">
        <label for="gambar">Nama File Gambar</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea name="konten" id="konten" class="materialize-textarea"></textarea>
        <label for="konten">Konten</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <button type="submit" name="submit" class="btn">Create</button>
      </div>
    </div>
  </form>
</div>
