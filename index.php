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

      <!-- PAGE HEADER -->
      <div class="page-header">
        <h1>Cade Gillem</h1>
      </div>

      <!-- PAGE CONTAINER -->
      <div class="row">

        <!-- MAIN CONTENT -->
        <div class="col-sm-12 col-md-8">

          <!-- ABOUT -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">About Me</h3>
            </div>

            <div class="panel-body">
              <p>I'm Cade Gillem, a fourth year Computer Club member and Computer Science major. I work as a software engineer for the Computer Aided Engineering Center, which is part of the College of Engineering and Applied Sciences, and work on a lot of personal projects in my free time.</p>

              <p><em>Editor of Choice:</em> vim</p>

              <p><em>Things I can help you with or at least attempt to:</em> Java, C/C++, Python, PHP, HTML/CSS, SQL, Laravel, possibly more.</p>

              <p><em>Things I want to get better at:</em> JavaScript, SQL, Haskell, Go, Rust, Assembly, Linux, Security, Server Administration, Life</p>

              <p><em>Classes I've Taken:</em> CS1110, CS1120, CS1106 (not required anymore, thank Christ), CS1310, CS4430, CS2230, CS2240 (now CS3240), CS 3310</p>

              <p><em>Things I like:</em> music (indie, punk, emo, and metal), TV shows, road trips, making pixel art, Minecraft, Team Fortress 2, Overwatch, and probably more things.</p>
            </div>
          </div>
          <!-- END ABOUT -->

          <!-- MINUTES -->
          <div class="panel panel-default">
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

            <div class="panel-heading">
              <h3 class="panel-title">Last Meeting's Minutes</h3>
            </div>

            <div class="panel-body minutes">
              <a href="<?php echo $cclubPage; ?>">Read on the computer club site</a><hr/>
              <?php echo $parsedown->text($minutes); ?>
            </div>
          </div>
          <!-- END MINUTES -->

        </div>
        <!-- END MAIN CONTENT -->

        <!-- SIDEBAR -->
        <div class="col-sm-12 col-lg-4">

          <!-- CONTACT SECTION -->
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
          <!-- END CONTACT SECTION -->

          <!-- LINKS SECTION -->
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
                PLAN<br/>
                <a href="http://whatistheplan.com">whatistheplan.com</a>
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

          <!-- PROJECTS SECTION -->
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
                ACS Site<br/>
                <a href="http://github.com/acswmu/acs-wmu-official-site">Github Repo</a>
              </p>

              <p>
                This Site<br/>
                <a href="http://github.com/cpgillem/ccowmu-cpg">Github Repo</a>
              </p>
            </div>
          </div>
          <!-- END PROJECTS SECTION -->

        </div>
        <!-- END SIDEBAR -->

      </div>
      <!-- END PAGE CONTAINER -->

    </div>

  </body>

</html>
