var email = document.getElementById('email');

const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

form.addEventListener('submit', e => { 
    e.preventDefault();
    
    if(EmailRegex.test(email.value)){
      form.submit();
    }
  })

  email.addEventListener('input', function(e) {
    var currentValue = e.target.value;
    var valid = EmailRegex.test(currentValue);
  
    if(!valid){
      alert('Email invalid');
    }
  })