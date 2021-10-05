<?php
$page_title = 'Coding Examples - Otis Moorman';
require 'inc/head.php';
require 'inc/nav.php';
?>

<div id="container" class="coding">
    <main>
        <?php require 'inc/menu-btn.php'; ?>
        <header id="header-coding">
            <div id="header">
                <h1>Coding Examples</h1>
            </div>
        </header>

        <section id="examples">
            <div id="examples--content">
              <div id="examples--unity">
                    <h2>Unity Reflection</h2>
                    <a href="img/coding/unity-inheritance.png" target="_blank" class="code-diagram">
                        <img src="img/coding/unity-inheritance.png" alt="Diagram for RoShamBot's class inheritance structure">
                    </a>
                    <div class="show-desc">
                        <i class="fas fa-chevron-right"></i><h3>Show Description</h3>
                    </div>
                    <div id="examples--unity-desc" class="examples-desc" style="display: none;">
                        <p>It was difficult to pick out a single snippet for this, so I made a diagram to illusrate the class inheritance structure of enemies and obstacles in my game.</p>
                        <p>Initially, all enemies and obstacles inherited from the EnemyObstacle class, but before long I realised that a lot of code was cropping up multiple times between them, and that they were distinct enough to warrant further abstraction. Essentially, it all boiled down to creating the most efficient codebase possible, ensuring that common bits of code were further up the chain and wouldn't need to be arbitrarily repeated in child classes. This came together really well; for instance, the ScissorWall component required only three lines of code because a bulk of the logic was handled in its parent classes, making the creation of new enemies/obstacles quick and easy in the long run.</p>
                        <p>The OnDestroyEvent abstract class came about when I wanted something to happen when a specific instance of an Enemy gets defeated. Instead of having to make a new Enemy script, I created a modular system where I can simply attach another component to that Enemy instance. On defeat, Enemies check if its instance has an attached OnDestroyEvent, and if so it will fire the method contained within - this way, I don't have to alter the actual Enemy script at all. In the demo, I used this to delay creating a bridge until after a specific Grunt has been destroyed in order to demonstrate that the player can push foes off cliffs.</p>
                    </div>
                    <div class="example-links">
                        <a href="https://play.unity.com/mg/other/roshambot" target="_blank" class="btn-examples">See it in Action&nbsp;<i class="fas fa-arrow-right"></i></a>
                        <a href="https://github.com/otism94/RoShamBot" target="_blank" class="repo-link"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div id="examples--cs">
                    <h2>C# Reflection</h2>
                    <pre>
