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
        <h1>CPG <small>Secretary of Computer Club</small></h1>
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
              <p>Pulled from the <a href="https://cclub.cs.wmich.edu/wiki/User:Cpg">wiki</a>:</p>

              <p>I'm cpg (AKA cpgsquared, csquared, arcade, or some other ridiculous nickname that might strike my fancy). I'm a third year Computer Club member and a Computer Science major. For this year, I am the secretary of Computer Club, meaning I take the minutes, schedule events, and conduct any other internal day-to-day business for the club. I'm also the IT Coordinator for the Western Student Association and I work in IT for Extended University Programs, a WMU department.</p>

              <p>I've been interested in computers since I can remember, and got into programming in Junior High. On IRC I mostly hang out in #, #officers, #programming, #hackathons, #geekouts, #plan, and of course #geekboy. I'm in #2230, #3310, and #4430 to answer questions about classes, too. Find me in one of those places or message me if you have things to say.</p>

              <p>Things I can help you with or at least attempt to: Java, C++, C#, Python, PHP, HTML/CSS, SQL, possibly more.</p>

              <p>Things I really want to get better at: JavaScript, SQL, Haskell, Assembly, Linux, Server Administration, Life</p>

              <p>Classes I've Taken: CS1110 (Gonna miss Dr. Nelson), CS1120 (Java Friendship Lab), CS1106 (The biggest data), CS1310 (The Math side of CS), CS4430 (Living in the Database), CS2230 (Microcontroller Party Every Day), CS 3310 (So much specs)</p>

              <p>Things I Like: Unix, Gamedev, Punk and Metal, Netflix, Road Trips, Making Pixel Art, Minecraft, Team Fortress 2, and probably more random things.</p>
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
                Western Student Association Site<br/>
                <a href="http://westernstudentassociation.org/">Link</a>
              </p>

              <p>
                ACS Site<br/>
                <a href="http://github.com/acswmu/acs-wmu-official-site">Github Repo</a>
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
