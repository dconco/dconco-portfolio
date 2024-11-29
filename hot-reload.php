<?php
"<script>
      /**
       * PHPSLIDES HOT RELOAD GENERATED
       *
       * @version $phpslides_version
       * @author Dave Conco <info@dconco.dev>
       * @copyright 2023 - 2024 Dave Conco
       */
       new Worker(URL.createObjectURL(newBlob([`setInterval(function(){fetch('$host',{method:'POST'}).then(r=>r.text()).then(d =>{if('reload'===d){postMessage('reload')}})},1000)`,],{type:'application/javascript'}))).addEventListener('message',(e)=>{if('reload'===e.data){window.location.reload()}})
   </script>\n
</body>";