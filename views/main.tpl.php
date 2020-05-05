<?
  require_once(__DIR__ .'/layout/header.php');
?>

<div class="container">

    <h1><?=$pageData['title']?></h1>
    <hr/>

<? if(isset($pageData['msg'])) if($pageData['msg'] != '') echo '<p class="bg-info">'.$pageData['msg'].'</p>';

    foreach($pageData['tasks'] as $task){ ?>

    <div class="col-md-10">
        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="/update?id=<?=$task['id']?>" method="POST">
          <? if ($task['editadmin']): ?>
            <div class="form-group" style="float: right;">
              <label class="col-sm-12 control-label">Отредактированно администратором</label>
              <br>
            </div>
          <? endif ?>
          <div class="form-group">
              <p class="bg-info"><strong><?=$task['name']?></strong></p>
              <label for="email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-6">
                <p class="text"><?=$task['email']?></p>
              </div>
          </div>
          <div class="form-group">
              <label for="task" class="col-sm-3 control-label">Checked</label>
              <div class="col-sm-6">
                  <input type="checkbox" name="checked" value="1" <?=($task['status']) ? 'checked' : '' ?> <?=$pageData['valid']? '': 'disabled'?>> Checked<br>
              </div>
          </div>
          <div class="form-group">
              <label for="text" class="col-sm-3 control-label">Task</label>
              <div class="col-sm-6">
                  <textarea class="form-control" name="text" type="text" id="text" rows="5" <?=$pageData['valid']? '': 'disabled'?>><?=$task['text']?></textarea>
              </div>
          </div>
          <? if ($pageData['valid']): ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Edit">
                </div>
            </div>
          <? endif ?>
        </form>
    </div>

    <? } ?>
</div>

<div class="text-center">
  <?=$pageData['pagination']?>
</div>

<?
  require_once(__DIR__ .'/layout/footer.php');
?>