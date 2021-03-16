<?php include('view/addveh_header.php');
$successfulAdd=false;

if(isset($_POST['aMake'])){
    $aMake=$_POST['aMake'];
    $aType=$_POST['aType'];
    $aClass=$_POST['aClass'];
    $aYear=$_POST['aYear'];
    $aModel=$_POST['aModel'];
    $aPrice=$_POST['aPrice'];
    add_vehicle($aMake, $aType, $aClass, $aYear, $aModel, $aPrice);

    $successfulAdd = true;
}
?>
<?php if($successfulAdd){ ?>
    </br>
    <div class="success"> <?= $aModel ?> added successfully </div>
<?php } ?>
<section id='secTitle' class='secTitle'>
</br>
        Add Vehicle
        </section>
<form action="#" method="post">
    <div class="add__inputs">
        </br>
        <label>Make:</label>
        <select name='aMake'>
            <?php foreach ($vehmakes as $vm) : ?>
                <option value="<?= $vm['ID'] ?>"><?= $vm['Make'] ?></option>
            <?php endforeach ?>
        </select>
        </br>
        </br>
        <label>Type:</label>
        <select name='aType'>
            <?php foreach ($vehtypes as $vt) : ?>
                <option value="<?= $vt['ID'] ?>"><?= $vt['vType'] ?></option>
            <?php endforeach ?>
        </select>
        </br>
        </br>
        <label>Class:</label>
        <select name='aClass'>
            <?php foreach ($vehclass as $vc) : ?>
                <option value="<?= $vc['ID'] ?>"><?= $vc['Class'] ?></option>
            <?php endforeach ?>
        </select>
        </br>
        </br>
        <label>Year:</label>
        <input type='text' name='aYear' class='aYear'>
        </br>
        </br>
        <label>Model:</label>
        <input type='text' name='aModel' class='aModel'>
        </br>
        </br>
        <label>Price:</label>
        <input type='text' name='aPrice' class='aPrice'>
        
    </div>
    </br>
    <button class="add-button"> Add Vehicle </button></br>
</form>

<?php include('view/footer.php') ?>