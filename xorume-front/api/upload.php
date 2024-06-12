<form 
  hx-post="<?php echo $api_url ?>/episode"  
  hx-encoding="multipart/form-data"
  hx-indicator="#indicator"
  hx-target="#resp"
>
  <div class="mb-3">
    <label for="inputPassword5" class="form-label">Password</label>
    <input 
      type="password" 
      name="password"
      id="inputPassword5" 
      class="form-control" 
      aria-describedby="passwordHelpBlock"
    >
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input 
      type="text" 
      name="name"
      id="name" 
      class="form-control" 
    >
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">File</label>
    <input class="form-control" name="file" type="file" id="file">
  </div>
  <button class="btn btn-success mb-3" type="submit">Submit</button>
  <div id="resp"></div>
  <div class="d-flex justify-content-center align-items-center m-3">
    <div id="indicator" class="spinner-border htmx-indicator" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</form>
