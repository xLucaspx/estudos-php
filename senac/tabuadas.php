<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabuadas PHP</title>
</head>

<body style="
    padding: 2rem 3rem;
  ">
  <h1>Exemplo de código PHP</h1>

  <h2>Tabuadas:</h2>

  <div class="tabuadas" style="
    display: flex;
    justify-content: space-around;
    ">
    <?php
    for ($i = 1; $i <= 10; $i++) {
      echo "<div class=\"tabuada\">
      <h3>Tabuada do $i</h3>";
      for ($j = 1; $j <= 10; $j++) {
        echo "<p>$i x $j = " . $i * $j . "</p>";
      }
      echo $i != 10 ? "</div><hr>" : "</div>";
    }
    ?>
  </div>

</body>
</html>
