/**Calculator */

function calculatePayments(){
    let vehiclePrice = document.getElementById('vehiclePrice').value,
        loanTerm = document.getElementById('loanTerm').value,
        intRate = document.getElementById('intRate').value,
        downPayment = document.getElementById('downPayment').value,
        tradeValue = document.getElementById('tradeValue').value,
        amount = parseInt(vehiclePrice),
        months = parseInt(loanTerm),
        down  = parseInt(downPayment),
        trade =  parseInt(tradeValue),
        totalDown  = down + trade
        annInterest = parseFloat(intRate),
        monInt = annInterest / 1200;
  
        if(!amount){
          alert('Please add a loan amount');
          return;
        }
  
        if(!months){
          months = 60;
          loanTerm = document.getElementById('loanTerm').value = '60';
        }
  
        if(!downPayment){
          down = 0;
          downPayment = document.getElementById('downPayment').value = '0';
        }
  
        if(!trade){
          trade = 0;
          tradeValue = document.getElementById('tradeValue').value = '0';
        }
  
        if(!annInterest){
          annInterest = 3.25;
          intRate = document.getElementById('intRate').value = '3.25';
        }
  
  
        let calc = ((monInt + (monInt / (Math.pow((1 + monInt), months) -1))) * (amount - (totalDown || 0))).toFixed(2);
  
        let paymentResults = document.getElementById('paymentResults');
        paymentResults.style.display = 'block';
        paymentResults.innerHTML = '';
        let results = document.createElement('div');
        results.innerHTML = '<h3>Estimated Monthly Payment is:<br/></h3>' + '<h3 style="text-align:center">RM' + calc + '</h3>';
  
        paymentResults.append(results);
  
  
  }
