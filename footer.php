

		
		</main>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="js/bin/materialize.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<!-- <script type="text/javascript" src="js/custom/pager.js"></script>		 -->
		<script type="text/javascript" src="js/custom/script.js"></script>
		<?php 
		if (isset($bodyClass) && ($bodyClass == 'edit-client-page' || $bodyClass == 'add-client-page')) {
			if (!isset($conn)) {
				include('includes/mysql_connect.php');
			}
			$queryGetSecCompany = "SELECT DISTINCT(`security_company`) FROM `tbl_clients` WHERE `security_company` != 'Eagle' AND `security_company` != 'Regina' AND `security_company` != 'AP Securities' AND `security_company` != ''";
			
			if ($$queryGetSecCompany = $conn->query($queryGetSecCompany)) {
				
				if ($queryGetSecCompany->num_rows > 0) {
					?>
					<script type="text/javascript">
						var thisGSCData = {
							<?php while($resultGSC = $queryGetSecCompany->fetch_array()) { echo "\"".$resultGSC['security_company']."\"" .": null,"; } ?> "Eagle": null, "Regina" : null, "AP Securities" : null
						};
					</script>

					<?php
				} else {
					?>
					<script type="text/javascript">
						var thisGSCData = {
							"Eagle": null,
							"Regina" : null,
							"AP Securities" : null
						};
					</script>
					<?php
				}
				?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('.add-client-page #txtareaSecurityCompany,.edit-client-page #txtareaSecurityCompany').autocomplete({
							data: thisGSCData,
							minLength: 0
						});
					})
				</script>
			<?php 
			}
		}  ?>
		<script type="text/javascript" src="js/custom/checkCookies.js"></script>
	</body>
</html>