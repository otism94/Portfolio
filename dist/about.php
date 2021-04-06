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
            
            <div id="scroll-down">
                <span>Scroll Down</span><br/>
                <i class="fas fa-chevron-down"></i>
            </div>
        </header>

        <section id="about-me">
            <div id="about-me--content">
                <div id="about-me--description">
                    <h2>Hi, I'm Otis.</h2>
                    <img src="img/about/me.jpg" alt="Me in front of a wall"/>
                    <p>I'm a web developer in training, based in Norwich. I joined the <a href="scs.php">Scion Coalition Scheme</a> in December 2020.</p>
                    <p>I've been interested in programming from a young age, having run a custom modded server for a Java game when I was 12. I first started learning to code with Python in A-Level Computing, where I achieved an A grade. After that, I attened the University of Surrey and earnt a Certificate of Higher Education in Film Studies, and also studied abroad at the FAMU film school in Prague under the Erasmus exchange scheme. I was planning on returning to university to study computer science when I stumbled upon the SCS Scheme, and was fortunate enough to get accepted - and here I am today.</p>
                    <img src="img/about/me2.jpg" alt="Me with a camera near České Budějovice"/>
                    <p>So far, I'm comfortable with HTML, CSS/Sass, and JavaScript/jQuery, and I've recently started learning PHP and SQL. As I progress through the course, I'll also be getting into C#, WordPress, and React, as well as receiving additional UI/UX design training. My goal is primarily centred around becoming a front-end developer, though I could go full-stack depending on how I get on with C#.</p>
                    <p>Outside of work, I'm also developing two games with friends in Unity (which is part of the reason I'll be learning C#), where I'm doing general game design, music, and UI. Game development is a massive personal passion of mine, and it's a big part of why I've been so enthusiastic about my training. Additionally, I've got a couple of web projects planned for when I've learnt WordPress.</p>
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