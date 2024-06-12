<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <title>XORUME PODCAST</title>
  </head>
  <body data-bs-theme="dark">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a 
          hx-get="/" 
          hx-target="body" 
          hx-trigger="click" 
          class="navbar-brand"
        >
          XORUME PODCAST
        </a>
        <?php
            if (!$_ENV['API_URL']) {
        ?>
            <img
              src="/static/xorume_perfil.png"
              alt="Logo"
              width="80"
              height="80"
              hx-get="/upload" 
              hx-target="#container" 
              hx-trigger="click" 
            />
          <?php
            }
            ?>
      </div>
    </nav>
    <div
      class="m-4 d-flex justify-content-center align-items-center flex-column" 
      id="container"
      hx-get="<?php echo $api_url ?>/episodes"
      hx-trigger="load"
      hx-target="#episodes"
      hx-indicator="#indicator"
    >
      <h2>EPISÓDIOS</h2>
      <div style="width: 40%" id="episodes"></div>
      <div class="d-flex justify-content-center align-items-center m-3">
        <div id="indicator" class="spinner-border htmx-indicator" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
    <script
      src="https://unpkg.com/htmx.org@1.9.12"
      integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
