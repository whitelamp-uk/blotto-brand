<?php
// Prizes for next four draws
$draws          = [];
$dt             = new \DateTime ();
for ($i=0;$i<5;$i++) {
    $dc         = draw_upcoming ($dt->format ('Y-m-d'));
    $draws[]    = draw ($dc);
    $dt         = new \DateTime ($dc);
    $dt->add (new DateInterval('P1D'));
}
?>

    <section id="about" class="content">

        <h2>System information</h2>

        <table class="report">
          <tbody>
            <tr>
              <td>Product</td>
              <td><?php echo htmlspecialchars(ucwords(BLOTTO_BRAND)); ?> <?php version(); ?></td>
            </tr>
            <tr>
              <td>Game code</td>
              <td><?php echo htmlspecialchars(strtoupper(BLOTTO_ORG_USER)); ?></td>
            </tr>
            <tr>
              <td>Data last imported</td>
              <td><?php echo htmlspecialchars(built_at('%Y %b %d @ %H:%i')); ?></td>
            </tr>
            <tr>
              <td>Proof</td>
              <td><a target="_blank" href="./proof/">Browse</a></td>
            </tr>
<?php foreach ($draws as $d): ?>
            <tr>
              <td colspan="2"><strong>Prizes @ <?php echo $d->date; ?></strong> (closed <?php echo $d->closed; ?>)</td>
            </tr>
<?php     foreach ($d->prizes as $p): ?>
            <tr>
              <td>Prize <?php echo intval($p['level']); ?></td>
              <td>
                <?php echo htmlspecialchars ($p['name']); ?>
<?php         if ($p['insure']): ?>
                (insured)
<?php         endif; ?>
<?php         if ($p['quantity']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity']); ?>
<?php         endif; ?>
<?php         if ($p['quantity_percent']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity_percent']); ?>%
<?php         endif; ?>
<?php         if ($p['amount']): ?>
                <br/>
                Monetary value: <?php echo htmlspecialchars (BLOTTO_CURRENCY.$p['amount']); ?>
<?php         endif; ?>
<?php         if ($p['function_name']): ?>
                <br/>
                Function: <?php echo htmlspecialchars ($p['function_name']); ?>()
<?php         endif; ?>
              </td>
            </tr>
<?php     endforeach; ?>
<?php endforeach; ?>
            <tr>
              <td>Our address</td>
              <td><?php require __DIR__.'/address.php'; ?></td>
            </tr>
          </tbody>
        </table>

    </section>

    <script>
document.body.classList.add ('framed');
window.top.menuActivate ('about');
    </script>



