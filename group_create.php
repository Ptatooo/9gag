<html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="well">
    <ul class="nav nav-tabs">
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" align="center">
      
        <form action="group_create_insert.php" method="post" id="tab" enctype="multipart/form-data">
            <label>Group name</label>
            <input type="text" name="ime" class="input-xlarge">
            <label>A quick description</label>
            <input type="text" name="opis" class="input-xlarge">
          	<div>
        	    <input type="submit" name="submit" class="btn btn-primary" value="Create">
                </form>
        	</div>
      </div>
  </div>
  </body>
  </html>