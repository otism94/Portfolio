<?php
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'inc/bootstrap.php';

$page_title = 'Home - Otis Moorman';
require 'inc/head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
    $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    if ($first_name == '' || $last_name == '' || $email == '') {
        $error_message = 'Please fill in all required fields (*).';
    }

    $mail = new PHPMailer;

    if (!isset($error_message) && !$mail->validateAddress($email)) {
        $error_message = 'Invalid email address.';
    }

    if (!isset($error_message)) {
        try {
            // Server settings
            /* $mail->SMTPDebug = SMTP::DEBUG_SERVER; */
            $mail->isSMTP();
            $mail->SMTPAuth = $_ENV["SMTP_AUTH"];
            $mail->Host = $_ENV["SMTP_HOST"];
            $mail->Username = $_ENV["SMTP_USER"];
            $mail->Password = $_ENV["SMTP_PASS"];
            $mail->Port = $_ENV["SMTP_PORT"];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            
            // Recipients
            $mail->setFrom($_ENV["SMTP_FROM"], "$first_name $last_name");
            $mail->addAddress($_ENV["MAILTO_EMAIL"], $_ENV["MAILTO_NAME"]);
            $mail->addReplyTo($email, "$first_name $last_name");
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
        
            $result = $mail->send();
            if ($result) {
                header('Location: success.php');
            } else {
                $error_message = "Message could not be sent.";
            }
        } catch (Exception $e) {
            $error_message = "Message could not be sent.";
        }
    }
}

require 'inc/nav.php';
?>

<div id="container" class="homepage">
    <main>
        <?php require 'inc/menu-btn.php'; ?>
        <header id="header-home">
            <div id="header">
                <h1 id="typewriter"><span id="cursor">|</span></h1>
                <span id="header--tagline">I'm a Web Developer</span>
            </div>
            
            <a href="#projects" id="scroll-down">
                <span>Scroll Down</span><br/>
                <i class="fas fa-chevron-down"></i>
            </a>
        </header>

        <section id="projects">
            <div id="projects--content">
                <?php
                $projects = json_decode(file_get_contents('data/projects.json'));
                if (is_object($projects->projects[0])) {
                    foreach ($projects->projects as $project) {
                        echo
                            '<a href="' . $project->url . '" target="_blank" id="projects--p' . $project->id . '" class="project">
                                <div class="project--img">
                                    <img src="img/projects/' . $project->img . '"/>
                                </div> 
                                <h2>' . $project->title . '</h2>
                                <p>' . $project->description . '</p>
                                <div class="project--view">
                                    <span>View Project</span><i class="fas fa-arrow-right"></i>
                                </div>
                            </a>';
                    }
                }
                ?>
            </div>
        </section>

        <section id="contact">
            <div id="contact--content">
                <div id="contact--info">
                    <h2>Get In Touch</h2>
                    <p>If you want to drop me a line, feel free to use the contact form provided and I'll get back to you as soon as I can.</p>
                </div>
                <form id="contact--form" method="POST" action="index.php#contact">
                    <table>
                        <tr>
                            <td>
                                <input type="text" id="first_name" name="first_name" placeholder="First Name*" value="<?php if (isset($first_name)) { echo $first_name; } ?>"/>
                            </td>
                            <td>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name*" value="<?php if (isset($last_name)) { echo $last_name; } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" id="email" name="email" placeholder="Email Address*" value="<?php if (isset($email)) { echo $email; } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" id="subject" name="subject" placeholder="Subject" value="<?php if (isset($subject)) { echo $subject; } ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea id="message" name="message" placeholder="Message" style="resize: none;"><?php if (isset($message)) { echo $message; } ?></textarea>
                            </td>
                        </tr>
                    </table>
                    <div id="contact--submit-status">
                        <button type="submit" value="Submit">Submit</button>
                        <?php 
                        if (!empty($error_message)) {
                            echo '<span id="contact-status">' . $error_message . '</span>';
                            $error_message = '';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </section>

        <a href="#header" id="scroll-up">
            <i class="fas fa-chevron-up"></i><br/>
            <span>Back to Top</span>
        </a>
    </main>
</div>

<?php 
require 'inc/footer.php'; 
ob_end_flush();
?>