<?php include('view/addveh_header.php'); ?>
<?php 
if(isset($_POST['make_id'])){
    $del_id = $_POST['make_id'];
    try{
        delete_make($del_id);
    } catch (Exception $e){
        echo('Unable to delete make. Ensure all vehicles associated with it have been deleted.');
    }
    header("Refresh:0");
}

if(isset($_POST['newmake'])){
    $add_make = $_POST['newmake'];
    try{
        add_make($add_make);
    } catch (Exception $e){
        echo('Unable to add make.');
    }
    header("Refresh:0");
}
?>
<section id='secTitle' class='secTitle'>
    Vehicle Make List
</section>
<section id='alterTable' class='alterTable' name='alterTable'>
<table>
    <tr>
        <td name='tableheader' class='tableheader'>Name</td>
    </tr>
    <?php foreach ($vehmakes as $vm) :  ?>
    <tr>
        <td name='tablevalue' class='tablevalue'><?= $vm['Make'] ?></td>
        <td>
        <form action="#" method="post">
            <input type="hidden" name="make_id" value="<?= $vm['ID'] ?>">
            <button class="remove-button"> Remove </button>
        </form>
        </td>
    </tr>
    <?php endforeach ?>
</table>
</br>
</section>
<section id='secTitle' class='secTitle'>
    Add Vehicle Make
</section>
<section id='addfield' class='addfield'>
    <form action="#" method="post">
        <label for='newmake'>Name: </label>
        <input type='text' name='newmake' class='newmake'></br>
        <button class="add-button"> Add Make </button>
    </form>
</section>
<?php include('view/footer.php') ?>