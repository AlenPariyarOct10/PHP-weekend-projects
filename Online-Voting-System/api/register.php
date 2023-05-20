<?php

include( 'connect.php' );
$fname = $_POST[ 'fName' ];
$lname = $_POST[ 'lName' ];
$address = $_POST[ 'address' ];
$phone = $_POST[ 'phoneNo' ];
$citizenshipNo = $_POST[ 'citizenshipNo' ];
$password = $_POST[ 'passwordField' ];
$fileName = $_FILES[ 'profile' ][ 'name' ];
$tmpFile = $_FILES[ 'profile' ][ 'tmp_name' ];

$check = mysqli_query( $connect, "SELECT * from `user` WHERE fname='$fname' AND lname='$lname' AND citizen='$citizenshipNo' AND phone='$phone'" );

if ( mysqli_num_rows( $check )>0 )
 {
    echo "<script>alert('You are already signed up. Please Login to Continue.');window.location = '../client/login.html';</script>";
} else {
    if ( $password )
 {

        $insert = mysqli_query( $connect, "INSERT INTO `user`(`fname`, `lname`, `address`, `phone`, `citizen`, `password`, `vote`, `photo`) VALUES ('$fname','$lname','$address','$phone','$citizenshipNo','$password','0','$fileName')" );

        echo "<script> console.log('First Name :".$fname."'); </script>";
        echo "<script> console.log('Last Name :".$lname."'); </script>";
        echo "<script> console.log('Address :".$address."'); </script>";
        echo "<script> console.log('Phone No. :".$phone."'); </script>";
        echo "<script> console.log('Citizenship No. :".$citizenshipNo."'); </script>";
        echo "<script> console.log('password :".$password."'); </script>";
        move_uploaded_file( $tmpFile, '../uploads/users/'.$fileName );
        echo "<script>
        alert( 'Registration Succesfull ! Please Login to continue.' );
        window.location = '../client/login.html';
        </script>";
    }

}

?>

