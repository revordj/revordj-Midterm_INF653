<?php include('view/addveh_header.php'); ?>
<?php 
if(isset($_POST['class_id'])){
    $del_id = $_POST['class_id'];
    try{
        delete_class($del_id);
    } catch (Exception $e){
        echo('Unable to delete class. Ensure all vehicles associated with it have been deleted.');
    }
    header("Refresh:0");
}

if(isset($_POST['newclass'])){
    $add_class = $_POST['newclass'];
    try{
        add_class($add_class);
    } catch (Exception $e){
        echo('Unable to add class.');
    }
    header("Refresh:0");
}
?>
<section id='secTitle' class='secTitle'>
    Vehicle Class List
</section>
<section id='alterTable' class='alterTable' name='alterTable'>
<table>
    <tr>
        <td name='tableheader' class='tableheader'>Name</td>
    </tr>
    <?php foreach ($vehclass as $vc) :  ?>
    <tr>
        <td name='tablevalue' class='tablevalue'><?= $vc['Class'] ?></td>
        <td>
        <form action="#" method="post">
            <input type="hidden" name="class_id" value="<?= $vc['ID'] ?>">
            <button class="remove-button"> Remove </button>
        </form>
        </td>
    </tr>
    <?php endforeach ?>
</table>
</br>
</section>
<section id='secTitle' class='secTitle'>
    Add Vehicle Class
</section>
<section id='addfield' class='addfield'>
    <form action="#" method="post">
        <label for='newclass'>Name: </label>
        <input type='text' name='newclass' class='newclass'></br>
        <button class="add-button"> Add Class </button>
    </form>
</section>
<?php include('view/footer.php') ?>