<?php
    require_once(__DIR__ .'/layout/header.php');
?>

<div class="container">

    <h1><?=$pageData['title']?></h1>
    <hr/>

    <div class="col-md-10">
        <?php if(isset($pageData['msg']))
            echo '<p class="bg-info">'.$pageData['msg'].'</p>';
        ?>

        <form accept-charset="UTF-8" class="form-horizontal" method="POST">
                <div class="form-group ">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="name" type="text" id="name" required>
                    </div>
                </div>
        <div class="form-group ">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="email" type="email" id="name" required>
                    </div>
                </div>
        <div class="form-group ">
                    <label for="text" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="text" type="text" id="text" rows="5" required></textarea>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                </div>
            
                <div class="col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Send">
                </div>
            </div>
        </form>

        <div id="result" class="col-sm-offset-3 col-sm-6">
        </div>
    </div>
</div>

<?php
    require_once(__DIR__ .'/layout/footer.php');
?>