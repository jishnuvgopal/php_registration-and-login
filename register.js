$(document).ready(function () {
    $("#formvalid").validate({
      rules: {
        username: {
        required: true,
        minlength: 4
        },
        password: {
        required: true,
        minlength: 8
        },
        email: {
        required: true,
        email: true
        },
        number: {
        required: true,
		    number: true,
		    minlength: 10,
		    maxlength: 10
        },
        datedob: {
        dateFormat:true
      }
        
        
      },
      messages: {
        username: {
          required: 'Please enter Name.',
          minlength: 'Enter atleast 4 Characters',
        },
        password: {
        required: 'Please enter Password.',
        minlength: 'Password must be at least 8 characters long.',
        },
        email: {
        required: 'Please enter Email Address.',
        email: 'Please enter a valid Email Address.',
        },
        number: {
        required: 'Please enter Contact.',
        rangelength: 'Contact should be 10 digit number.'
        }
      },
      submitHandler: function(form) {
      form.submit();
    }
    });
  });