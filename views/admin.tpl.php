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

        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="/admin/postlogin" method="POST">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="username" type="text" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="password" type="password" required>
                    </div>
                </div>

            <div class="form-group">      
                <div class="col-sm-offset-3 col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Send">
                </div>
            </div>
        </form>

        <div id="result" class="col-md-10">
        </div>
    </div>
</div>

<?php
    require_once(__DIR__ .'/layout/footer.php');
?>