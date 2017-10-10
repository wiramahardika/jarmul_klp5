<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>The Super Ultimate Multimedia Conversion</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style media="screen">
      /* layout.css Style */
      .upload-drop-zone {
      height: 200px;
      border-width: 2px;
      margin-bottom: 20px;
      }

      /* skin.css Style*/
      .upload-drop-zone {
      color: #ccc;
      border-style: dashed;
      border-color: #ccc;
      line-height: 200px;
      text-align: center
      }
      .upload-drop-zone.drop {
      color: #222;
      border-color: #222;
      }
    </style>

  </head>
  <body>
    <div class="container" style="padding-top:1em">
      <div class="panel panel-default">
        <div class="panel-heading">The Super Ultimate File Conversion</div>
        <div class="panel-body">
          <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#image">Image</a></li>
            <li><a data-toggle="pill" href="#audio">Audio</a></li>
            <li><a data-toggle="pill" href="#video">Video</a></li>
          </ul>

          <div class="tab-content">
            <div id="image" class="tab-pane fade in active" style="padding-top:1em;">
              <form>
                <div class="form-group">
                  <label>Color Depth</label>
                  <select class="form-control">
                    <option selected disabled>Color Depth</option>
                    <option>1 bit (Monochrome)</option>
                    <option>2 bit (Greyscale)</option>
                    <option>16 bit (High color)</option>
                    <option>24 bit (True color)</option>
                    <option>32 bit (Deep color)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Resolution</label>
                  <div class="input-group" style="margin-bottom:1em;">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">x</span>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Upload File:</label>
                  <input type="file" class="form-control" id="email" style="height:10em;">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
