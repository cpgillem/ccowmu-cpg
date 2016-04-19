<!DOCTYPE html>
<?php
  require("vendor/erusev/parsedown/Parsedown.php");
?>
<html lang="en">

  <head>

    <title>cpg</title>


    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'/>


    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="site.css"/>

  </head>


  <body>

    <div class="container">

      <div class="page-header">
        <h1>CPG <small>Secretary of Computer Club</small></h1>
      </div>


      <div class="row">

        <div class="col-sm-12">

          <?php
            $parsedown = new Parsedown();

            /* Get the last meeting's minutes and a link to their page. */
            $lastMinutesDate = strtotime("last thursday", time());

            $first = TRUE;
            $minutes = FALSE;

            /* If the minutes haven't been found yet: */
            while (! $minutes) {

              if (! $first) {
                /* Set the minutes day to be one week prior. */
                $lastMinutesDate = strtotime("-1 week", $lastMinutesDate);
              }

              /* Try to obtain minutes from the Github repo. */
              $minutes = file_get_contents(sprintf("https://raw.githubusercontent.com/ccowmu/minutes/master/minutes/%s.md", date("Ymd", $lastMinutesDate)));

              $first = FALSE;

            }

            /* Get a URL for a user-friendly page containing the minutes. */
            $cclubPage = sprintf("https://cclub.cs.wmich.edu/minutes/%s/minutes.html", date("Y/m/d", $lastMinutesDate));
          ?>


          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">Last Meeting's Minutes</h3>
            </div>


            <div class="panel-body minutes">
              <a href="<?php echo $cclubPage; ?>">Read on the computer club site</a><hr/>
              <?php echo $parsedown->text($minutes); ?>
            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-sm-12 col-md-4">

          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">Links</h3>
            </div>


            <div class="panel-body">

              <p>
                Personal Website and Blog<br/>
                <a href="http://cadegillem.me">cadegillem.me</a>
              </p>


              <p>
                Github<br/>
                <a href="http://github.com/cpgillem">github.com/cpgillem</a>
              </p>


              <p>
                Computer Club<br/>
                <a href="http://cclub.cs.wmich.edu">cclub.cs.wmich.edu</a>
              </p>


              <p>
                Twitter<br/>
                <a href="http://twitter.com/cpgillem">@cpgillem</a>
              </p>


              <p>
                LinkedIn<br/>
                <a href="http://linkedin.com/in/cpgillem">linkedin.com/in/cpgillem</a>
              </p>

            </div>

          </div>

        </div>

        <div class="col-sm-12 col-md-4">

          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">Contact Information</h3>
            </div>

            <div class="panel-body">
              <p>
                Email<br/>
                <a href="mailto:cade.p.gillem@wmich.edu">cade.p.gillem@wmich.edu</a>
              </p>


              <p>
                Yakko Email<br/>
                <a href="mailto:cpg@yakko.cs.wmich.edu">cpg@yakko.cs.wmich.edu</a>
              </p>
            </div>

          </div>

        </div>

        <div class="col-sm-12 col-md-4">

          <div class="panel panel-default">

            <div class="panel-heading">
              <h3 class="panel-title">Projects</h3>
            </div>

            <div class="panel-body">

              <p>
                Personal Site<br/>
                <a href="http://github.com/cpgillem/cadegillem.me">Github Repo</a>
              </p>


              <p>
                Western Student Association Site<br/>
                <a href="http://westernstudentassociation.org/">Link</a>
              </p>


              <p>
                ACS Site<br/>
                <a href="http://github.com/acswmu/acs-wmu-official-site">Github Repo</a>
              </p>

            </div>

          </div>

        </div>

      </div>

    </div>

  </body>

</html>
