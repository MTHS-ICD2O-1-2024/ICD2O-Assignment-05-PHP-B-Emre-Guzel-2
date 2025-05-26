<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Interest calculator" />
  <meta name="keywords" content="mths, icd2o" />
  <meta name="author" content="Emre Guzel" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-light_green.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Mono:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="css/style.css">
  <title>Interest calculator</title>
</head>

<body>
  <div class="container-2">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Interest calculator</span>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="right-image">
        </div>
        <br><br>
        <?php
        // Getting inputs safely
        $money = isset($_GET["money"]) ? $_GET["money"] : 0;
        $interestRate = isset($_GET["interest-rate"]) ? $_GET["interest-rate"] : 0;
        $numberOfYears = isset($_GET["number-of-years"]) ? $_GET["number-of-years"] : 0;

        $totalAmount = $money;
        $breakdown = "";

        // Calculate interest over the years
        for ($year = 1; $year <= $numberOfYears; $year++) {
          $previousAmount = $totalAmount;
          $totalAmount = $totalAmount * (1 + $interestRate / 100);

          $breakdown .= "Year " . $year . ": $" . round($previousAmount, 2) .
            " × " . round((1 + $interestRate / 100), 2) .
            " = $" . round($totalAmount, 2) . "<br>" . "&nbsp" . "&nbsp";
        }

        // Output results
        echo ("<b>" . "&nbsp" . "&nbsp" . "Initial Money: $" . round($money, 2) . "</b>");
        echo ("<br>" . "<b>" . "&nbsp" . " Interest Rate: " . round($interestRate, 2) . "%" . "</b>");
        echo ("<br>" . "<b>" . "&nbsp" . "&nbsp" . "Years: " . $numberOfYears . "<br>" . "<br>" . "</b>");
        echo ("<b>" . "&nbsp" . "&nbsp" . $breakdown . "</b>");
        echo ("<br>" . "<b>" . "&nbsp" . "&nbsp" . "Final Amount: $" . round($totalAmount, 2) . "</b>");

        ?>
        <br />
        <div class="page-content-answer">
          &nbsp <a href=" ./index.php">Return ...</a>
        </div>
        <br>
      </main>
    </div>

</body>

</html>