<h1 class="text-center">Please do not refresh this page...</h1>
<form method="post" action="<?php echo $transaction_url; ?>" name="f1">
    <table border="1">
        <tbody>
        <?php
        foreach($paramList as $name => $value) {
            echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
        }
        ?>
        <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </tbody>
    </table>
    <script type="text/javascript">
        document.f1.submit();
    </script>
</form>