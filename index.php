

<?php
  include './scripts/script.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/footer.css">
  <title>Document</title>

</head>
<body>

  <?php include('./scripts/header.php'); ?>

  <section id="section-1">
    <h2>Rate today's class 😉</h2> <br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div id="rate-div">
      <input type="number" name="rate" id="rate" max="10" min="0" size="1" required placeholder="8"> 
      <div id="overten">/10</div>
    </div>
    <input type="submit" value="Submit" id="submit" name="submit">
    </form>
  </section>

  <?php include('./scripts/footer.php') ?>

  <!--script>
    const submitButton = document.getElementById("submit");
    submitButton.onclick = () => {
      const sec = document.getElementById('section-1');
      sec.innerHTML = "<h2>Thaks for your rating ^_^</h2>";
    }
  </script-->
</body> 
</html>

