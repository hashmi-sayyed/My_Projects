<?php include "database.php" ?>
<?php include "inc/header.php" ?>
<div class="text-center" style="margin-top: 2rem;">
  <h1 class="display-1">Feedback</h1>
</div>

<div class="container-sm" style="max-width: 700px;">
  <?php foreach ($rows as $card) : ?>
    <div class="text-center card" style="padding: 1.5rem; margin-top: 2rem;">
      <p class="body"><?php echo $card['body'] ?></p>
      <p class="name"><i>By <?php echo $card['name'] ?></i></p>
    </div>
  <?php endforeach; ?>
</div>
<?php include "inc/footer.php" ?>