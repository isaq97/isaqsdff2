<?php
include "server_packages.php";
    
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM package WHERE id=$id");
        $record = mysqli_fetch_array($rec);
        $photo = $record['photo'];
        $information = $record['information'];
    }
    
    include "header.php";
    include "menu.php";
?>

<?php
    $link2 = mysqli_connect("localhost","root","");
    mysqli_select_db($link2,"sdf2");
?>
<div class="grid_10">
    <div class="box round first">
        <h2>Product Sales</h2>

        <div class="block">

            <?php
                if(isset($_SESSION['msg'])){ ?>

            <div class="msg">
                <?php
                    echo $_SESSION['msg'];}
                    unset($_SESSION['msg']);
                ?>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>photo</th>
                        <th>information</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($results)){ ?>
                    <tr>
                        <td>
                            <?php echo "<img src='product_image/".$row['photo']."' height='100%' width='30%' />"; ?>
                            <?php //echo $row['photo']; ?>
                        </td>
                        <td>
                            <?php echo $row['information']; ?>
                        </td>
                        <td>
                            <a class="edit_btn" href="add_packages.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="del_btn" href="server_packages.php?del=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>



            <form method="post" action="server_packages.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Photo</label>
                    <input type="file" name="photo" value="<?php echo $photo; ?>">
                </div>
                <div class="input-group">
                    <label>Information</label>
                    <input type="text" name="information" value="<?php echo $information; ?>">
                </div>
                <div class="input-group">
                    <?php if($edit_state == false){ ?>
                    <button type="submit" name="save" class="btn">Save</button>
                    <?php }
                        else { ?>
                    <button type="submit" name="update" class="btn">Update</button>
                    <?php } ?>

                </div>

            </form>

        </div>
    </div>
</div>

<?php
    include "footer.php";
?>
