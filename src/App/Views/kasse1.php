<h2>Kasse</h2>
<hr/>
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
    </tbody>
    <?php } ?>
    </tbody>
</table>
<b><p>Gesamtpreis (ohne Versandgeb&uuml;hren): <?php echo $preis ?> Euro</p></b>
<hr/>
<form class="form-horizontal" role="form" action="kasse1.php" method=post>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-6">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required="required"/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputZusatz" class="col-sm-2 control-label">Zusatz (optional)</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputZusatz" name="zusatz" placeholder="zusatz" />
        </div>
    </div>

    <div class="form-group">
        <label for="inputStr" class="col-sm-2 control-label">Strasse & Nr.</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputStr" name="str" placeholder="str" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPlz" class="col-sm-2 control-label">PLZ</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPlz" name="plz" placeholder="123456" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label for="inputOrt" class="col-sm-2 control-label">Ort</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputOrt" name="ort" placeholder="ort" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label for="inputLand" class="col-sm-2 control-label">Land</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputLand" name="land" value="Deutschland" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label for="inputVersandart" class="col-sm-2 control-label">Versandart</label>
        <div class="col-sm-6">
            <select name="versandart" class="form-control" id="inputVersandart">
                <option value="Standartversand">Standard (+ Euro 1.45)</option>
                <option value="Versandee">Einwurf-Einschreiben (+ Euro 3.00)</option>
                <option value="Versandae">Abgabe-Einschreiben (+ Euro 3.50)</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputZmethode" class="col-sm-2 control-label">Zahlungsmethode</label>
        <div class="col-sm-6">
            <select name="zmethode" class="form-control" id="inputZmethode">
                <option value="Vorkasseu">Vorkasse &Uuml;berweisung (keine Zusatzkosten)</option>
                <option value="Vorkassep">Vorkasse PayPal (keine Zusatzkosten)</option>
                <option value="Rechnung">Rechnung (+ Euro 2.50)</option>
                <option value="Nachnahme">Nachnahme per Post (+ Euro 5.00)</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button name="submit" type="submit" class="btn btn-default">Absenden</button>
        </div>
    </div>

</form>
