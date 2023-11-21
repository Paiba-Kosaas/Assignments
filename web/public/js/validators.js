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

    sendForm();
}

/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 * @param {*} identifier 
 * @returns
*/
function getData(){

    var data = {
        'firstName': $('#firstName').val(),
        'lastName': $('#lastName').val(),
        'email': $('#email').val(),
        'phone': $('#country').val() + $('#phone').val(),
        'affair': $('#affair').val(),
        'description': $('#description').val()
    };

    return data;

}

/**
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 */
function validateData()
{
    let checkRequiredVal, checkEmailVal, checkNumberVal = false;    

    checkRequiredVal = checkRequired();
   
    checkEmailVal = checkEmail($("#email"));

    checkNumberVal = checkNumber($("#phone"));
        

    return checkEmailVal === checkRequiredVal === checkNumberVal;
}

/**
 * @author Paiba
 */
function checkRequired()
{
    let result = true;
    $(".required-field").each(function() {
        
        if( $(this).val().trim() == "" ) {
            if( $(this).is("select") ) {
                showAlert($(this), 'You must select an option', 'red');
                result = false;
            } else {
                showAlert($(this), 'This field can not be blank', 'red');
                result = false;
            }
        } else {
            if( $(this).is("select") ) {
                showAlert($(this), 'Correct', 'green');
            } else {
                showAlert($(this), 'Correct', 'green');
            }
        }
    });

    return result;
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

    if(!result)
    {
        showAlert(email, 'Please correct your email', 'red');
        return false;
    }

    showAlert(email, 'Correct', 'green');
    return true;
}

/**
 * @author Paiba
 * @param {*} number 
 * @returns 
 */
function checkNumber(number)
{
    let regex = /^[0-9-()+]{3,20}/;
    if(!regex.test(number.val()))
    {
        showAlert(number, 'Please correct your number', 'red');
        return false;
    }
    
    showAlert(number, 'Correct', 'green');
    return true;
}


/**
 * CUANDO INICIE LO PRIMERO QUE HARÁ ES ESTABLECER QUE EL INPUT DE PHONE
    SOLO PUEDA RECIBIR NUMEROS, Y QUITARA FUNCIONES ADICIONALES DE SCROLL Y FLECHAS
 * @author Paiba <pablo.ibanez@eurotransportcar.com>
 */

var numberInput = document.getElementById("phone");

        // Add an event listener for the input event
        numberInput.addEventListener("input", function (event) {
            // Prevent the default behavior of arrow keys and scroll
            event.preventDefault();

            // Get the value of the input
            var inputValue = event.target.value;

            // Do something with the input value if needed
            console.log("Input Value:", inputValue);
        });

        document.getElementById('phone').addEventListener('keydown', function(e) {
            if (e.keyCode === 38 || e.keyCode === 40) {
                e.preventDefault();
            }
        });



