<!-- last modified by Dan on 17/04/23 -->
<!-- Css added by Uv -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="about page" />
  <meta name="keywords"    content="HTML, CSS, about, SOE" />
  <meta name="author"      content="Dan Ngo" />
  <title>About SOE</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/x-icon" href="images/logo_transparent_small.png"><!-- Dan added this favicon 12/04 -->
</head>

<body>
<?php 
	include 'Header.inc'; 
?>

  <div class="intro">
    <img src="images/about_pic.png" alt="about">
      <div id="content">
        <h1>ABOUT US</h1>
        <h2>Who are SOE?</h2>
        <p>
          Service for Operations Engineers is a Melbourne-based company <br/>
          which provides top-notch services that cater to the requirements of our clients,<br/> while simultaneously driving growth and innovation for our shareholders.<br/> At SOE, we are proud to be a part of our growing family and foster a sense of community.
        </p>
      </div>
  </div>

  <div class="title">
    <!-- style this div to make it look nicer -->
      <h1>Your best service for Ops Engineers</h1>
        <p class="describe">SOE, based in Melbourne, provides efficient services for Ops Engineers. Our experienced team automates and manages business infrastructure, saving valuable time for other aspects. We connect IT professionals and businesses across Australia, offering tailored services to meet unique needs.</p>
        <br/>
        <p class="describe">Our recruitment process ensures we find the best IT talent to lead your business to success. We offer monitoring, troubleshooting, backup, and disaster recovery solutions for seamless 24/7 business operations. Our team provides honest advice, support, and guidance, giving you peace of mind that your infrastructure is managed by experts.</p>
        <br/>
        <p class="describe">At SOE, we have a deep understanding of the IT industry, enabling us to offer tailored services to each client. Contact us today to learn more about how we can help you find the best IT talent to support your business operations.

  </div>

  <div class="group">
    <h1 id="MeetOurTeam">Meet Our Team</h1>

    <figure class="group5">
      <img src="images/group_pic.png" alt="Team">
      <figcaption>Group 5/Mixed Munde</figcaption>
    </figure>

    <dl><!-- style this definition list to make it look better-->
      <dt></dt>
      <dd>Group Name :</dd>
        <dt>Group 5/Mixed Munde</dt> 
      <dd>Our Course :</dd>
        <dt><a href="https://www.swinburne.edu.au/course/bachelor-of-computer-science/" target="_blank">Bachelor of Computer Science</a>/COS10026 <a href="https://www.swinburne.edu.au/study/courses/units/Computing-Technology-Inquiry-Project-COS10026/local"
           target="_blank">Computing Techonology Inquiry Project</a> 
        </dt>  
      <dd>Our Tutor :</dd> 
        <dt>
          <a href="mailto:fatmamohammed@swin.edu.au"> Fatma Mohamed</a>
        </dt> 
      <dd>Get In Touch Today :</dd>
      <dt> 
        <a href="mailto:Contactus@SOECompany.com">
          Contactus@SOECompany.com 
        </a>
      </dt>
    <dd></dd>
    </dl>
    <br/>
  </div>

    <p id="contact">Our Team's ID :</p>
    <!-- A section added here for adding picture using grid concept by UV  -->
    <div class="container">
      <div id="section01">
          <!-- class="profiledp01" for pic in the motion picture effect  -->
          <section>
            <a href="ProfileNina.html" target="_blank">
              <img  class="profiledp01" src="images/NinaPfp.jpg" alt="Nina Lam">
            </a>
              <h3>Nina</h3>
              <h4>104060655</h4>
          </section>
      </div>

      <div id="section02">
          <section>
            <a href="ProfileDaniel.html" target="_blank">
              <img class="profiledp01" src="images/DanielHindmarshProfilePhoto2.jpg" alt="Daniel Hindmarsh">
            </a>
              <h3>Daniel</h3>
              <h4>104586973</h4>
          </section>

      </div>
      <div id="section03">
          <section>
            <a href="ProfileJugraj.html" target="_blank">
              <img class="profiledp01" src="images/JugrajPfp.jpg" alt="Jugraj Singh">
            </a>
              <h3>Jugraj</h3>
              <h4>104204262</h4>
          </section>

      </div>
      <div id="section04">
          <section>
            <a href="ProfileDan.html" target="_blank">
              <img class="profiledp01" src="images/DanPfp.jpg" alt="Dan Ngo">
            </a>
              <h3>Dan</h3>
              <h4>104186810</h4>
          </section>

      </div>
      <div id="section05">
          <section>
            <a href="ProfileMandeep.html" target="_blank">
              <img class="profiledp01" src="images/MandeepPfp.jpg" alt="Mandeep Kaur">
            </a>
              <h3>Mandeep</h3>
              <h4>104330028</h4>
          </section>
      </div>
  </div>

    <table class="about">
      <caption>Our&nbsp;Timetable</caption>
      <thead>
        <tr>
          <th rowspan="2" class="time">Time</th>
          <th colspan="5" class="day">Day</th>
        </tr>
          <tr class="day">
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
          </tr>
      </thead>
      <tbody>
        <tr>
          <th class="time">08:00 AM</th>
          <td rowspan="2" class="c04">COS10004<br/>Class 1<br/>Hawthorn ATC325</td>
          <td></td> <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">09:00 AM</th>
          <td></td> <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">10:00 AM</th>
          <td></td>
          <td rowspan="2" class="c09"> COS10009<br/>Lecture<br/>Hawthorn ATC101<br/>or<br/>Live Online</td>
          <td></td> <td></td>
          <td rowspan="2" class="c09">COS1009<br/>Class 1<br/>Hawthorn ATC625</td>
        </tr>

        <tr>
          <th class="time">11:00 AM</th>
          <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">12:00 PM</th>
          <td class="c26">COS10026<br/>Live Online Lecture</td>
          <td></td> <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">01:00 PM</th>
          <td class="c25">COS10025<br/>Live Online Lecture</td>
          <td></td> <td></td> <td></td>
          <td class="c26">COS10026<br/>Class 1<br/>Hawthorn BA608</td>
        </tr>

        <tr>
          <th class="time">02:00 PM</th>
          <td></td>
          <td rowspan="2" class="c25">COS10025<br/>Workshop 1<br/>Hawthorn ATC427</td>
          <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">03:00 PM</th>
          <td></td> <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">04:00 PM</th>
          <td rowspan="2" class="c09">COS10009<br/>Class 2<br/>Hawthorn EN214</td>
          <td rowspan="2" class="c26">COS10026<br/>Workshop 1<br/>Hawthorn BA408</td>
          <td></td> <td></td>
          <td class="c04">COS10004<br/>Live Online Lecture</td>
        </tr>

        <tr>
          <th class="time">05:00 PM</th>
          <td></td> <td></td> <td></td>
        </tr>

        <tr>
          <th class="time">06:00 PM</th>
          <td></td> <td></td> <td></td> <td></td> <td></td>
        </tr>
      </tbody>
    </table>
  

  <!-- Dan updated these changes on 12/04-->
  <!-- UV deleted some code because it can displaced in the form of picture motions on 12/04/2023 -->
  <!-- style this horizontal line blue-->


  <div class="profile">
    <h1> Join us today! </h1>
    <p>Send your resume <br/> and receive an interview invitation from SOE.</p>
    <div>

    </div>

    <button onclick="window.location.href='apply.html'"
            class="button button1">
      APPLY TO SOE
    </button>
    <!-- end of changes -->

    <br/> <br/>
      <div id="cardgrid01">
         <div class="jobfirst01">
            <div class="cards">
                <div class="cardheader card-image">
