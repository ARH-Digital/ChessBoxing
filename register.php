<?php
    require("includes/header.inc.php");
?>

<div class="container">

    <br><br>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form role="form" action="test.php" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="user">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pass">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="sub" name="sub" checked="checked">Subscribe to our Newsletter.
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
        <div class="col-md-4"></div>
    </div>

<?php
    require("includes/footer.inc.php");
?>