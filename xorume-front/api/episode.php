<?php
$name = explode(".", $_GET['name'])[0];
$path = $_GET['path'];
?>
<div 
  hx-get="<?php echo $api_url ?>/episode?path=<?php echo $path ?>"
  hx-trigger="load"
  hx-target="#title"
  hx-swap="afterend"
  hx-indicator="#indicator"
  class="d-flex justify-content-center align-items-center flex-column"
>
  <h1 id="title"><?php echo $name ?></h1>
  <a
    class="btn btn-success" 
    hx-get="/" 
    hx-target="body" 
    hx-swap="innerHTML"
  >Voltar</a>
  <div class="d-flex justify-content-center align-items-center m-3">
    <div id="indicator" class="spinner-border htmx-indicator" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</div>
