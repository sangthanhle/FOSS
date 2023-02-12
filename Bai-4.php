<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="vote.php" method="post">
  <h3>Vote for your favorite soccer player:</h3>
  <input type="radio" name="player" value="player1">Player 1<br>
  <input type="radio" name="player" value="player2">Player 2<br>
  <!-- Add more radio buttons for the other players -->
  <input type="submit" value="Submit">
</form>

<?php
  if (isset($_POST['player'])) {
    $selected_player = $_POST['player'];
    // write code to increment vote count for the selected player in database
  }

  // fetch vote counts for all players from database
  $vote_counts = // ...

  // sort players by vote count in descending order
  arsort($vote_counts);

  // display top 3 players with highest vote count
  echo "<h3>Top 3 players:</h3>";
  $i = 0;
  foreach ($vote_counts as $player => $vote_count) {
    if ($i >= 3) break;
    echo "$player: $vote_count votes<br>";
    $i++;
  }
?>

</body>
</html>