<?php
$page_title = 'About Me - Otis Moorman';
require 'inc/head.php';
require 'inc/nav.php';
?>

<div id="container" class="about">
    <main>
        <?php require 'inc/menu-btn.php'; ?>
        <header id="header-about">
            <div id="header"> 
                <h1>About Me</h1>
            </div>
        </header>

        <section id="about-me">
            <div id="about-me--content">
                <h2>Hey, I'm Otis.</h2>
                <div id="about-me--description">
                    <div class="about-me--text">
                        <p>I'm a web developer in training, based in Norwich. I joined the <a href="scs.php">Scion Coalition Scheme</a> in December 2020.</p>
                        <p>I'm confident in HTML, CSS/Sass, and JavaScript/jQuery. I've started learning SQL and PHP, and will soon be moving on to C#, Unity, and graphic design.</p>
                        <p>In my spare time, I develop video games with friends. I provide the music, writing, and system/scenario design.</p>
                    </div>
                    <div class="about-me--img">
                        <img src="img/about/me.jpg" alt="Me in front of a wall"/>
                    </div>
                </div>
                <h2>Selected Work & Education</h2>
                <div id="about-me--work">
                    <div class="about-me--img">
                        <img src="img/about/me2.jpg" alt="Me with a camera near České Budějovice"/>
                    </div>
                    <div class="about-me--text">
                        <ul>
                            <li><h3>Freelance Filmmaker</h3>
                                <ul>
                                    <li>2013-16</li>
                                    <li><em>Featured in Pitchfork, the Guardian, Q, and NME</em></li>
                                </ul>
                            </li>
                            <li><h3>University of Surrey</h3>
                                <ul>
                                    <li>2012-17</li>
                                    <li><em>Certificate of Higher Education in Film Studies (Merit)</em></li>
                                </ul>
                            </li>
                            <li><h3>FAMU Prague</h3>
                                <ul>
                                    <li>2014-15</li>
                                    <li><em>Erasmus+ Programme</em></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="about-me--contact">
                    <span><strong>If you'd like to get in touch, please use the <a href="index.php#contact">contact form</a> and I'll be sure to get back to you.</strong></span>
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