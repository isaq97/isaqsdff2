<?php
include "server_hotels.php";
    
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM hotels WHERE id=$id");
        $record = mysqli_fetch_array($rec);
        $visit_from = $record['visit_from'];
        $visit_to = $record['visit_to'];
        $start_date = $record['start_date'];
        $return_date = $record['return_date'];
        $adult = $record['adult'];
        $child = $record['child'];
            
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
        <h2>HOTELS</h2>

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
                        <th>Visit From</th>
                        <th>Visit To</th>
                        <th>Start Date</th>
                        <th>Return Date</th>
                        <th>Adult</th>
                        <th>Child</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($results)){ ?>
                    <tr>
                        <td>
                            <?php echo $row['visit_from']; ?>
                        </td>
                        <td>
                            <?php echo $row['visit_to']; ?>
                        </td>
                        <td>
                            <?php echo $row['start_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['return_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['adult']; ?>
                        </td>
                        <td>
                            <?php echo $row['child']; ?>
                        </td>
                        <td>
                            <a class="edit_btn" href="add_hotels.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="del_btn" href="server_hotels.php?del=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>



            <form method="post" action="server_hotels.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Visit From</label>
                    <input type="text" name="visit_from" value="<?php echo $visit_from; ?>">
                </div>
                <div class="input-group">
                    <label>Visit To</label>
                    <input type="text" name="visit_to" value="<?php echo $visit_to; ?>">
                </div>
                <div class="input-group">
                    <label>Start Date</label>
                    <input type="text" name="start_date" value="<?php echo $start_date; ?>">
                </div>
                <div class="input-group">
                    <label>Return Date</label>
                    <input type="text" name="return_date" value="<?php echo $return_date; ?>">
                </div>
                <div class="input-group">
                    <label>Adult</label>
                    <input type="text" name="adult" value="<?php echo $adult; ?>">
                </div>
                <div class="input-group">
                    <label>Child</label>
                    <input type="text" name="child" value="<?php echo $child; ?>">
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
