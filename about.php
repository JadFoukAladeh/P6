  <!-- 

    Written by:   Jad Fouk Aladeh
    Date:         2024-05-30
    Purpose:      The purpose of this HTML page is to be the about page to my Project VI website. This will act as a general 
                  description about the current Project VI and the team

  !-->

<!DOCTYPE html> 
<html lang="en">
  <head>

    <!-- Website title that will be shown on the tab in the browser (not shown on page in browser)-->
    <title>Project VI - About</title>

    <!-- Recall <meta> tags are used in the <head> element-->
    <!-- These aren't all meta tags just the most popular-->
    <!-- 
      name="description" contains a description of the page
      (will be displayed in the search results)
    -->
    <meta name="description" content="This is the About page for our project"/>
    
    <!-- 
      name="robot" specifies whether or not you want 
      your website indexed by AI. NOTE: Doesn't mean 
      they won't anyways. Just states your preference
      content="noindex nofollow" - states no indexing or following
    -->
    <meta name="robots" content="noindex nofollow"/>
    
    <!-- https-equiv="author" sets the author of the page -->
    <meta http-equiv="author" content="Jad Fouk Aladeh"/>
    
    <!-- 
      https-equiv="pragma" content="no-cache" tells browser to reload 
      this page every time and not store it in cache
    -->
    <meta http-equiv="pragma" content="no-cache"/>

    <meta charset="utf-8"/>

    <!-- 
      Ensure proper zoom and rendering:
      content="width=device-width" sets the width of the page depnding on debice
      initial-scale=1 sets the inital zoom level when page loads
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

  
    <!-- Linking Bootstraps CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- CSS-->

    <!--[if It IE 9]>
        <script 
          src=http://http://html5shiv.googlecode.com/svm/trunk/html5.js> 
        </script>
    <![if It IE 9]-->
    
    <!-- Linking css style sheet -must come after bootstrap CSS -->
    <link href="css/new.css" type="text/css" rel="stylesheet" />


  </head>
  <body>
    <div id="page" class="container g-0">
      <header id="top_page">
          <?php
          require 'testing_includingheader.html';// look for page and throw an error if not found 
          ?>
      </header>
      
      <div id="content">
        <article>

          <section>
            <div class="row">
              <div class="col-12">
                <!-- First header that will be shown on the in the browser (shown on page in browser)-->
                <h1> </br>About - Project VI</h1>
                <!-- Recall <p> tag is a paragraph-->
                <p> To be completed</p>
                <!-- Recall <hr/> is a horizontal line-->
                <hr/>
              </div>
            </div>
          </section>
  
          <section>
            <div class="row">
              <div class="col-8">
                <!-- Second header that will be shown on the in the browser (shown on page in browser)-->
                <h2> Meet the team</h2>
                <!--
                  Recall for using images the tag should be as follows:
                    <img src="" alt="" title="" width=""/> (can also add height="")
                    src = source file where photos will be stored in our case its
                          a file named Images found in this repository
                    alt = Alternative description that will be shown if photo can't be loaded
                    title = Title that user will see if they scroll over picture
                    width/height = set the height and width of the picture
                -->
                <figure>
                  <img src="Images/Group photo.jpg" alt="Team photo" title="Team photo" width ="400"/>
                  <!-- Recall <figcaption> tag adds a caption to the picture-->
                  <!-- Recall <b> tag bolds the text -->
                  <figcaption>
                        <b>Figure 1.0 - Jad & Jared group photo </b>
                  </figcaption>
                </figure>
              </div>

              <div class="col-4">
                <h3 id="jf_bio"> Jad Fouk Aladeh</h3>
                <p  id="jf_bio">  Jad will mainly focus on front-end and back-end development</p>
                <p id="info"> </p>
                <h3 id="jh_bio"> Jared Hochstenbach </h3>
                <p  id="jh_bio">  Jared will mainly focus on STM32 development</p>
                <p id="info2"> </p>
              </div>

            </div>

          </section>
        </article>

        <article>
          <section>
            <div class="row">
              <div class="col-12">
                <h2> Project Videos</h2>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <h3> Phase 1 - Preperation</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <iframe width="500" height="300" src="https://www.youtube.com/embed/gJKIgFF6MR8?si=HJdb_I2HlCAxnvK_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="504" height="300" src="https://www.youtube.com/embed/kmpRVJWQGjU?si=-grCh9j2t6lIxiQH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <h3> Phase 1 - Demo</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-12">                
                <iframe width="333" height="300" src="https://www.youtube.com/embed/bm1SnZPPb9A?si=O73DVxgW3NLWuzQv" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="333" height="300" src="https://www.youtube.com/embed/z7L0iYkUeqE" title="Phase 1 - LCD Demo showing movement to correct floor" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="333" height="300" src="https://www.youtube.com/embed/gqo8z7Ls5iw" title="Phase 1 - LED indicators working for floor input" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <h3> Phase 2 - Preperation</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tm83UcUaYT4?si=cgExv_8uUfCZKJmY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                <iframe width="504" height="300" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </div>

          </section>

          <section>
            <div class="row">
              <div class="col-12">
                <h3> Map to Conestoga College - Fountain Street Campus</h3>
                <!-- Recall block level vs inline level elements:
                      block level: start on a new line
                      inline level: start on same line
                -->
                <!--
                  Recall for using inline frames the tag should be as follows:
                    <iframe width="" height="" src="" allowfullscreen seamless > <iframe/> (can also add other elements)
                    src = source link to where the embedded page can be found
                    width/height = set the height and width of the picture in pixels
                    allowfullscreen = boolean value to set whether or not user is allowed to use fullscreen
                    seamless = boolean value to set whether the page should be in the page seamlessly or not
                              no scroll bars or anything. looks native in page.
                -->
                <iframe
                  width="450"
                  height="300"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5799.040723005359!2d-80.39990002315122!3d43.387052071116024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b8a7ec9d60715%3A0xd5e712873de8af2d!2sConestoga%20College%20Cambridge%20-%20Fountain%20Street%20campus!5e0!3m2!1sen!2sca!4v1717118953944!5m2!1sen!2sca"
                  allowfullscreen
                  seamless>
                </iframe>
              </div>
            </div>
          </section>
        </article>
      </div> <!--ID=CONTENT -->

      <aside></aside>

      <footer>
        
        <div class="row">
          <div class="col-12">
            <p id="foot"> </p>
            <p id="date"> </p>
            
            
            <!-- &copy; adds the copyright symbol-->
            <!-- <p> Copyright &copy; Jad Fouk Aladeh - 2024 </p> -->
          </div> <!--class=col-12-->
        </div><!--class=row-->
        <a href="#top_page">Top of page</a>
      </footer>
    </div> <!-- ID=PAGE -->
    
    <!-- Bootstrap Javascript script needed to use bootstraps -->
    <script src="js/dateObjectModel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  

</html>