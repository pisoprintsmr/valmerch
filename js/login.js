$(function(){
    $('#login').click(function(e){
        var valid = this.form.checkValidity();
        
        if(valid){
            var email = $('#emaillogin').val();
            var password = $('#passwordlogin').val();
        }
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: 'jslogin.php',
            data: {email: email, password: password},
            success:function(data){
                alert(data);
                    setTimeout('window.location.href="index.php"',2000);
                
            },
            error: function(data){
                alert('there were errors while doing the operation');
            }
            
        });
    });
});