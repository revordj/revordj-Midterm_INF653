<?php include('view/addveh_header.php'); ?>
<?php 
if(isset($_POST['type_id'])){
    $del_id = $_POST['type_id'];
    try{
        delete_type($del_id);
    } catch (Exception $e){
        echo('Unable to delete type. Ensure all vehicles associated with it have been deleted.');
    }
    header("Refresh:0");
}

if(isset($_POST['newtype'])){
    $add_type = $_POST['newtype'];
    try{
        add_type($add_type);
    } catch (Exception $e){
        echo('Unable to add type.');
    }
    header("Refresh:0");
}
?>
<section id='secTitle' class='secTitle'>
    Vehicle Type List
</section>
<section id='alterTable' class='alterTable' name='alterTable'>
<table>
    <tr>
        <td name='tableheader' class='tableheader'>Name</td>
    </tr>
    <?php foreach ($vehtypes as $vt) :  ?>
    <tr>
        <td name='tablevalue' class='tablevalue'><?= $vt['vType'] ?></td>
        <td>
        <form action="#" method="post">
            <input type="hidden" name="type_id" value="<?= $vt['ID'] ?>">
            <button class="remove-button"> Remove </button>
        </form>
        </td>
    </tr>
    <?php endforeach ?>
</table>
</br>
</section>
<section id='secTitle' class='secTitle'>
    Add Vehicle Type
</section>
<section id='addfield' class='addfield'>
    <form action="#" method="post">
        <label for='newtype'>Name: </label>
        <input type='text' name='newtype' class='newtype'></br>
        <button class="add-button"> Add Type </button>
    </form>
</section>
<?php include('view/footer.php') ?>