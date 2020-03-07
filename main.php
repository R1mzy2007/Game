<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script>
    window.onload = function() {
      var click = document.getElementyByld("clicke");
      var a = "<?=session_start()  ?>";
      var val = "<?= $_SESSION['cookie'];  ?>";
      click.value = val;
    }
    </script>
  </head>
  <body>

  </body>
</html>
<?php
require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Roma');
$app->initLayout('Centered');
$model = new User($db);
$model->load($_SESSION['user_id']);
$n = $model['clicker_count'];
$model->unload();
$m = 1;
$a = 10;

  $columns = $app->add('Columns');
  $col_1 = $columns->addColumn(3);
  $col_2 = $columns->addColumn(10);
  $col_3 = $columns->addColumn(3);

    $slicer = $col_2->add(['View','template' => new \atk4\ui\Template('
  <div id="{$_id}" class="ui statistic">
    <input type="button" id="clicke" value=0 onclick=Clicker() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
  </div>
  <script>
    function Clicker() {
      var click = document.getElementById("clicke");
      click.value = parseInt(click.value) + 1;
    }
  </script>')]);

    //$val->addAction('Set Custom Value')->js('click', new \atk4\ui\jsReload($val, ['val' => $val->jsInput()->val(new \atk4\ui\jsExpression('parseInt([])+1', [$val->jsInput()->val()]), $val->jsInput()->focus())]));


/*
  function Plus($clicker,$model)
  {


    $model->load($_SESSION['user_id']);
    $n = $model['clicker_count'];
    //$n = $n + 1;
    $model['clicker_count'] =  $n;
    $_SESSION['clicker_count'] = $n;
    $model->save();
    return $clicker->js()->text(new \atk4\ui\jsExpression('parseInt([])+1', [$clicker->js()->text()]));

  }
  */  $save = $col_2->add(['View','template' => new \atk4\ui\Template('
  <div id="{$_id}" class="ui statistic">
    <input type="button" value="Save" onclick=Save() style="width:500px;height:100px;background-color:green;color:white;font-size:35px;">
  </div>
  <script>
    function Save() {
      var click = document.getElementById("clicke");
      var link = \'save.php?val=\'+click.value;
      window.open(link);
    }
  </script>')]);

  //$label = $col_2->add(["Button",$_SESSION['user_id']]);

  $save = $col_2->add(["Button","Save","blue big"]);


$exit = $app->add(['Button',"Exit","red"]);
$exit->link(["exit"]);














$x2 = $col_3->add(["Button","click x2","massive inverted yellow","icon"=>"france flag"]);

$pus = $col_3->add(["Button","+0.5 cli/sek",]);
