<h2>Produkte</h2>
<hr/>
<div class="waren">
    <?php foreach ($waren as $ware) { ?>
    <div class="ware">
        <div class="panel">
            <div class="panel-heading">
                <?php echo $ware->getBezeichnung(); ?>
                <span class="pull-right">
                    <a href="../setkorb.php?id=<?php echo $ware->getId(); ?>">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                </span>
            </div>
            <div class="panel-body">
                <ul type="square">
                    <li>Preis:</li>
                    <ul>
                        <li><?php echo $ware->getPreis(); ?>Euro</li>
                    </ul>
                        <li>Genaue Beschreibung:</li>
                    <ul>
                        <li><?php echo $ware->getBeschreibung(); ?></li>
                    </ul>
                </ul>
            </div>
        </div>
    <br />
    </div>
    <?php } //endfor ?>
</div>

