<?php
$csv = $_FILES["csv"];

$fp = fopen($csv["tmp_name"], "r");
$populations = [];
$lines = [];
$first_line = true;
while (($lines[] = fgetcsv($fp)) !== false) {
  if ($first_line) {
    $first_line = false;
    continue;
  }
}
fclose($fp);

// 都道府県別に加工
$todouhuken = [
  "北海道",
  "青森県",
  "岩手県",
  "宮城県",
  "秋田県",
  "山形県",
  "福島県",
  "茨城県",
  "栃木県",
  "群馬県",
  "埼玉県",
  "千葉県",
  "東京都",
  "神奈川県",
  "新潟県",
  "富山県",
  "石川県",
  "福井県",
  "山梨県",
  "長野県",
  "岐阜県",
  "静岡県",
  "愛知県",
  "三重県",
  "滋賀県",
  "京都府",
  "大阪府",
  "兵庫県",
  "奈良県",
  "和歌山県",
  "鳥取県",
  "島根県",
  "岡山県",
  "広島県",
  "山口県",
  "徳島県",
  "香川県",
  "愛媛県",
  "高知県",
  "福岡県",
  "佐賀県",
  "長崎県",
  "熊本県",
  "大分県",
  "宮崎県",
  "鹿児島県",
  "沖縄県"
];
foreach ($lines as $line) {
  if (in_array($line[1], $todouhuken)) {
    $populations[] = (int) str_replace(',', '', $line[2]);
  }
}

// 平均値
$i = 0;
$sum = 0;
foreach ($populations as $population) {
  $sum += $population;
  $i++;
}
$average = floor($sum / $i);

// 中央値
sort($populations);
$center_i = $i / 2;
$center_i += 0.5;
$center = $populations[$center_i];

// 最大値
$max = $populations[$i-1];

// 最小値
$min = $populations[0];

// 分散
$dist_sum = 0;
foreach ($populations as $population) {
  $dist_list += ($population - $average) * ($population - $average);
}
$dist = floor($dist_list / $i);

// 標準偏差
$deviation_sum = 0;
foreach ($populations as $population) {
  $deviation = $population - $average;
  $deviation_sum += $deviation * $deviation;
}
$deviation = floor($deviation_sum / $i);
$standard_deviation = floor(sqrt($deviation));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>結果</title>
</head>
<body>
  <h1>結果</h1>
  <p>平均値： <?= $average ?></p>
  <p>中央値： <?= $center ?></p>
  <p>最大値： <?= $max?></p>
  <p>最小値： <?= $min ?></p>
  <p>分散： <?= $dist ?></p>
  <p>標準偏差： <?= $standard_deviation ?></p>

  <a href="./index.php">戻る</a>
</body>
</html>