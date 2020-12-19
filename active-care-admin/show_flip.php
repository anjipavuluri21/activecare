<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $_GET['book_name'];
?>
<<script>
    var pdf_src="<?php echo $_GET['book_name'];?>";
</script>
<script src="../pdf-flipbook/pdfjs/viewer.js" type="text/javascript"></script>
