<!-- Define the document type and the language used -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Set the character encoding and provide metadata about the website -->
  <meta charset="UTF-8">
  <meta name="description" content="This website is a fulfillment of COS10026 Computing Technology Inquiry Project Assignment Part 1, Semester 1, 2023 as outlined by Swinburne University. This portion exists as a simple static website. ">
  <meta name="keywords" content="Assignment Part 1, Semester 1,  2023, DevOps, Swinburne">
  <meta name="author" content="Mixed Munde">
  <!-- Set the title of the website and link to the stylesheet -->
  <title>COS10026 Computing Technology Inquiry Project</title>
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<!-- Define the header section of the website -->
<header>

<?php 
	include 'Header.inc'; 
?>

</header>
<!-- Define the main section of the website -->
<main>
  <div class="BodyContent">
    <!-- Define a banner announcing job openings -->
    <table id="HiringBanner">
      <tr>
        <td>
          <h2 class="heading-index">We are hiring!</h2>
          <p class="p-index">We are looking for DevOps Engineers of various levels of experience. Click <a href="apply.php"><strong>here</strong></a> for more information.</p>
        </td>
      </tr>
    </table>
    <!-- Define the main content of the website in a table layout -->
    <table>
      <tr>
        <!-- Define a welcome message -->
        <td class="HiringBanner-box">
          <article>
          <h1 class="heading-index">Welcome to SOE</h1>
          <p>Here at SOE, innovation and hard work are our keys to success.
            Our family is dedicated to providing high-quality services that
            meet the needs of our customers, whilst driving growth and
            innovation for our shareholders. At SOE, we are proud to be
            part of our growing family and the community we foster.</p>
          </article>
        </td>
        <!-- Define an image banner -->
        <td class="HiringBanner-box">
          <img class="IndexBanner" src="images/Index_Banner.jpg" alt="BannerImage">
        </td>
      </tr>
      <tr>
        <!-- Define an image -->
        <td class="HiringBanner-box">
          <img class="IndexBanner" src="images/Indeximage.jpg" alt="BannerImage">
        </td>
        <!-- Define a description of what the company does -->
        <td class="HiringBanner-box">
          <h1 class="heading-index">What We Do</h1>
          <p>SOE specializes in providing end-to-end
            software development and deployment solutions. With a
            focus on collaboration, automation, and continuous improvement,
        we help organizations streamline software delivery
        processes and reduce time to market. Our experienced team of
        engineers and consultants work closely with clients to implement
        best practices and ensure seamless integration with existing systems.
    </p>
</td>
</tr>


<tr>
  <!-- Define an image -->
  <td class="HiringBanner-box">
    <img class="IndexBanner" src="images/Indeximage2.jpg" alt="BannerImage">
  </td>
  <!-- Define a description of how this website was made -->
  <td class="HiringBanner-box">
    <h1 class="heading-index">Our Website Creation</h1>
    <p>Want to know more about this website and how it was made? Click <a href="https://www.youtube.com/watch?v=12a52hTU2do&ab_channel=DanhNg%C3%B4">here</a>
     to watch a short video introducing our team and the work we have done.</p>
  </td>
</tr>
<tr class="HiringBanner02">
</tr>
    </table>



</div>

</main>


<!-- Define the footer -->
<?php 
	include 'Footer.inc'; 
?>

</body>

</html>


