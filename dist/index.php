<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    $page_title = 'Home';
    require 'php/inc/head.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
        $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

        if ($first_name == '' || $last_name == '' || $email == '') {
            $error_message = 'Please fill in all required fields (First Name, Last Name, Email)';
        }
    
        $mail = new PHPMailer;
    
        if (!isset($error_message) && !$mail->validateAddress($email)) {
            $error_message = 'Invalid email address';
        }
    
        if (!isset($error_message)) {
            try {
                // Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '225df7390061fd';
                $mail->Password = 'dad74cad2c79b2';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
                $mail->Port = 2525;
                
                // Recipients
                $mail->setFrom($email, "$first_name $last_name");
                $mail->addAddress('otis.moorman@netmatters-scs.com', 'Otis Moorman');
            
                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
            
                $mail->send();
                $mail_status = 'Message has been sent';
            } catch (Exception $e) {
                $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>

<body>
    <div id="homepage" class="wrapper">
        <main>
            <header>
                <div id="header">
                    <h1>My Name is Otis Moorman</h1>
                    <span id="header--tagline">I'm a Web Developer</span>
                </div>
                
                <div id="scroll-down">
                    <span>Scroll Down</span><br/>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </header>

            <section id="projects">
                <div id="projects--content">
                    <?php
                        $projects = json_decode(file_get_contents('data/projects.json'));
                        if (is_object($projects->projects[0])) {
                            foreach ($projects->projects as $project) {
                                echo
                                    '<div id="projects--p' . $project->id . '" class="project">
                                        <div class="project--img">
                                            <img src="' . $project->img_file . '"/>
                                        </div> 
                                        <h2>' . $project->title . '</h2>
                                        <span class="project--view">View Project</span><i class="fas fa-arrow-right"></i>
                                    </div>';
                            }
                        }
                    ?>
                </div>
            </section>

            <section id="contact">
                <div id="contact--content">
                    <div id="contact--info">
                        <h2>Get In Touch</h2>
                        <p>Sed interdum est vel sollicitudin bibendum. Proin at accumsan nulla, non facilisis massa.</p>
                        <ul>
                            <li>07891 377553</li>
                            <li>otis.moorman@netmatters-scs.com</li>
                        </ul>
                        <p>Phasellus cursus urna in neque faucibus, eu dapibus magna vehicula. Sed tempus cursus mauris et scelerisque. Pellentesque ornare mi at fringilla egestas.</p>
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
                        <button type="submit" value="Submit">Submit</button>
                        <span style="color: red;"><?php 
                            if (!empty($error_message)) {
                                echo $error_message;
                            } else if (!empty($mail_status)) {
                                echo $mail_status;
                            }
                        ?></span>
                    </form>
                </div>
            </section>
        </main>

        <?php require 'php/inc/nav.php'; ?>

    </div>

<?php require 'php/inc/footer.php'; ?>