<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This website is a fulfillment of COS10026 Computing Technology Inquiry Project Assignment Part 1, Semester 1, 2023 as outlined by Swinburne University. This portion exists as a simple static website. ">
    <meta name="keywords" content="Assignment Part 1, Semester 1,  2023, DevOps, Swinburne">
    <meta name="author" content="Mixed Munde">
  <title>Daniel Hindmarsh's profile</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/x-icon" href="images/soe_logo_transparent_small.png"><!-- Dan added this favicon 12/04-->
</head>

<body>
 <?php 
	include 'Header.inc'; 
?>

    <div class="BodyContent1">
      <table class="pfp">
            <tr>
              <!-- Dan resized Daniel's pfp 11/04 -->
            <td><img id="profilephoto" src="images/DanielHindmarshProfilePhoto2.jpg" alt="DanielHindmarshProfilePhoto"></td>  
            <td><h1>Daniel Hindmarsh</h1>
                <hr>
                <h2>DevOps Engineer</h2></td>
        </tr>
    </table>

    <!-- Dan modified these personal info on 11/04/2023 -->
    <h2>Personal Information</h2>
    <ul>
      <li>Name: Daniel Hindmarsh</li>
      <li>Student ID: <a href="mailto:104586973@student.swin.edu.au">104586973</a></li>
      <li>Age: 21</li>
      <li>Gender: Male</li>
      <li>Nationality: Australian</li>
    </ul>
    <h2>Background</h2>
    <p>I was born in Frankston, which when I lived there used to more farmland than it is now. We had a horse, fruit trees and a lots of snakes. Overall, Melbourne city area is much better.</p>
    <h2>Technical Skills</h2>
    <h3>Languages</h3>
    <ul>
        <li>Python</li>
        <li>JavaScript</li>
        <li>Shell (Bash)</li>
        <li>Groovy</li>
        <li>HTML</li>
        <li>CSS</li>
        <li>Solidity</li>
    </ul>
    <h3>SAAS and Operations Software</h3>
    <ul>
        <li>AWS (EC2 and S3 Bucket)</li>
        <li>Git (GitHub), Docker and Kubernetes</li>
        <li>CLI and CLI tools (crontab, nano/vim, and PowerShell/Terminal)</li>
        <li>Linux, Windows and MacOS</li>
        <li>Implementing and operating various monitoring tools and SAAS including AppDynamics, Splunk, synthetic operations and proprietary agents</li>
        <li>Building, implementing and maintaining CI/CD pipelines and scripts for automation and user facing services using Jenkins</li>
        <li>Web development in ReactJS, HTML and CSS</li>
    </ul>

    <h2>Experience</h2>
    <h3>National Australia Bank (NAB) - Development Operations Intern</h3>
    <ul>
      <li>Improved onboarding process efficiency from 3 days down to 5 minutes using a Python scripting and Jenkins CI/CD pipelines</li>
      <li>Created the Monitoring Division Website to centralise the onboarding of all monitoring services</li>
      <li>Developed, implemented and upgraded various automation and user facing scripts and pipelines</li>
      <li>This includes hygiene maintenance, onboarding users to services, and authentication handling</li>
      <li>General customer relations including service requests, troubleshooting and vulnerability patching</li>
    </ul>
    <h2>Interests</h2> 
      <h3>Favourite Book</h3>
        
        <p>My Side of the Mountain by Jean Craighead George. It is an absolute classic about a boy who runs away from home and achieves his dream life only for his family to find him and take away most of what he has made of himself. His struggles with his family in juxtaposition to the time he spent free makes an interesting read.</p>
        
      <h3>Music</h3>
      <p>Iron Maiden is the best band. They are from the 80s and 90s and perform rock music, certainly my favourite kind of religious iconography.</li> 
      
      <h3>Other hobbies</h3>
        <ul>
          <li>Woodworking</li>
          <li>Skateboarding</li> 
          <li>Small arduino robots and automations</li>
        </ul>
    <!-- end of changes -->

</div>
<?php 
	include 'Footer.inc'; 
?>
</body>
</html>


  