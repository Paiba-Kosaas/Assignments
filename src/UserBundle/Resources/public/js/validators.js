/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 * @param {*} element 
 * @param {*} message 
 * @param {*} color 
 */
function showAlert(element, message, color){

    element.parent().find('label').css('color', color);
    element.css('border-color', color);
    element.next().removeAttr('hidden');
    element.parent().find('small').css('color', color);
    element.parent().find('small').html(message);
}

/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 * @returns 
 */
function sendData(){

    if(!validateData()){
        return true;
    }

    send();
}

/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 * @param {*} identifier 
 * @returns
*/
function getData(identifier){

    let data = [];
    
    $(identifier).each(function(element, index){
        data[$(this).attr('name')] = $(this).val();
    });

    return data;
}

/**
 * @author Paiba
 */
function send(){
    $.ajax({
        src: "{{''}}",
        data: getData('.form-contact'),
        success: function(data) {
            
        },
        error: function(data){
        
        },
        beforeSend: function(){
            alert("REALIZANDO....")
        }
    });
}

/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 */
function validateData()
{
    let checkRequired, checkEmail, checkNumber = false;

    checkRequired= checkRequired();

    checkEmail= checkEmail($("#email"));

    checkNumber= checkNumber($("#phone").val());
    

    return checkEmail === checkRequired === checkNumber;
}

/**
 * @author Paiba
 */
function checkRequired()
{
    $(".required-field").each(function() {
        if( $(this).val().trim() == "" ) {
            if( $(this).is("select") ) {
                showAlert($(this), 'You must select an option', 'red');
            } else {
                showAlert($(this), 'This field can not be blank', 'red');
            }
            auxResult = false;
        } else {
            if( $(this).is("select") ) {
                showAlert($(this), 'Correct', 'green');
            } else {
                showAlert($(this), 'Correct', 'green');
            }
        }
    });
}

/**
 * @author Paiba
 * @param {*} email 
 * @returns 
 */
function checkEmail(email)
{
    let re = /\S+@\S+\.\S+/;
    let result = re.test(email.val());

    if(result)
    {
        showAlert(email, 'Please correct this field', 'red');
    }
    else{
        showAlert(email, 'Correct', 'green');
    }

    return result;
}

/**
 * @author Paiba
 * @param {*} number 
 * @returns 
 */
function checkNumber(number)
{
    let regex = /^[0-9-()+]{3,20}/;
    if(!regex.test(number))
    {
        showAlert($(this), 'Please correct this field', 'red');
    }
    else{showAlert($(this), 'Correct', 'green');}
}





