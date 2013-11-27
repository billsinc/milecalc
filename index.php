<html>
<head>
<link rel="stylesheet" href="style.css" media="screen" />
<script type="text/javascript" src="scripts.js"></script>
</head>
<body>
<div id="stylized" class="myform">
<?php
	date_default_timezone_set('America/Denver'); 

	//get curent year
	$yearnow = date("Y");
	
	//get mileage rates
	$mileagerates = simplexml_load_file('http://open.dapper.net/RunDapp?dappName=FederalMileageRates&v=1&applyToUrl=http%3A%2F%2Fen.wikipedia.org%2Fwiki%2FBusiness_mileage_reimbursement_rate&filter=true');
	
	//TODO: write date lookup code, currently hardcoded to 2013
	$ratedate = $mileagerates->Rates[25]->Year;
	$rateamount = substr($mileagerates->Rates[25]->Rate, 0, 4);
	
	if ($yearnow == $ratedate) {
			$currentyear = $ratedate;
			$currentamount = $rateamount / 100;
	} else {
		$currentyear = "";
		$currentamount = 0;
	}

?>
    <form id="form" name="form" oninput="updateOutput()">
    	<h1>Federal Mileage Reimbursement Calculator</h1>
    	<p>Calculate mileage reimbursement for business travel.</p>
    
	        <label>Mileage
		        <span class="small">Enter total mileage</span>
	        </label>
	        
	        <input name="x" placeholder="miles" required="" type="text" value="" tabindex="1" />
	        
	        <label>Rate (<a href="http://en.wikipedia.org/wiki/Business_mileage_reimbursement_rate" target="_blank"><?php echo $ratedate;?></a>)
	        	<span class="small">Change if needed</span>
	        </label>
	        
	        <input name="y" tabindex="2" type="text" tabindex="2" value="<?php echo "$" . $currentamount; ?>" onchange="updateOutput()" />
	        
	        <label>Reimbursement
		        <span class="small">Amount to reimburse</span>
	        </label>
	        
	        <input name="z" for="x y" readonly="readonly" value="$0" />
           <div class="spacer"></div>
    </form>
</div>
</body>
<html>