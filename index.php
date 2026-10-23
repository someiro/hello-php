<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hello, PHP Server!</title>
</head>

<body>
  <h1>東京</h1>
  <?php
    $url = "https://www.jma.go.jp/bosai/forecast/data/forecast/130000.json";
    $res = file_get_contents($url);
    if ($res !== false) {
      $jsonArray = json_decode($res, true);
      $weather = $jsonArray[0]["timeSeries"][0]["areas"][0]["weathers"];
      $today = $weather[0];
      $tomorrow = $weather[1];

      echo "<p>今日: " . $today . "</p>";
      echo "<p>明日: " . $tomorrow . "</p>";

    } else {
      echo "<h2>Response Error</h2>";
    }
  ?>
  <h1>狐</h1>
  <?php
    $url = "https://randomfox.ca/floof/";
    $res = file_get_contents($url);

    if ($res !== false) {
      $jsonArray = json_decode($res, true);
      $imgUrl = $jsonArray["image"];
      echo "<img src='" . $imgUrl . "' width='50%' />";
    } else {
      echo "<h2>Response Error</h2>";
    }
  ?>
</body>

</html>
