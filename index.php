<?php session_start(); ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Visualizer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="build/visualize.bundle.js?73266a1d9b" charset="utf-8"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link href="assets/css/HoldOn.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="login/css/style.css">
	<link rel="icon" type="image/png" href="images/logo.png">
</head>

<body  id="body">
<?php
if(isset($_SESSION['u_username'])) {
 ?>
		<div id="save" ></div><input id="save-file" type="text" placeholder="File-name" value="<?php  if(isset($_SESSION['save-file'])) { echo $_SESSION['save-file']; } ?>"/>
		<div id="logout" ><button id="logout_btn">Logout</button></div>
		<div id="files" ><button id="files_btn" >My Files</button></div>
	<?php
		echo '<div id="user" ><p id="user_txt">Hi '.$_SESSION['u_name'].'</p></div>';
	}
?>
		<header role="banner">
	<!--		<div id="cd-logo">
				<a href="javascript:void(0)"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-logo_1.svg" alt="Logo"></a>
			</div>
-->
			<nav class="main-nav">

				<ul>
					<!-- inser more links here -->
					<?php
					if(!isset($_SESSION['u_username'])){
							echo '<li><a class="cd-signin" id="in" href="javascript:void(0)">Sign in</a></li>';
							echo '<li><a class="cd-signup" href="javascript:void(0)">Sign up</a></li>';
						}
					?>
				</ul>
			</nav>
		</header>

		<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
			<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
				<ul class="cd-switcher">
					<li><a href="#0">Sign in</a></li>
					<li><a href="#0">New account</a></li>
				</ul>

				<div id="cd-login"> <!-- log in form -->
					<form class="cd-form">
						<p class="fieldset">
							<label class="image-replace cd-email" for="signin-email">E-mail or Username</label>
							<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail or Username">
						</p>

						<p class="fieldset">
							<label class="image-replace cd-password" for="signin-password">Password</label>
							<input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password">
							<a href="javascript:void(0)" class="hide-password">Hide</a>
						</p>

						<p class="fieldset">
							<input type="checkbox" id="remember-me" checked required>
							<label for="remember-me">Remember me</label>
						</p>

						<p class="fieldset">
							<input id="login_submit" class="full-width" type="submit" value="Login">
						</p>
					</form>

					<p class="cd-form-bottom-message"><a href="javascript:void(0)">Forgot your password?</a></p>
					<!-- <a href="#0" class="cd-close-form">Close</a> -->
				</div> <!-- cd-login -->

				<div id="cd-signup"> <!-- sign up form -->
					<form class="cd-form">
						<p class="fieldset">
							<label class="image-replace cd-username" for="signup-username">Username</label>
							<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
						</p>

						<p class="fieldset">
							<label class="image-replace cd-username" for="signup-name">Name</label>
							<input class="full-width has-padding has-border" id="signup-name" type="text" placeholder="Name">
						</p>

						<p class="fieldset">
							<label class="image-replace cd-email" for="signup-email">E-mail</label>
							<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						</p>

						<p class="fieldset">
							<label class="image-replace cd-password" for="signup-password">Password</label>
							<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password">
							<a href="javascript:void(0)" class="hide-password">Hide</a>
						</p>

						<p class="fieldset">
							<input type="checkbox" id="accept-terms">
							<label for="accept-terms">I agree to the <a href="javascript:void(0)">Terms</a></label>
						</p>

						<p class="fieldset">
							<input id ="signup_submit" class="full-width has-padding" type="submit" value="Create account">
						</p>
					</form>

					<!-- <a href="#0" class="cd-close-form">Close</a> -->
				</div> <!-- cd-signup -->

				<div id="cd-reset-password"> <!-- reset password form -->
					<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

					<form class="cd-form">
						<p class="fieldset">
							<label class="image-replace cd-email" for="reset-email">E-mail</label>
							<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						</p>

						<p class="fieldset">
							<input id="reset_submit" class="full-width has-padding" type="submit" value="Reset password">
						</p>
					</form>

					<p class="cd-form-bottom-message"><a href="javascript:void(0)">Back to log-in</a></p>
				</div> <!-- cd-reset-password -->
				<a href="javascript:void(0)" class="cd-close-form">Close</a>
			</div> <!-- cd-user-modal-container -->
		</div> <!-- cd-user-modal -->
	</body>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- Header -->
			<section id="header_input">

					<div id="pyInputPane">
						<div id="codeInputWarnings">
							<select id="pythonVersionSelector" style="display:none">
								<option value="c" selected>C (gcc 4.8, C11) </option>
							</select>
						</div>

						<div id="someoneIsTypingDiv" style="color: #e93f34; font-weight: bold; display: none;">Someone is typing ...</div>
						<div id="codeInputPane"></div> <!-- populate with Ace code editor instance -->
						<div id="frontendErrorOutput"></div>

						<button id="executeBtn" class="bigBtn" type="button">Visualize Execution</button>

						<div id="optionsPane" style="display:none">

							<select id="cumulativeModeSelector">
								<option value="false">hide exited frames [default]</option>
								<option value="true">show all frames (Python)</option>
							</select>
							<select id="heapPrimitivesSelector">
								<option value="false">inline primitives &amp; nested objects [default]</option>
								<option value="true">render all objects on the heap (Python/Java)</option>
							</select>
							<select id="textualMemoryLabelsSelector">
								<option value="false">draw pointers as arrows [default]</option>
								<option value="true">use text labels for pointers</option>
							</select>
						</div>

					</div>

			</section>

		<!-- One -->
			<section id="one" class="main style1">
				<div class="container">
					<div id="pyOutputPane"></div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="main style2">
				<div class="container" >
					<div class="row 150%">
						<div class="6u 12u$(medium)">
							<ul class="major-icons">
								<li><span class="icon style1 major fa-code"></span></li>
								<li><span class="icon style2 major fa-bolt"></span></li>
								<li><span class="icon style3 major fa-camera-retro"></span></li>
								<li><span class="icon style4 major fa-cog"></span></li>
								<li><span class="icon style5 major fa-desktop"></span></li>
								<li><span class="icon style6 major fa-calendar"></span></li>
							</ul>
						</div>
						<div class="6u$ 12u$(medium)">
							<header class="major">
								<h1>A way to visualize your code
								</h1>
							</header>

							<p>This software helps you to visualize you <code>C Program</code></p>
							<code>Debug</code><br>
							You can debug you code also, see how yours program runs on your compiler each line by line and step by step.</p>
							<code>Cloud-Storage</code><br>
							<p>You can store your code on Cloud and easily access every were you want.</p>
							<code>Fast</code><br>
							<p>This software is fully optimized, so you not suffer any problem.</p>
							<code>Mobile-Friendly</code><br>
							<p>This software is mobile-friendly you can use this in every device.</p>
							<code>More</code><br>
							<p>You can <a href="javascript:void(0)">Sign-Up</a> to use it's cool features</p>

						</div>
					</div>
				</div>
			</section>

	<!-- Four -->
			<section id="four" class="main style2 special">
				<div class="container">
					<header class="major">
						<h2>Get in touch</h2>
					</header>
					<p>Know more about this software</p>
					<ul class="actions uniform">
						<?php
						if(!isset($_SESSION['u_username'])){
									echo '<li><a href="#in" class="button special">Sign Up</a></li>';
								}
						?>
						<li><a href="#" class="button">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- Footer-->
			<section id="three" class="main style1 special">
				<ul class="icons">
					<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Anurag</li>
				</ul>
			</section>


			<section id="console" class="style2 special">
				<div>
					<div class="left">
						<h1 id="con_text">&nbsp; > &nbsp; Console</h1>
					</div>

					<div class="right" title="Close">
						<a id="close">Toggle</>
					</div>

					<textarea id="output_ex" class="frontendErrorOutput">
					</textarea>

					</div>
			</section>

			<div id="snackbar"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script  src="login/js/index.js"></script>
			<script  src="login/js/new.js"></script>
			<script src="assets/js/HoldOn.js"></script>

			<script>
				$(document).ready(function(){
						$("#close").click(function(){
								$("#output_ex").fadeToggle();
						});
				});

				$(window).load(function(){
					HoldOn.close();
				});
			</script>
			<script>

				function console(){
					//Output value
					var output_el = document.getElementById('pyStdout').value;
					//Output bind
					var output_ex = document.getElementById('output_ex');
					output_ex.value = output_el;
				}
			</script>

			<script>
				$( document ).on( 'keydown', function ( e ) {

					if(e.keyCode === 121) {
							$("#pyInputPane").css({"max-width": ""});
							$("#codeInputPane").css({"width": ""});

							$("#pyInputPane").css({"max-width": "100%", "margin": "0","margin-top": "-8px"});
							$("#codeInputPane").css({"width": "100%", "min-height": "900px", "border" : "0.5px solid black"});
					}

					if ( e.keyCode === 27 ) { // ESC  //F10 - 121
							$("#pyInputPane").css({"max-width": ""});
							$("#codeInputPane").css({"width": ""});


							$("#pyInputPane").css({"max-width": "1200px", "margin-left": "auto", "margin-right": "auto","margin-top":"0"});
							$("#codeInputPane").css({"width": "1200px", "min-height": "600px", "border" : "0.5px solid black"});
						}

					if(e.keyCode === 37) {
						$('#jmpStepBack').trigger('click');
					}

					if(e.keyCode === 39) {
						$('#jmpStepFwd').trigger('click');
					}



				});

			</script>

			<script>
				function run(stop){
					if(stop==1) {
						document.getElementById("run").disabled = true;
						var steps = document.getElementById('curInstr').innerHTML;
						var txt = steps.replace("Step","");
								txt = txt.replace("of","");
						var length = txt.length;
						var pos_space="";
						var i;
						for (i = 0, len = txt.length; i < len; i++) {
								if(txt[i]==" ")
        				{ pos_space=i;}
						}

						var first = txt.slice(0,pos_space);
						var second = txt.slice(pos_space,len);

						var e = document.getElementById("option_exc");
						var timer = e.options[e.selectedIndex].value;

						var jmpStepFwd = document.getElementById('jmpStepFwd');
						var start = parseInt(first);
						var end = parseInt(second);
						var num_run = end - start;
					} else if(stop==0){
						alert('Stop');
						document.getElementById("run").disabled = false;

					}

						(function myLoop (ex) {
   						setTimeout(function () {
      					$('#jmpStepFwd').trigger('click');
      					if (--ex) myLoop(ex);
   						}, timer)
						})(num_run);
				}
			</script>

			<script>
			document.addEventListener('DOMContentLoaded',function() {
					var themeName = 'sk-rect';
						HoldOn.open({
							theme:themeName,
							message:"<h4>Loading....</h4>"
						});

						var executeBtn = document.getElementById('executeBtn');
						var vizLayoutTdFirst = document.getElementById('vizLayoutTdFirst');

						if(executeBtn)
						{
							executeBtn.addEventListener('',function() {
								var themeName = 'sk-bounce';
								HoldOn.open({
									theme:themeName,
									message:"<h4>Please wait ... Executing</h4>"
								});

							},false);
						}
					},false);
			</script>

	</body>
</html>
