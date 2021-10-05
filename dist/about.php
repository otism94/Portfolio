<?php
$page_title = 'About Me - Otis Moorman';
require 'inc/head.php';
?>

<div id="about" class="wrapper">
    <main>
        <header id="header-about">
            <div id="header"> 
                <h1>About Me</h1>
            </div>
        </header>

        <section id="about-me">
            <div id="about-me--content">
                <div id="about-me--description">
                    <div class="about-me--text">
                        <p>I'm a web developer in training based in Norwich. I started modding games from a young age, and since then I've held a lifelong interest in programming, taking AS-level Computing in college (for which I got an A grade) and eventually joining the <a href="scs.php">Scion Coalition Scheme</a> in December 2020.</p>
                        <p>I studied film at the Univserity of Surrey, and took a year abroad at the prestigious FAMU film school in Prague under the Erasmus exchange scheme. I was also commissioned to make a few music videos for a local band, which were well-received and featured in several high-profile publications. As a result of this background, I've got a good eye for visuals in web design, though I've also managed to get plenty of back-end training during my time on the course.</p>
                        <p>I'm confident in HTML, CSS/Sass, JavaScript, SQL, PHP, WordPress, C# with ASP.NET MVC and Entity Framework, as well as Unity. I've also done design work in Figma and Axure, and over the years have learnt my way around various Adobe products like Photoshop, Illustrator, and Premiere Pro.</p>
                        <p>In my spare time, I'm usually making music and developing (and playing) video games. I'm currently working on a game with my friends in Unity, for which I provide the music, writing, and systems/scenario design. Thanks to my SCS training, I've recently been able to take a much more active role in the programming as well - which is keeping me very busy!</p>
                    </div>
                    <div class="about-me--img">
                        <img src="img/about/me.png" alt="Me in front of a wall"/>
                    </div>
                </div>
                <div id="about-me--img">
                    <img src="img/about/me.jpg" alt="Me in front of a wall"/>
                    <img src="img/about/me2.jpg" alt="Me with a camera near České Budějovice"/>
                </div>
                <div id="about-me--contact">
                    <span>If you'd like to get in touch, please use the <a href="index.php#contact">contact form</a> and I'll be sure to get back to you.</span>
                </div>
            </div>
        </section>

        <a href="#header" id="scroll-up">
            <i class="fas fa-chevron-up"></i><br/>
            <span>Back to Top</span>
        </a>
    </main>

    <?php require 'inc/nav.php'; ?>

</div>

<?php require 'inc/footer.php'; ?>