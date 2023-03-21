<html>
  <head>
    <title>Badlibs (part 1)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div class="card">
      <div class="card-body">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
          <div class="form-group">
            <label for="noun">Noun</label>
            <input type="text" class="form-control" id="noun" name="noun" aria-describedby="nounHelp" placeholder="Enter plural noun">
          </div>
          <div class="form-group">
            <label for="verb">Verb</label>
            <input type="text" class="form-control" id="verb" name="verb" aria-describedby="verbHelp" placeholder="Enter verb">
          </div>
          <div class="form-group">
            <label for="adverb">Adverb</label>
            <input type="text" class="form-control" id="adverb" name="adverb" aria-describedby="adverbHelp" placeholder="Enter adverb">
          </div>
          <div class="form-group">
            <label for="adjective">Adjective</label>
            <input type="text" class="form-control" id="adjective" name="adjective" aria-describedby="adjectiveHelp" placeholder="Enter adjective">
          </div>
          <button type="submit" class="btn btn-primary"  name="submit">Create Badlib</button>
        </form>
      </div>
    </div>
    <?php
      if (isset($_POST['submit']))
      {
          $nouns = $_POST['noun'];
          $verb = $_POST['verb'];
          $adverb = $_POST['adverb'];
          $adjective = $_POST['adjective'];

          $story = "I like to play <strong>$adjective</strong> music <strong>$adverb</strong> when I study. "
              . "It helps me to <strong>$verb</strong> so I can do better on <strong>$nouns</strong>.";
    ?>
    <div class="card">
      <div class="card-body">
        <?=$story?>
      </div>
    </div>
    <?php
      }
    ?>
  </body>
</html>
