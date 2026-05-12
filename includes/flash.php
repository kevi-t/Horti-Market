<?php if (!empty($_SESSION['message'])):
    $msg  = $_SESSION['message'];
    $type = (stripos($msg, 'success') !== false
          || stripos($msg, 'placed')  !== false
          || stripos($msg, 'verified') !== false
          || stripos($msg, 'updated') !== false)
          ? 'success' : 'danger';
    unset($_SESSION['message']);
?>
<div id="flash-banner" class="alert alert-<?= $type ?> alert-dismissible"
     style="position:fixed;top:50px;left:0;right:0;z-index:9999;
            margin:0;border-radius:0;text-align:center;padding:13px 40px;
            font-size:15px;font-weight:600;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $msg ?>
</div>
<script>setTimeout(function(){ $('#flash-banner').fadeOut(400); }, 4000);</script>
<?php endif; ?>
