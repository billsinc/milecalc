function updateOutput() {

	    //get form 
	    var form = document.getElementById('form');
	    var x = form.elements['x'].value;
	    var y = form.elements['y'].value;
	    x = x.replace(/,/g, "");
	    y = y.replace(/\$/g, '');
	
	    // calculate reimbursement
	    if (x === null || x == "") {
	        form.elements['z'].value = "$" + 0;
	    }
	    else if (x > 0) {
	        form.elements['z'].value = "$" + parseFloat(x * y).toFixed(2);
	        }
	    }