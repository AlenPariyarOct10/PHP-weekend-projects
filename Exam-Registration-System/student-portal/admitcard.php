<?php
include './adminInfo.php';
include "./db.php";
session_start();

$usr = $_SESSION['user'];
$uid = $usr['id'];

$examInfo = mysqli_query($db,"SELECT * FROM `application` WHERE `sid`='$uid'");
$examInfo = mysqli_fetch_assoc($examInfo);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tu Exam - Student Portal</title>
    <link href="http://localhost/exam-registration-system/student-portal/style-ad.css" rel="stylesheet" />
    <link href="http://localhost/exam-registration-system/student-portal/admitcard-style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-3">
    <a id="btnprint" class="btn btn-outline-success noprint">Print admit card</a>
    </div>
    


    <div class="container">
        <br />
        <div class="form-group col-lg-3">

        </div>
        <center>
            <table width="95%" border="0">
                <thead class="thead-light">
                    <tr>
                        <td width="10%" valign="top">
                            <div align="center">
                                <center><img src="<?php echo substr($logo,1); ?>"
                                        width="125" height="139" /></center>
                            </div>
                        </td>
                        <td width="70%" valign="top">
                            <center>
                                <p>
                                <div class="txtheading"><?php echo $adminName; ?></div>
                                <div class="txtheading">Office of the Dean</div>

                               
                                <div class="txtsubheading">Exam Admit-Card (प्रवेश–पत्र)</div>
        

                                </p>
                            </center>
                        </td>

                        <td width="20%">
                            <div class="main">
                                <img src="<?php echo $usr['profile_img']; ?>"
                                    style="height: 200px;width: auto;" />
                                <div class="overlay">

                                    <img src="http://localhost/exam-registration-system/assets/approved.png" height="100px"
                                        width="120px">
                                </div>
                                <div class="overlaysign">

                                    <img src="<?php echo $usr['sign_img'] ?>"
                                        height="78px" width="170px">
                                </div>
                            </div>

                        </td>

                    </tr>


                </thead>
            </table>


            <table width="95%" border="0" cellpadding="2" cellspacing="10">
                <thead class="thead-light">

                    <tr>
                        <td width="32%" valign="top">
                            <div align="left"><strong>Roll No : </strong> <?php echo $usr['id']; ?> </div>
                        </td>
                        <td width="68%" valign="top">
                            <div align="left"> <strong>Name : </strong> <?php echo $usr['name']; ?> </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top"><strong>Citizenship No : </strong>:<?php echo $usr['citizenshipno']; ?></td>
                        <td valign="top">
                            <div align="left"><strong>Date of Birth : </strong><?php echo $usr['dob']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <?php 
                            if($usr['gender']==0)
                            {
                                $gender = "Male";
                            }else if($usr['gender']==1){
                                $gender = "Female";
                            }else{
                                $gender = "Third Gender";
                            }
                            ?>
                            <div align="left"> <strong> Student Gender : </strong><?php echo $gender; ?></div>
                        </td>
                        <td valign="top">
                            <div align="left">
                                <strong>Contact Address : </strong> <?php echo $usr['temporary_address']; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="left"><strong>Mobile Number : </strong> <?php echo $usr['phone']; ?> </div>
                        </td>
                        <?php
                            $programme = $usr['programme_id'];
                            $programme = mysqli_query($db,"SELECT * FROM `programme` WHERE `pid`='$programme'");
                            $programme = mysqli_fetch_assoc($programme);
                            $programme = $programme['name'];
                            

                        ?>
                        <td valign="top">
                            <div align="left"><strong>Program : </strong> <?php echo $programme; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="left"><strong>Tu Registration Number:</strong> <?php echo $usr['registration_number']; ?>
                        </td>
                        <?php
                            $college = $usr['college_id'];
                            $college = mysqli_query($db,"SELECT * FROM `college` WHERE `cid`='$college'");
                            $college = mysqli_fetch_assoc($college);
                            $college = $college['name'];
                            

                        ?>
                        <td valign="top">
                            <div align="left"><strong>Department / Campuses :</strong><?php echo $college; ?></div>
                        </td>
                    </tr>

                    <tr>
                    <tr>
                        <td valign="top"></td>

                        <td valign="top"></td>
                    </tr>

                    <tr>

                        <td colspan="2">
                            <?php
                            if($examInfo['exam_type']==0)
                            {
                                $examType = "REG";
                            }else{
                                $examType ="BACK";
                            }
                            ?>
                            <strong>Semester : <?php echo $examInfo['semester']." ".$examType; ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Course Code</strong></td>
                        <td><strong>Course Name</strong></td>
                    </tr>
                    <?php 
                    $subjects = json_decode($examInfo['subs']);
                    foreach($subjects as $su)
                    {
                        $subTitle = mysqli_query($db,"SELECT * FROM `exam` WHERE `subject_code`='$su'");
                        $subTitle = mysqli_fetch_assoc($subTitle);
                        $subTitle = $subTitle['name'];
                        ?>
                        <tr>
                            <td><?php echo $su; ?></td>
                            <td><?php echo $subTitle; ?></td>
                        </tr>
                        
                        <?php
                    }
                    ?>
                    
                    









                    <tr height="23">
                        <td colspan="3" valign="top">
                            <strong>
                                <h4>
                                    Examination Regulations to be observed by Examinees </h4>
                            </strong>

                            <p class="text-justify">
                                1. Examinees must keep the Examination Admission Card in their possession on the day of
                                examination. They will not be allowed to sit in the examination without the card.

                                <br />

                                2. Examinees must follow the examination regulations. They will be allowed to take the
                                examination only in subjects mentioned in the card.

                                <br />

                                3. Examinees will not be allowed to leave the examination hall before one hour without
                                the permission of the examination Superintendent or Invigilator.

                                <br />

                                4. Examinees shall take the exam seated as fixed in the Seat Plan.

                                <br />

                                5. Examinees are not allowed to carry prohibited objects/materials in the examination
                                hall. If any examinee carries such objects and/or misbehaves the Superintendent may take
                                action against him/her or even expel from the examination hall.

                                <br />

                                6. Examinees are required to follow all the things mentioned on the front page of the
                                answer sheet.

                                <br />

                                7. Examinees must go out of the examination hall only after submitting the answer sheet.

                                <br />

                                8. Diseased, sick and disabled examinees should inform the Superintendent one hour
                                before the examination about their condition and situation.

                                <br />

                                9. Examinees must not bring anybody else within the premises of the examination hall.

                                <br />

                                10. Examinees will have to write their answers only in the English medium in all other
                                subjects except Nepali, Newar, Maithili, Hindi and Sanskrit.


                                <!-- 
                                   <br/>
                           11. If the examinees are visually impaired or unable to write with their hands, they will have to request the Superintendent for keeping an assistant.
                               <br/> -->

                                11. The Examinee shall not be allowed to disturb the examination individually or
                                collectively.

                                <br />

                                12. If any examinee is found to be involved in such activities, the Examination
                                Committee will cancel his/her concerned examination and will expel the candidate making
                                him ineligible to take the examination for one to four years depending upon the
                                intensity of the offense.

                                <br />

                                13. Electric devices like mobile phones, cell phones, tablets are prohibited in the
                                examination hall.

                                <br />

                                14. If any student has been found to have sent any other person to write the exam in
                                substitution, the Examination Committee will expel the real examinee for four years and
                                forward both of them to local administration for criminal offense. Such a candidate
                                shall not be allowed to appear in any exam of the university for four years.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">
                            <div align="right"></div>
                        </td>
                        <td valign="top">
                            <div align="right">
                            </div>
    </div>
    </td>
    </tr>
    <td valign="top">
        <div align="right"> </div>
    </td>
    <td valign="top">
        <div align="right"> Rajesh Hamal,<br /> Asst. Dean (Examination)
    </td>
    </tr>


    </td>
    </tr>

    </thead>

    </center>

    </center>


    </br></center>

    </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://student.tufohss.edu.np/themes/js/scripts.js"></script>


    <script type="text/javascript">

        $("#btnprint").on("click", function () {
            window.print();
        });
    </script>

    <style type="text/css">
        .print {
            display: none;
        }

        @media print {
            .print {
                display: block;
            }

            .noprint {
                display: none;
            }
        }
    </style>




</body>

</html>