<code class="code-block">[HttpPost, ValidateAntiForgeryToken]
public async Task<IActionResult> Create([Bind("Name,Email,Website,LogoFile")] Company company)
{
  try
  {
    if (ModelState.IsValid)
    {
      if (company.LogoFile != null)
      {
        // Generate a unique filename for the logo.
        string wwwRootPath = _hostEnvironment.WebRootPath;
        string extension = Path.GetExtension(company.LogoFile.FileName);
        string filePrefix = Guid.NewGuid().ToString() + "_";
        string fileName = company.LogoName = 
          filePrefix + DateTime.Now.ToString("yymmssfff") + extension;
        string filePath = Path.Combine(wwwRootPath + "/img/", fileName);

        // Save the file to wwwroot/img/.
        {
            using FileStream fileStream = new(filePath, FileMode.Create);
            await company.LogoFile.CopyToAsync(fileStream);
        }
      }

      _context.Add(company);
      await _context.SaveChangesAsync();
      TempData["MessageSuccess"] = $"{company.Name} has been added.";
      return RedirectToAction(nameof(Index));
    }
  }
  catch (DbUpdateException) { // Exception handling code }

  return View(company);
}</code>
                    </pre>
                    <div class="show-desc">
                        <i class="fas fa-chevron-right"></i><h3>Show Description</h3>
                    </div>
                    <div id="examples--cs-desc" class="examples-desc" style="display: none;">
                        <p>This is the create method in the site's company controller. In addition to the straightforward tasks of adding name and email fields, I had to allow the user to upload a logo to a company entry, with size and resolution restrictions (these are defined elsewhere in the model as data annotations). I had a few options for this, including saving the image as a binary file, but I decided on storing the image filename in the database while saving that image in a separate folder on the server.</p>
                        <p>To achieve this, I had a few things to consider. First, I had to guarantee that uploaded files would have a completely unique name, for which I used a 9-digit timestamp concatenated with a GUID, so even if two users happened to upload at the exact same moment, their filenames would be different. I also had to ensure that images got deleted when they are no longer in use, so elsewhere in the edit and delete methods, I ensured that the file matching the database entry's logo filename was removed. This is all saved asynchronously to improve site performance.</p>
                        <p>You also see here the use of TempData to display validation messages to the user across pages, which I used extensively in the project to enhance the UX.</p>
                    </div>
                    <div class="example-links">
                        <a href="https://github.com/otism94/CS-Reflection-2" target="_blank" class="repo-link"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div id="examples--js">
                    <h2>JavaScript Reflection</h2>
                    <pre>
<code class="code-block">const loadSavedImages = (array, onAllLoaded) => {
  let i = 0
  let numLoading = array.length
  let images = {}
  const onload = () => --numLoading === 0 && onAllLoaded(images)
  while (i < array.length) {
    const img = images[i] = new Image
    img.src = array[i].download_url
    img.className = 'loaded-linked-img'
    img.id = array[i].id
    img.onload = onload
    i++
  }
}</code>
                    </pre>
                    <div class="show-desc">
                        <i class="fas fa-chevron-right"></i><h3>Show Description</h3>
                    </div>
                    <div id="examples--js-desc" class="examples-desc" style="display: none;">
                        <p>While coding in the functionality to retrieve an email's saved images, I noticed that the gallery would load the images one at a time in an unpredictable order, and since they were quite high resolution, you could visibly see them rendering on the page, which didn't look too good. To create a smoother transition to this view, I included this nice little function.</p>
                        <p>It accepts two arguments: an array of saved image objects (<code>array</code>) and a function to call when all the images have been loaded (<code>onAllLoaded</code>). After setting up the incrementer <code>i</code>, it finds out how many images have to be loaded (the length of the array, defined as <code>numLoading</code>), creates an empty object called <code>images</code>, and finally the function <code>onload</code> (which I'll explain in a bit).</p>
                        <p>A while loop is then initiated. On each loop, it increments through the saved images array and creates a new image object using the retrieved URL as the source, an ID for use elsewhere in the code, and a class for styling purposes, before adding it to the <code>images</code> object. Most importantly, it adds an onload event listener property that will call the aforementioned <code>onload</code> function when this single image has fully loaded.</p>
                        <p>The <code>onload</code> function is a short circuit evaluation that first reduces the <code>numLoading</code> variable by 1 and then checks if it equals 0. If not, nothing happens and the loop continues. If it does equal 0 (i.e. the onload event for every image has been fired), the first condition evaluates as true and the second condition is checked, which calls the provided <code>onAllLoaded</code> function, passing it the <code>images</code> object. This way, all the images will be appear simultaneously, each one fully loaded.</p>
                    </div>
                    <div class="example-links">
                        <a href="http://imgat.otis-moorman.netmatters-scs.co.uk" target="_blank" class="btn-examples">See it in Action&nbsp;<i class="fas fa-arrow-right"></i></a>
                        <a href="https://github.com/otism94/js-reflection-challenge-2" target="_blank" class="repo-link"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div id="examples--sass">
                    <h2>HTML/CSS Reflection</h2>
                    <pre>
<code class="code-block">@mixin carousel-theme($map1, $map2) {
  @each $theme, $colour in $map1 {
    .banner-#{$theme} {
      background: /* Some gradient properties */,
                  url('../img/banner/banner-#{$theme}.jpeg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      @include mq('md') {
        background: /* Different gradient properties */, 
                    url('../img/banner/banner-#{$theme}.jpeg');
        background-size: contain, cover;
      }
      .btn-banner {
        background-color: $colour;
      }
    }
  }
  @each $theme, $colour in $map2 {
    .banner-#{$theme} {
      .btn-banner:hover {
        background-color: $colour; 
      }
    }
  }
}</code>
                    </pre>
                    <div class="show-desc">
                        <i class="fas fa-chevron-right"></i><h3>Show Description</h3>
                    </div>
                    <div id="examples--sass-desc" class="examples-desc" style="display: none;">
                        <p>One part of this assignment involved having to make a slideshow banner with a different image and element colour scheme for each slide. Using a combination of Sass's maps and mixins, I had already created a function to set colour schemes for elements of a certain theme elsewhere on the page, so I came up with a way to reuse this existing code and also streamline the process of adding different background images.</p>
                        <p>The mixin accepts two arguments, both of which are maps: one for the default colour values of each theme, and another for their hover state colours. Each map contains several key-value pairs of a theme and colour (e.g. <code>'software': #67809f</code>). Having a readable key turned out to be very helpful, as it allowed me to generate distinctly-named selectors in an each loop, add its colour to a button element, and also use its name in the filepath for each slide's background image.</p>
                        <p>Considering that there were six slides in total, this single mixin saved me having to repeat the same block of code five more times in new selectors, and in addition to making potential changes in the future much easier.</p>
                        <p>This code also includes a separate media query mixin, which I use in all my web projects. It uses the same logic as this slideshow mixin, except it uses a map of breakpoint names and pixel values for use in min-/max-width media query rules. This drastically simplifies creating adaptive webpages by having each breakpoint tied to a variable, in addition to resulting in more concise code.</p>
                    </div>
                    <div class="example-links">
                        <a href="http://netmatters.otis-moorman.netmatters-scs.co.uk" target="_blank" class="btn-examples">See it in Action&nbsp;<i class="fas fa-arrow-right"></i></a>
                        <a href="https://github.com/otism94/js-reflection-challenge-1" target="_blank" class="repo-link"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div id="examples--sql">
                    <h2>Database Challenge</h2>
                    <pre>
<code class="code-block">SELECT movie.mov_title AS "Title",
  movie.mov_time AS "Runtime",
  ROUND(rev.rev_stars, 1) AS "Rating"
FROM
  (SELECT *
  FROM rating
  WHERE rev_stars IS NOT NULL) AS rev
INNER JOIN movie ON movie.mov_id = rev.mov_id
WHERE mov_time <= 120
  AND rev_stars IS NOT NULL
  AND rev_stars >= 8
ORDER BY "Rating" DESC;</code>
                    </pre>
                    <div class="show-desc">
                        <i class="fas fa-chevron-right"></i><h3>Show Description</h3>
                    </div>
                    <div id="examples--sql-desc" class="examples-desc" style="display: none;">
                        <p>To test my SQL ability, I was given a challenge to create an SQL query for <a href="https://www.w3resource.com/sql-exercises/movie-database-exercise/subqueries-exercises-on-movie-database.php" target="_blank" class="examples-desc--link">a sample movie database</a> that contained a sub-query. The table structure is depicted below.</p>
                        <a href="img/coding/movie-database.png" target="_blank" class="examples-desc--img">
                            <img src="img/coding/movie-database.png" alt="Table structure for the movie database">
                        </a>
                        <p>My query retrieves all films with a runtime of 120 minutes or less and an average review score of 8.0 or above. To achieve this, I used a sub-query to create a derived table of non-null value reviews, which I then joined with the movies table on the matching primary key. Excluding null values was important, as not all films had review scores.</p>
                        <p>Technically, a sub-query wasn't necessary for this, and it could easily be done with just the join. I included the sub-query as I hadn't really used them much prior to this, and found it to be a valuable bit of practice.</p>
                        <a href="img/coding/query-results.png" target="_blank" class="examples-desc--img">
                            <img src="img/coding/query-results.png" alt="Results of the query">
                        </a>
                    </div>
                    <div class="example-links">
                        <a href="https://www.w3resource.com/sql-exercises/movie-database-exercise/subqueries-exercises-on-movie-database.php" target="_blank" class="btn-examples">See it in Action&nbsp;<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <a href="#header" id="scroll-up">
            <i class="fas fa-chevron-up"></i><br/>
            <span>Back to Top</span>
        </a>
    </main>
</div>

<?php require 'inc/footer.php'; ?>