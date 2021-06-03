
<?php
include('config.php');
if(!empty($_POST["pas_id"])) 
    {
    $query =mysqli_query($con,"SELECT * FROM subdist WHERE dt_id = '" . $_POST["pas_id"] . "'");
    ?>
    <option value="">Sub District</option>
    <?php
    while($row=mysqli_fetch_array($query))  
    {
        ?>
        <option value="<?php echo $row["sd_id"]; ?>"><?php echo $row["sd_name"]; ?></option>
        <?php
        }
    }
?>