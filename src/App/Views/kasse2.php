<h2>Kasse2</h2>
<hr />
<table class="table">
    <thead>
        <tr>
            <td>Art.-Nr.</td>
            <td>Bezeichnung</td>
            <td>Preis</td>
        </tr>
    </thead>
    <tbody>
    <?php if (count($waren) !== 0) { ?>
        <?php foreach ($waren as $ware) { ?>
            <tr>
                <td><?php echo $ware->getId(); ?></td>
                <td><?php echo $ware->getBezeichnung(); ?></td>
                <td><?php echo $ware->getPreis(); ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="4">
                <em>keine waren im Korb</em>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<form action="kasse2.php" method="POST">
    <input type="submit" class="formsubmit" name="submit" value="Abschlie&szlig;en">
</form>
