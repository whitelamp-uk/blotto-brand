
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



