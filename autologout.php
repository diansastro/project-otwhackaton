<script type="text/javascript">
 		var t;
 				window.onload=resetTimer;
 				document.onkeypress=resetTimer;
 		function logout()
 			{
 				alert("You are now logged out.")
 				location.href='logout.php'
 			}
 		function resetTimer()
 			{
 				clearTimeout(t);
 				//t=setTimeout(logout,1800000) //logs out in 30 minutes
				t=setTimeout(logout,300000) //logout in 1 minutes
 			}
 </script>
