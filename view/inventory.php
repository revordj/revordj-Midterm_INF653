<?php include('view/header.php') ?>

<section id="inventory" class="inventory">
<table>
    <tr id='invTableHeader' class='invTableHeader'>
        <td> Year </td>
        <td> Make </td>
        <td> Model </td>
        <td> Type </td>
        <td> Class </td>
        <td> Price </td>

    </tr>
   <?php foreach($inventory as $inv) : ?>
    <tr>
        <td><?= $inv['year'] ?> </td>
        <td><?= $inv['Make'] ?> </td>
        <td><?= $inv['model'] ?> </td>
        <td><?= $inv['vtype'] ?> </td>
        <td><?= $inv['Class'] ?> </td>
        <td><?php $unform = $inv['price'];
        $formatted = sprintf('%01.2f', $unform);
        echo('$' . $formatted);
        ?> </td>

    </tr>
    <?php endforeach; ?>
</table>
</section>

<?php include('view/footer.php'); ?>