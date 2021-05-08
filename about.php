
    <section id="about" class="content">

        <table id="system-info" class="report">
          <caption>System information</caption>
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
              <td>Website integration demo</td>
              <td><a target="_blank" href="./demo.php">View</a></td>
            </tr>
            <tr>
              <td>Small-print template</td>
              <td>
                <a id="small-print-view" href="#">View</a>
                <div id="small-print">
                  <h2>Small-print template</h2>
Coming soon...
                </div>
              </td>
            </tr>
          </tbody>
        </table>

        <h2>About our services</h2>

        <h4>Your account administrator</h4>

        <h4>The services we provide</h4>

        <h4>Company address</h4>


    </section>

    <script>
document.body.classList.add ('framed');
window.top.menuActivate ('about');
    </script>