<!-- image to be inserted again -->
                  <img src="images/devops.jpg" alt="DevOps Engineer">
                  <h3>DevOps Engineer</h3>
                </div>

                <div class="cardbody">
                  <p>This role of DevOps Engineer is responsible for research, design, and implementing information security solutions for organisation systems and products that comply with all applicable security policies and standards.
                  </p>

                </div>
                 <div class="cardfooter">
                  <button class="btn" onclick="window.location.href='jobs.html'">
                      Apply
                  </button>
                  <button class="btn" onclick="window.location.href='jobdescriptionDevOps.html'">
                    Details
                  </button>
                 </div>
                </div>
         </div>
         <div class="jobfirst02">
            <div class="cards">
                <div class="cardheader card-image">
<!-- image to b inserted again -->
                    <img src="images/webdev.jpg" alt="Web Developer">
                    <h3> Front End/Web Developer</h3>
                </div>

                <div class="cardbody">
                    <p>If you are a passionate and skilled Front End Developer looking for an exciting and challenging career opportunity, you can't miss this great position at our IT service business client who based in Melbourne.
                    </p>

                </div>
                <div class="cardfooter">
                  <button class="btn" onclick="window.location.href='jobs.html'">
                    Apply
                  </button>
                  <button class="btn" onclick="window.location.href='jobdescriptionWD.html'">
                    Details
                  </button>

                </div>
                </div>
         </div>

      </div>


    <p>Our group is formed thanks to this assignment from:</p>

    <a href="https://www.swinburne.edu.au/"
       target="_blank">
      <img src="images/swin.png" alt="Swinburne Logo" id="swin">
    </a>
  </div>

<?php 
	include 'Footer.inc'; 
?>

</body>
</html>
