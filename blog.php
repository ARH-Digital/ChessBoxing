<?php
    require("includes/header.inc.php");
?>


<div class="container">
    <div class="row" style="background-image: url('img/dark_mosaic.png'); color: #FFF;">
        <div class="col-md-12" style="text-align: center">
            <h1>Blog</h1>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-9" style="background-image: url('img/black_twill.png');">
            <h3>This week</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Pellentesque sed sodales neque. Suspendisse hendrerit ut justo in aliquam. Mauris dapibus massa erat, 
                eget ornare eros elementum sed. Fusce hendrerit neque porta ipsum ullamcorper gravida. 
                Pellentesque blandit commodo dignissim. Vestibulum suscipit semper mollis. 
                Phasellus a metus nisl. Suspendisse potenti. Fusce ultricies nulla quis mauris adipiscing, a luctus magna pretium. 
                Ut faucibus, magna fermentum pretium ultrices, felis dui iaculis dui, ut tincidunt dolor tortor vel ligula. 
                Donec sed pellentesque libero. Proin vulputate suscipit nunc id ornare. 
                Sed tincidunt odio ut magna mollis, id eleifend mi rutrum. 
                Praesent tortor purus, ultrices vitae facilisis non, elementum ut mi. Duis euismod varius mollis.
            </p>
            <p>
                Ut iaculis accumsan nisl, eget auctor neque. Phasellus ornare augue vel neque placerat commodo. 
                Nulla ac eros porttitor, laoreet sem ut, aliquam tortor. Vivamus rhoncus tristique neque vitae faucibus. 
                Donec facilisis suscipit massa, nec convallis nibh pretium id. Vivamus luctus tellus non est tincidunt, 
                vel imperdiet lacus suscipit. Cras sodales volutpat lorem ut condimentum. Vivamus ut vestibulum velit. 
                Vestibulum accumsan velit eu nunc ullamcorper euismod. 
            </p>
            <p>
                Nunc fringilla in elit nec vestibulum. Cras non pretium nisl. Praesent semper ac dolor nec vulputate. 
                Cras iaculis facilisis erat. Morbi at felis ligula. Ut sit amet neque sit amet mi congue placerat. 
                Aenean at volutpat metus. Quisque eu neque a est mattis hendrerit aliquet ut tortor. 
                Aenean aliquet purus nisi, quis gravida quam porttitor sed. Suspendisse pulvinar, 
                felis sit amet auctor convallis, massa neque tristique quam, nec sagittis nisi dui ac nibh. 
                Curabitur id quam dignissim, cursus neque ac, rhoncus elit. Sed accumsan porta laoreet. 
                Nam dapibus nisl eu urna eleifend, vel scelerisque est dapibus. Cras lacinia tincidunt enim vitae tempor. 
                Morbi aliquet libero et ipsum ultricies placerat. Maecenas id erat auctor, sollicitudin est eu, 
                dignissim ipsum. Donec dolor nibh, eleifend nec pellentesque eu, porta a tellus. 
                Etiam dolor ligula, varius a elementum at, iaculis interdum nisi. 
                Mauris auctor tortor eget placerat auctor. 
            </p>
            <p>
                Morbi egestas diam at magna dapibus, at iaculis dui accumsan. In ullamcorper cursus tristique. 
                Maecenas leo erat, consectetur vel cursus et, euismod a ligula. Etiam sit amet enim ac odio lobortis euismod. 
                Integer a commodo nunc. Cras a malesuada arcu. Curabitur sed mi convallis, feugiat lacus in, tincidunt dolor. 
                Vivamus vel lacinia nisl. Duis volutpat ligula in augue bibendum, sit amet venenatis lectus porttitor. 
                Praesent nunc neque, dictum eu orci sed, posuere convallis elit. Aliquam at lobortis felis. 
            </p>

            <div class="container" id="comments">
                <h3>Comments</h3>
                <?php
                    if(!$loggedIn){
                ?>
                <h4>Please log in to leave a comment.</h4>
                <?php
                    // Displays Comments input if logged in
                    }elseif($loggedIn == true){ 
                ?>
                <br>
                <form name="comments" method="POST" action="comment.php">
                    <textarea type="text" name="comment" placeholder="Leave a comment" rows="5" style="resize:none; width:100%;"></textarea>
                    <br><br>
                    <input type="submit" value="Post Comment">
                </form>
                <br>
                <?php
                    }            
                    // Read in the comments already posted. 
                    $file = "data/comments.blog";
                    $fh = fopen($file, "r");
                    $data = fread($fh, filesize($file));
                    
                    $comments = explode("#__#", $data);
                    for($i=0; $i<(count($comments)-1); $i++)
                    {
                        // Display username, time and date of posting.
                        $posted = explode("_##_", $comments[$i]);
                        echo("Posted by $posted[0]<br>$posted[2]<br><br> <p>$posted[1]</p> <hr><br>");
                    }
                ?>
                
            </div>
        </div>

        <div class="col-md-2">
            <h4>Previous weeks</h4>
            <dl>
            <?php
            // Used to genereate a list of every Firday this year up until current
            $date = date("Y-01-01");
            $current = date("Y-m-d");
            $updatedMonth = "";
            
            while(strtotime($date) <= strtotime($current))
            {
                $updated = strtotime($date);
                if(date("l", $updated) == "Friday")
                {
                    $month = date("F", $updated);
                    $friday = date("d/m/y", $updated);
                    
                    if($updatedMonth != $month)
                    {
                        echo("<br><br><dt>$month</dt>");
                        $updatedMonth = $month;
                    }
                    
                    echo("<dd> - $friday</dd>");
                } 
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            }
            ?>
            
            </dl>
            
            
            
        </div>
    </div>
</div>

<?php
    require("includes/footer.inc.php");
?>