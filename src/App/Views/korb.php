<h2>Warenkorb</h2><hr/>

<table class="table">
    <thead>
        <tr>
            <td>Art.-Nr.</td>
            <td>Bezeichnung</td>
            <td>Preis</td>
            <td>&nbsp</td>
        </tr>
    </thead>
    <tbody>
    <?php if (count($waren) !== 0) { ?>
        <?php foreach ($waren as $ware) { ?>
        <tr>
            <td><?php echo $ware->getId(); ?></td>
            <td><?php echo $ware->getBezeichnung(); ?></td>
            <td><?php echo $ware->getPreis(); ?></td>
            <td>
                <a href="loesch.php?id=<?php echo $ware->getId(); ?>" class="del">L&ouml;schen</a>
            </td>
        </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="4">
                <em>keine waren im Korb</em>
            </td>
        </tr>
    </tbody>
    <?php } ?>
</table>
<br />
<b>Gesamt:</b> <?php echo $preis ?> Euro
