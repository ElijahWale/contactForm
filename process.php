<?php


    // Collect data from  contact form
    if(isset($_POST['submit'])){

         // code to sanitize the inputs
    function sanitizeinput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

         $firstName = sanitizeinput($_POST['firstName']);
         $lastName = sanitizeinput($_POST['lastName']);
         $email = sanitizeinput($_POST['email']);
         $telephone = sanitizeinput($_POST['telephone']);
         $message = sanitizeinput($_POST['message']);

        //  open the text file

        $contact =fopen("$firstName.txt", "w") or die("Unable to open file!");

        // style the message
        $styledContact ="
        <p><b>First Name:</b>
        .$firstName.<br><b>Last Name:</b>.$lastName.<br><b>Email:</b>.$email.<br><b>Phone Number:</b>.$telephone.<br><b>Message:</b>.$message.</p>";

        // writing on the file

        $writeContact = fwrite($contact, $styledContact);

        
        $messageFile = fopen("$firstName.txt", "r") or die("Unable to open file!");

        
        
        echo fread($messageFile, filesize("$firstName.txt"));
        fclose($contact);


    }
?>