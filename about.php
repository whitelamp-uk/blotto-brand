<?php
$sat_next = new \DateTime ('2022-07-23');
$sat_next->add (new DateInterval('P1D'));
while ($sat_next->format('w')!=6) {
    $sat_next->add (new DateInterval('P1D'));
}
$sat_next = $sat_next->format ('Y-m-d');
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
            <tr>
              <td colspan="2"><strong>Prizes @ <?php echo gmdate ('Y-m-d'); ?></strong></td>
            </tr>
<?php foreach (prizes(gmdate('Y-m-d')) as $p): ?>
            <tr>
              <td>Prize <?php echo intval($p['level']); ?></td>
              <td>
                <?php echo htmlspecialchars ($p['name']); ?>
<?php     if ($p['insure']): ?>
                (insured)
<?php     endif; ?>
<?php     if ($p['quantity']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity']); ?>
<?php     endif; ?>
<?php     if ($p['quantity_percent']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity_percent']); ?>%
<?php     endif; ?>
<?php     if ($p['amount']): ?>
                <br/>
                Monetary value: <?php echo htmlspecialchars (BLOTTO_CURRENCY.$p['amount']); ?>
<?php     endif; ?>
<?php     if ($p['function_name']): ?>
                <br/>
                Function: <?php echo htmlspecialchars ($p['function_name']); ?>()
<?php     endif; ?>
              </td>
            </tr>
<?php endforeach; ?>
            <tr>
              <td colspan="2"><strong>Prizes @ <?php echo $sat_next; ?></strong></td>
            </tr>
<?php foreach (prizes($sat_next) as $p): ?>
            <tr>
              <td>Prize <?php echo intval($p['level']); ?></td>
              <td>
                <?php echo htmlspecialchars ($p['name']); ?>
<?php     if ($p['insure']): ?>
                (insured)
<?php     endif; ?>
<?php     if ($p['quantity']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity']); ?>
<?php     endif; ?>
<?php     if ($p['quantity_percent']): ?>
                <br/>
                Quantity: <?php echo htmlspecialchars ($p['quantity_percent']); ?>%
<?php     endif; ?>
<?php     if ($p['amount']): ?>
                <br/>
                Monetary value: <?php echo htmlspecialchars (BLOTTO_CURRENCY.$p['amount']); ?>
<?php     endif; ?>
<?php     if ($p['function_name']): ?>
                <br/>
                Function: <?php echo htmlspecialchars ($p['function_name']); ?>()
<?php     endif; ?>
              </td>
            </tr>
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



