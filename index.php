<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <p>Please fill in this form and send us.</p>
    <form action="process-form.php" method="POST">
        <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName">
        </p>
        <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail">
        </p>
        <p>
            <label for="inputSubject">Subject:<sup>*</sup></label>
            <input type="text" name="subject" id="inputSubject">
        </p>
        <p>
            <label for="inputComment1">Message:<sup>*</sup></label>
            <textarea name="message" id="inputComment" cols="30" rows="5"></textarea>
        </p>
            <input type="submit">
    </form>
</body>
</html>