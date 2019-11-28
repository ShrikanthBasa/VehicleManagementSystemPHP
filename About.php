<?php
session_start();
include('head.php') ?>
<style media="screen">
.card {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border-radius: 0px 25px 25px 25px;
	overflow: hidden;
	text-decoration: none;
}
.column {
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
  border-radius: 5px;
}
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}
.card p{
  text-align: justify;
  text-decoration: none;
  font-size: 14px;
}
.zoom{
  overflow: hidden;
}

.zoom img{
  width: 100%;
}

.column:hover{
  transition: transform .2s ease;
  transform: scale(1.01);
}

.card:hover img{
  transition: transform .7s ease;
  -webkit-transform: scale(1.1);
}
.card h2{
  margin-top: 0px;
  font-size: 25px;
  font-style: normal;
  font-weight: bold;
  text-align: center;
}

.combo button{
  font-size: 2vw;
  width:45%;
}
</style>
<div class="container mt-3 text-center">
	<center>
  <div class="row">
      <div class="column" style="margin-left:12%;">
        <div class="card">
          <div class="zoom">
            <img src="images/shrikanth.jpg" alt="Threading">
          </div>
          <div class="container mt-3">
            <h2>SHRIKANTH BASA</h2>
            <p>Experienced Web Developer and student from St.Francis Institute of Technology, Borivali, Mumbai</p>
            <p>Skills: HTML, CSS, PHP, MySQL</p>
            <p>Class: TE-CMPN-B</p>
            <p>Roll No: 42</p>
            <p>Batch: B3</p>
          </div>
        </div>
      </a>
      </div>

      <div class="column">
        <div class="card">
          <div class="zoom">
            <img src="images/shrikanth.jpg" alt="Threading">
          </div>
          <div class="container mt-3">
            <h2>SHRIKANTH BASA</h2>
            <p>Experienced Web Developer and student from St.Francis Institute of Technology, Borivali, Mumbai</p>
            <p>Skills: HTML, CSS, PHP, MySQL</p>
            <p>Class: TE-CMPN-B</p>
            <p>Roll No: 42</p>
            <p>Batch: B3</p>
          </div>
        </div>
      </a>
      </div>

      <div class="column">
        <div class="card">
          <div class="zoom">
            <img src="images/shrikanth.jpg" alt="Threading">
          </div>
          <div class="container mt-3">
            <h2>SHRIKANTH BASA</h2>
            <p>Experienced Web Developer and student from St.Francis Institute of Technology, Borivali, Mumbai</p>
            <p>Skills: HTML, CSS, PHP, MySQL</p>
            <p>Class: TE-CMPN-B</p>
            <p>Roll No: 42</p>
            <p>Batch: B3</p>
          </div>
        </div>
      </a>
      </div>



  </div>
	  </center>
</div>
<?php include('footer.php') ?>
