<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/public.css" />
    <title>Zippy's Used Autos</title>

</head>
<body>
    <main class="main">
        <section id='headerContent' class='headerContent'>
            <p class='title' id='title'> Zippy Used Autos </p>
            
        </section>
        <section id='logon'>
        <?php 
        if(!(isset($_GET['firstname']))){ ?>
            <a href='index.php?action=register'>Register</a>
         <?php } else { ?>
         First name is set
         <?php } ?>
            <hr>
        </section>
        <?php 
        if($_GET['action'] != 'register'){ ?>
            <section id='dropdown_forms' class='dropdown_forms'>
            <form action="." method="get" id="list__header_select" class="list__header_select">
                <select name="makeID">
                    <option value="0">View All Makes</option>
                    <?php $vehmakes = get_make() ?>
                    <?php foreach ($vehmakes as $vm) : ?>
                        <?php if($makeID == $vm['ID']) { ?>
                            <option value="<?= $vm['ID'] ?>" selected><?= $vm['Make'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $vm['ID'] ?>"><?= $vm['Make'] ?></option>
                        <?php } ?>

                    <?php endforeach; ?>
                </select>
                <br>
                <select name="typesID">
                    <option value="0">View All Types</option>
                    <?php $vehtypes = get_type() ?>
                    <?php foreach ($vehtypes as $vt) : ?>
                        <?php if($typesID == $vt['ID']) { ?>
                            <option value="<?= $vt['ID'] ?>" selected><?= $vt['vType'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $vt['ID'] ?>"><?= $vt['vType'] ?></option>
                        <?php } ?>

                    <?php endforeach; ?>
                </select>
                </br>
                <select name="classesID">
                    <option value="0">View All Classes</option>
                    <?php $vehclass = get_veh_class() ?>
                    <?php foreach ($vehclass as $vc) : ?>
                        <?php if($classesID == $vc['ID']) { ?>
                            <option value="<?= $vc['ID'] ?>" selected><?= $vc['Class'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $vc['ID'] ?>"><?= $vc['Class'] ?></option>
                        <?php } ?>

                    <?php endforeach; ?>
                </select>
                 <section id='btnSection' class='btnSection'> 
                    Sort by: 
                    <input type="radio" id="rdoprice" name="rdosort" value="price" checked>
                    <label for="rdoprice">Price</label>
                    <input type="radio" id="rdoyear" name="rdosort" value="rdoyear">
                    <label for="rdoyear">Year</label>
                    <button class="add-button bold">Submit</button>
                </section>
            
            </form>
        <?php } ?>
       