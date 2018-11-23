<?php
include "server.php";
    
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
        $record = mysqli_fetch_array($rec);
        $icon = $record['icon'];
        $header = $record['Header'];
        $body = $record['Body'];
        $details = $record['Details'];
            
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
                        <th>Icon</th>
                        <th>Header</th>
                        <th>Body</th>
                        <th>Details</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($results)){ ?>
                    <tr>
                        <td>
                            <?php echo "<img src='product_image/".$row['icon']."' height='100%' width='30%' />"; ?>
                        </td>   
                        <td>
                            <?php echo $row['Header']; ?>
                        </td>
                        <td>
                            <?php echo $row['Body']; ?>
                        </td>
                        <td>
                            <?php echo $row['Details']; ?>
                        </td>
                        <td>
                            <a class="edit_btn" href="add_booking.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>



            <form method="post" action="server.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Icon</label>
                    <input type="file" name="icon" value="<?php echo $icon; ?>">
                </div>
                <div class="input-group">
                    <label>Header</label>
                    <input type="text" name="header" value="<?php echo $header; ?>">
                </div>
                <div class="input-group">
                    <label>Body</label>
                    <input type="text" name="body" value="<?php echo $body; ?>">
                </div>
                <div class="input-group">
                    <label>Details</label>
                    <input type="text" name="details" value="<?php echo $details; ?>">
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
