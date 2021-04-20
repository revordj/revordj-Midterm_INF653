<?php include('view/header.php') ?>

<section id="inventory" class="inventory">
<table>
    <tr>
        <td> Year </td>
        <td> Make </td>
        <td> Model </td>
        <td> Type </td>
        <td> Class </td>
        <td> Price </td>
        <td>  </td>

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
        <td>
            <form action="." method="get">
            <input type="hidden" name="action" value="delete_vehicle">
            <input type="hidden" name="veh_id" value="<?= $inv['veh_id'] ?>">
            <button class="remove-button"> Remove </button>
            </form>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
</section>

<?php include('view/footer.php'); ?>