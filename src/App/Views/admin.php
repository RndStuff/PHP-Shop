<h2>Admin</h2>
<hr/>
<div class="bestllungen">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Land</td>
                <td>Ort</td>
                <td>PLZ</td>
                <td>EMail</td>
                <td>Waren</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($bestellungen as $bestellung) { ?>
            <tr>
                <td><?php echo $bestellung->getId() ?></td>
                <td><?php echo $bestellung->getLand() ?></td>
                <td><?php echo $bestellung->getOrt(); ?></td>
                <td><?php echo $bestellung->getPlz(); ?></td>
                <td><?php echo $bestellung->getEmail() ?></td>
                <td>
                    <ul>
                    <?php foreach ($bestellung->getWaren() as $ware) { ?>
                        <li><?php echo $ware->getBezeichnung(); ?></li>
                    <?php } ?>
                    </ul>
                </td>
            </tr>
        <?php } //endfor ?>
        </tbody>
    </table>
</div>

