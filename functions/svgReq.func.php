<?php

  function svgReq($req) {
    if ($req === 'close') {
      echo '<svg class="close" onclick="document.getElementById(\'message\').hidden = true;"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>';
    }
  }

 ?>
