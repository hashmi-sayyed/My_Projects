<?php include "database.php" ?>
<?php include "inc/header.php" ?>

<?php
$name = $email = $body = "";
$nameErr = $emailErr = $bodyErr = "";

// form submit
if (isset($_POST['submit'])) {
  // validate name
  if (empty($_POST['name'])) {
    $nameErr = "Name is required";
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // validate name
  if (empty($_POST['email'])) {
    $emailErr = "Email is required";
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }

  // validate name
  if (empty($_POST['body'])) {
    $bodyErr = "Feedback is required";
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
    // success
    $sql = "INSERT INTO feedback (name, email, body) VALUES (?,?,?)";
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$name, $email, $body])) {
      header("Location: /4th project/feedback.php");
    } else {
      echo "Error";
    }
  }
}
?>

<div class="text-center" style="margin-top: 2rem;">
  <h1 class="display-1">Feedback</h1>
</div>

<div class="container-sm card" style="max-width: 700px; padding: 1rem; margin-top: 2rem;">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control <?php echo $nameErr ? "is-invalid" : null; ?>" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
      <div class="invalid-feedback">
        <?php echo $nameErr ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input type="email" class="form-control <?php echo $emailErr ? "is-invalid" : null; ?>" id="exampleInputPassword1" name="email">
      <div class="invalid-feedback">
        <?php echo $emailErr ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
      <textarea class="form-control <?php echo $bodyErr ? "is-invalid" : null; ?>" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
      <div class="invalid-feedback">
        <?php echo $bodyErr ?>
      </div>
    </div>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
  </form>
</div>
<?php include "inc/footer.php" ?>