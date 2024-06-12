<?php
class SendProfile extends Database
{
 
    protected function setUserEdited($profile_website, $profile_location, $profile_phone, $profile_birthday, $profile_image)
    {

        $stmt = $this->connect()->prepare('UPDATE users SET userWebSite = ?, userLocation = ?, userPhone = ?, userBirthday = ?, userImage = ? WHERE userID = ?;');

        if (!$stmt->execute(array($profile_website, $profile_location, $profile_phone, $profile_birthday, $profile_image, $_SESSION["user_ID"]))) {
            $stmt = null;
            header("location: ../editprofile.php?error=stmtfailed");
            exit();
        }
        //$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["user_Website"] = $user[0]["userWebsite"];
        $_SESSION["user_Location"] = $user[0]["userLocation"];
        $_SESSION["user_Phone"] = $user[0]["userPhone"];
        $_SESSION["user_Birthday"] = $user[0]["userBirtday"];
        $_SESSION["user_Image"] = $user[0]["userImage"];
    }

    
}
