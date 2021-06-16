
<?php
include('config.php');
if(!empty($_POST["pas_id"])) 
    {
    $query =mysqli_query($con,"SELECT * FROM punchayat WHERE sd_id = '" . $_POST["pas_id"] . "'");
    ?>
    <option value="">Punchayat :</option>
    <?php
    while($row=mysqli_fetch_array($query))  
    {
        ?>
        <option value="<?php echo $row["pn_id"]; ?>"><?php echo $row["pn_name"]; ?></option>
        <?php
        }
    }
?>