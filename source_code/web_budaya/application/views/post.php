<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
p{
      text-align: justify;
  }
</style>
<h3><?= $post->judul; ?></h3>
<hr>
<img width="600" height="350" src="<?php echo base_url("asset/images/".$post->picture); ?>" class="center"/>
<p><?= str_replace("\n","<br />",$post->konten);?></p>
