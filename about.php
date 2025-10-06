<?php

// Prizes for upcoming draws
$draws          = [];
$dt             = new \DateTime ();
for ($i=0;$i<10;$i++) {
    $dc         = draw_upcoming ($dt->format ('Y-m-d'));
    if ($dc>=BLOTTO_DRAW_CLOSE_1) {
        $draws[] = draw ($dc);
    }
    $dt         = new \DateTime ($dc);
    if ($i==0) {
        $dcday  = $dt->format ('l');
    }
    $dt->add (new DateInterval('P1D'));
}

// Preferences
$oid = BLOTTO_ORG_ID;
$zo = connect (BLOTTO_CONFIG_DB,BLOTTO_UN,BLOTTO_PW);
$preferences = $zo->query ("SELECT `p_number`,`legend` FROM `blotto_field` WHERE `org_id`=$oid");
$preferences =$preferences->fetch_all (MYSQLI_ASSOC);

?>

    <section id="about" class="content about">

        <h2>System information</h2>

        <table class="report">
          <tbody>
            <tr>
              <td colspan="2"><strong>About us</strong></td>
            </tr>
            <tr>
              <td>Our address</td>
              <td><?php require __DIR__.'/address.php'; ?></td>
            </tr>
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
              <td colspan="2">Prizes @ <?php echo $d->date; ?> (closed <strong><?php echo $d->closed; ?></strong>)</td>
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
          </tbody>
        </table>

    </section>


    <section id="configuration" class="content about">

      <script>
document.addEventListener (
    'DOMContentLoaded',
    function ( ) {
        var a,as,url
        url = document.URL.split ('?');
        url = url[0];
        as = document.body.querySelectorAll ('a.write-url');
        for (a of as) {
            a.innerText = url + a.innerText;
        }
    }
);
      </script>

      <form method="post" action="">

        <table class="report">
          <tbody>
            <tr>
              <td colspan="2"><h2>Technical details</h2></td>
            </tr>
            <tr>
              <td colspan="2"><h3>Required by you</h3></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Integration details</strong></td>
            </tr>
            <tr>
              <td>Web APIs</td>
              <td><a target="_blank" href="./demo.php">View demo source code</a></td>
            </tr>
            <tr>
              <td>Self-service sign-up (direct debit) URL</td>
              <td><a class="write-url" target="_blank" href="./sss.php">sss.php</a></td>
            </tr>
            <tr>
              <td>Online tickets (ad hoc) URL</td>
              <td><a class="write-url" target="_blank" href="./tickets.php">tickets.php</a></td>
            </tr>
            <tr>
              <td>Online tickets (promotional draw) URL</td>
              <td><a class="write-url" target="_blank" href="./tickets.php?d=2022-04-07">tickets.php?d=2022-04-07</a></td>
            </tr>
<?php foreach (www_pay_apis() as $code=>$api): ?>
            <tr>
              <td>One-off online tickets payment provider callback URL (<?php echo htmlspecialchars ($code); ?>)</td>
              <td><a class="write-url" href="./callback.php?p=<?php echo htmlspecialchars ($code); ?>">callback.php?p=<?php echo htmlspecialchars ($code); ?></a></td>
            </tr>
<?php endforeach; ?>
            <tr>
              <td colspan="2"><h3>Provided by you</h3></td>
            </tr>
<?php $org = org (); ?>
            <tr>
              <td colspan="2"><strong>Self-service sign-up</strong></td>
            </tr>
            <tr>
              <td>SUN (direct debit service user number)</td>
              <td><?php if (defined('BLOTTO_SSS_SUN') && BLOTTO_SSS_SUN) {echo htmlspecialchars (BLOTTO_SSS_SUN);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>General</strong></td>
            </tr>
            <tr>
              <td>Terms &amp; conditions URL</td>
              <td><?php if ($org['signup_url_terms']) {echo htmlspecialchars ($org['signup_url_terms']);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>
            <tr>
              <td>Privacy statement URL</td>
              <td><?php if ($org['signup_url_privacy']) {echo htmlspecialchars ($org['signup_url_privacy']);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>
            <tr>
              <td>Supporter contact email</td>
              <td><?php if ($org['admin_email']) {echo htmlspecialchars ($org['admin_email']);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>
            <tr>
              <td>Supporter contact telephone</td>
              <td><?php if ($org['admin_phone']) {echo htmlspecialchars ($org['admin_phone']);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>
            <tr>
              <td>Self-exclusion email address</td>
              <td><?php if (defined('BLOTTO_SSS_SELFEX_EMAIL') && BLOTTO_SSS_SELFEX_EMAIL) {echo htmlspecialchars (BLOTTO_SSS_SELFEX_EMAIL);} else { echo '[Please report to administrator]'; } ?></td>
            </tr>  

            <tr>
              <td colspan="2"><strong>Preference columns</strong></td>
            </tr>
<?php foreach ($preferences as $i=>$p): ?>
            <tr>
              <td>p<?php echo $p['p_number']; ?></td>
              <td><?php echo htmlspecialchars ($p['legend']); ?></td>
            </tr>
<?php endforeach; ?>
            <tr>

            <tr>
              <td colspan="2"><h3>Other configuration</h3></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Fees @ <?php echo gmdate ('Y-m-d'); ?></strong></td>
            </tr>
<?php if (!count($fees=fees())): ?>
            <tr>
              <td>No fees configured</td>
              <td><a target="_blank" href="./demo.php">View demo source code</a></td>
            </tr>
<?php else: ?>
<?php     foreach ($fees as $code=>$fee): ?>
<?php         if ($code!='total'): ?>
            <tr>
              <td><code><?php echo htmlspecialchars ($code); ?></code><?php echo htmlspecialchars ($fee['notes']); ?></td>
              <td><code><?php echo htmlspecialchars (BLOTTO_CURRENCY) . number_format ($fee['rate']/100,2,'.',''); ?></code></td>
            </tr>
<?php         endif; ?>
<?php     endforeach; ?>
<?php endif; ?>

            <tr>
              <td colspan="2"><h3>Tests</h3></td>
            </tr>
            <tr>
              <td colspan="2"><strong>ANL email templates</strong></td>
            </tr>
            <tr>
              <td>Email address</td>
              <td>
                <input type="email" name="email" placeholder="Send test to this email" />
              </td>
            </tr>
            <tr>
              <td>Template ref</td>
              <td>
                <input type="text" name="template_ref" placeholder="Mailing service ID" />
              </td>
            </tr>
            <tr>
              <td>Template type</td>
              <td>
                <input type="submit" name="test_email_anl" value="Send random ANL" />
                <input type="submit" name="test_email_win" value="Send random winner letter" />
              </td>
            </tr>

          </tbody>
        </table>

    </form>

    </section>


    <script>
document.body.classList.add ('framed');
window.top.menuActivate ('about');
    </script>



