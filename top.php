

    <section id="options">

      <a id="summary" target="frame" href="./?summary" class="active">Summary</a>
      <a id="reconcile" target="frame" href="./?reconcile">Reconcile</a>
      <a id="Wins" target="frame" href="./?list=Wins">Wins</a>
      <a id="Draws" target="frame" href="./?list=Draws">Draws</a>
<?php if (!defined('BLOTTO_RBE_ORGS')): ?>
      <a id="Supporters" target="frame" href="./?list=Supporters">Supporters</a>
      <a id="Cancellations" target="frame" href="./?list=Cancellations">Cancellations</a>
      <a id="ANLs" target="frame" href="./?list=ANLs">ANLs</a>
      <a id="Insurance" target="frame" href="./?list=Insurance">Insure</a>
      <a id="Changes" target="frame" href="./?list=Changes">CCRs</a>
      <a id="Updates" target="frame" href="./?list=Updates">CRM</a>
<?php endif; ?>
      <a id="logout" href="./?logout">Log out</a>

    </section>


    <iframe id="frame" name="frame" src="" allowfullscreen>
    </iframe>

    <section id="footer">

      <a id="about" target="frame" href="./?about">About</a>
      <a id="statements" target="frame" href="./?statements">Statements</a>
      <a id="invoices" target="frame" href="./?invoices">Invoices</a>
      <a id="drawreports" target="frame" href="./?drawreports">Draws</a>
      <a id="MoniesWeekly" target="frame" href="./?list=MoniesWeekly">Monies</a>
      <a id="terms" target="frame" href="./?terms">Terms</a>
      <a id="privacy" target="frame" href="./?privacy">Privacy</a>
      <a id="guide" target="frame" href="./?guide">Guide</a>
      <a id="support" target="frame" href="./?support">Support request</a>
      <a id="adminer" target="frame" href="./?list=UpdatesLatest">CRM grab</a>
      <a id="adminer" target="frame" href="./adminer.php">Data</a>
<?php if (!defined('BLOTTO_RBE_ORGS')): ?>
      <a id="bacs" target="frame" href="./?bacs">Mandates</a>
      <a id="supporter" target="frame" href="./?supporter">Supporters</a>
<?php endif; ?>

    </section>


    <img id="logo" src="./logo-org.png"/>
    <img id="logo-blotto" src="./media/logo.png"/>


